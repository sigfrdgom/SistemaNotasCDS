<?php
class Matricula extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->matriculaModel = $this->model('MatriculaModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');

    }

    public function index(){
        $matricula = $this->matriculaModel->findForTable();
        $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findAll();
        
        $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula,
            'participante' => $participante ,
            'curso' => $curso ,
        ];
        $this->view('pages/matricula/matricula', $datos);
    }


    public function curso($id_curso){
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
        ];
        $this->view('pages/matricula/matriculaCurso', $datos);
    }



    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
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
                        redireccionar("matriculaCurso/".$_POST['mid_curso']);
                    }
                    else
                    {
                        die("Error al insertar los datos");
                    }
           }else{
                echo "<script> alert(' Lo que intentas hacer no es posible, el estudiante ya esta matriculado en ese cruso');</script>";
                redireccionar('matricula');
           }
           
       }
   }

   public function update()
   {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
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
              die("Error al insertar los datos");
          }
      }
  }

   public function delete($id)
   {
        if (isset($id))
        {
            if($this->matriculaModel->delete($id))
            {
                redireccionar('matricula');
            }
            else
            {
                die("Error al eliminar los datos");
            }
        }
        else
        {
            $this->index();
        }
    }

    public function down($id)
    {
         if (isset($id))
         {
             if($this->matriculaModel->updateDown($id))
             {
                 redireccionar('matricula');
             }
             else
             {
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
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
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

  public function upgrade($id)
  {
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
                            redireccionar('matricula');
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
 }

 public function comprobarUpgrade($idCurso)
   {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
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

}