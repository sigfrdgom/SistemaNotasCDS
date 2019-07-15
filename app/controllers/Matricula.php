<?php
class Matricula extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->matriculaModel = $this->model('MatriculaModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->notaModel = $this->model('NotaModel');

    }

    public function index(){
        // $matricula = $this->matriculaModel->findForTable();
        // $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findByCohorte();
        
        $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            // 'matricula' => $matricula,
            // 'participante' => $participante ,
            'curso' => $curso
        ];
        $this->view('pages/matricula/matricula', $datos);
    }


    public function curso($id_curso=null){

        if(isset($id)&&$this->sessionActiva())
        {

        $matricula = $this->matriculaModel->findForTableCurso($id_curso);
        $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findAll();
        
        $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula,
            'participante' => $participante ,
            'curso' => $curso ,
            'id_curso' => $id_curso
        ];
        $this->view('pages/matricula/matriculaCurso', $datos);

    }else{
        redireccionar('matricula');
    }


    }

    
    public function nivel($cohorte=null){
        if(isset($id)&&$this->sessionActiva())
            {
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];
        $this->view('pages/matricula/matriculaNivel', $datos);
    }else{
        redireccionar('matricula');
    }
}


    public function create()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
       {
            $curso= trim($_POST['mid_curso']);
            $participante = trim($_POST['mid_participante']);

            $datos = [
                'id_matricula' => null,
                'id_curso' => trim($_POST['mid_curso']),
                'id_participante' => trim($_POST['mid_participante']),
                'estado' => trim($_POST['mestado']),
                'observaciones' => trim($_POST['mobservaciones'])
            ];
                $bandera=$this->comprobar();
              var_dump($bandera);
           if ($bandera) {
                    if($this->matriculaModel->create($datos))
                    {
                       echo "momento de crear notas $curso -- $participante";
                        // $this.crearNotas($curso, $participante);
                        redireccionar("matricula/crearNotas/$curso/$participante");
                        echo "Creo las notas y matriculo";
                    }
                    else
                    {
                        redireccionar('matricula');
                        die("Error al insertar los datos");
                    }
           }else{
                echo "<script> alert(' Lo que intentas hacer no es posible, el estudiante ya esta matriculado en ese cruso');</script>";
                // redireccionar('matricula');
           }
           
       }
       else{
        redireccionar('matricula');
     }
   }

   public function update()
   {
       if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
       {
          $datos = [
              'id_matricula' => trim($_POST['mid_matricula']),
              'id_curso' => trim($_POST['mid_curso']),
              'id_participante' => trim($_POST['mid_participante']),
              'estado' => trim($_POST['mestado']),
              'observaciones' => trim($_POST['mobservaciones'])
          ];
          var_dump($datos);
          if($this->matriculaModel->update($datos))
          {
            redireccionar("matricula/curso/".$_POST['mid_curso']);
          }
          else
          {
            redireccionar('matricula');   
            die("Error al actualizar los datos");
       }
   }else{
       redireccionar('matricula');
    }
  }

   public function delete($id = null)
   {
        if (isset($id)&&$this->sessionActiva())
        {
            if($this->matriculaModel->delete($id))
            {
                redireccionar('matricula');
            }
            else
            {
                redireccionar('matricula');
                die("Error al eliminar los datos");
            }
        }
        else
        {
            $this->index();
        }
    }

    public function down($id = null)
    {
         if (isset($id)&&$this->sessionActiva())
         {
             if($this->matriculaModel->updateDown($id))
             {
                 redireccionar('matricula');
             }
             else
             {
                redireccionar('matricula');
                 die("Error al dar de baja la matricula");
             }
         }
         else
         {
             $this->index();
         }
    }

    public function comprobar()
   {
       if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
       {
          $datos = [
              'id_curso' => trim($_POST['mid_curso']),
              'id_participante' => trim($_POST['mid_participante'])
          ];  
          $bandera = $this->matriculaModel->comprobar($datos);
      }
      if ($bandera[0]->n_registros == 0) {
            return TRUE;
      } else {
            return FALSE;
      }
      
  }

  public function upgrade($id = null)
  {
    if(isset($id)&&$this->sessionActiva()){
            $bandera = $this->matriculaModel->comprobarUpgrade($id);
            // var_dump($bandera);
            if (isset($bandera[0])) {
                $id_upgrade= $bandera[0]->id_curso;
                // echo "--------------->".$id_upgrade;
                $bandera2=$this->comprobarUpgrade($id_upgrade);
                if ($bandera2) {
                    $datos = [
                        'id_matricula' => null,
                        'id_curso' => $id_upgrade,
                        'id_participante' => trim($_POST['mid_participante']),
                        'estado' => trim($_POST['mestado']),
                        'observaciones' => trim($_POST['mobservaciones'])
                    ];
                        if($this->matriculaModel->create($datos))
                        {
                            redireccionar("matricula/curso/$id_upgrade");
                            // redireccionar('matricula');
                        }
                        else
                        {
                            die("Error al insertar los datos");
                        }
                }else {
                    redireccionar('matricula');
                }
            } else {
                echo "<script> alert('No existe posibilidad de upgrade')</script>";
                redireccionar('matricula');
            }
    }else
    {
        redireccionar('matricula');
        die("Error al buscar el dato");
            
    }        
 }

 //validar?
 public function comprobarUpgrade($idCurso)
   {
       if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
       {
          $datos = [
              'id_curso' => $idCurso,
              'id_participante' => trim($_POST['mid_participante'])
          ];  
          $bandera = $this->matriculaModel->comprobar($datos);
      }
      if ($bandera[0]->n_registros == 0) {
            return TRUE;
      } else {
            return FALSE;
      }
      
  }


/** 
 * Este metodo le crea las notas a un participante en un determinado curso, para todos 
 * los modulos que pertenecen a ese curso en especifico, 
 * las notas por defecto agregadas son de 0.0 para todas las evaluaciones del modulo
*/
public function crearNotas($curso, $participante)
{
    if (isset($curso) && isset($participante)&&$this->sessionActiva())
    {
        $modulos = $this->matriculaModel->obtenerModulos($curso);
        echo  "Participante ".$participante."<br>";
        if (count($modulos) != 0) 
        {
            foreach ($modulos as $item) {
                echo $item->id_modulos_curso."<br>";
                $datos = [
                    'id_participante' => $participante,
                    'id_modulos_curso' => $item->id_modulos_curso,
                    'nota1' => 0.0,
                    'nota1' => 0.0,
                    'nota2' => 0.0,
                    'nota3' => 0.0,
                    'nota4' => 0.0,
                    'nota5' => 0.0,
                    'nota6' => 0.0,
                    'observaciones' => "Participante matriculado con exito"
                ];
                    if($this->notaModel->create($datos))
                    {
                        echo "Participante con notas creadas para el modulo: $item->id_modulos_curso";
                    }
                    else
                    {
                        die("Error al insertar los datos");
                    }
            }
            redireccionar("notas/modulo/$curso");
        } 
        else 
        {
        //  Sin registros, deberia de dar una alert y redireccionar
            echo "sin modulos en el curso";
            // s$this->index();
        }
    }
    else
    {
        //  Sin variables seteadas, deberia de dar una alert y redireccionar 
        $this->index();
    }
}

}