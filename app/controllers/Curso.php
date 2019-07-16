<?php
class Curso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->cursoModel = $this->model('CursoModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
        // $this->obtenerNivel = $this->model('NivelCursoModel');
    }

    public function index(){
        
        $curso = $this->cursoModel->findAll();
        $nivelCurso = $this->nivelCursoModel->findAll();
        $obtenerNivel = $this->nivelCursoModel;

        $cantidadParticipantes =$this->cursoModel;

        $descripcion = "Vista que muestra todos los cursos que existen";
        $datos = [
            'titulo' => "Curso",
            'descripcion' => $descripcion,
            'curso' => $curso,
            'cantidadParticipantes' => $cantidadParticipantes,
            'nivelCurso' => $nivelCurso,
            'obtenerNivel' => $obtenerNivel
        ];
        $this->view('pages/curso/curso', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_curso' => null,
               'nombre_curso' => trim($_POST['cnombre']),
               'cohorte' => trim($_POST['ccohorte']),
               'descripcion' => trim($_POST['cdescripcion']),
               'duracion' => trim($_POST['cduracion']),
               'sede' => trim($_POST['csede']),
               'estado' => trim($_POST['cestado']),
               'nivel' => trim($_POST['cnivel']),
               'fecha_inicio' => trim($_POST['cfecha_inicio']),
               'fecha_fin' => trim($_POST['cfecha_fin'])
           ];
           var_dump($datos);
           if($this->cursoModel->create($datos))
           {
               redireccionar('curso');

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
            if($this->cursoModel->delete($id))
            {
                redireccionar('curso');
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

    public function findById($id){
        if(isset($id)){
            return $this->cursoModel->findById($id);
        }else{
            die("Error al buscar el dato");
        }
    }

    public function update()
   {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
       $datos = [
           'id_curso' => trim($_POST['cid']),
           'nombre_curso' => trim($_POST['cnombre']),
           'cohorte' => trim($_POST['ccohorte']),
           'descripcion' => trim($_POST['cdescripcion']),
           'duracion' => trim($_POST['cduracion']),
           'sede' => trim($_POST['csede']),
           'estado' => trim($_POST['cestado']),
           'nivel' => trim($_POST['cnivel']),
           'fecha_inicio' => trim($_POST['cfecha_inicio']),
           'fecha_fin' => trim($_POST['cfecha_fin'])
       ];
       var_dump($datos);
       if($this->cursoModel->update($datos))
       {
           redireccionar('curso');

       }
       else
       {
           die("Error al actualizar los datos");
       }
   }
  }

  public function updateDown($id)
   {
        if (isset($id))
        {
            if($this->cursoModel->updateDown($id))
            {
                redireccionar('curso');
            }
            else
            {
                die("Error al dar de baja el curso");
            }
        }
        else
        {
            $this->index();
        }
    }



    public function countParticipante($id){
        if(isset($id)){
            return $this->cursoModel->countParticipante($id);
        }else{
            die("Error al buscar el dato");
        }
    }


    public function promote($id_curso)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if ($curso =$this->cursoModel->findById($id_curso)) {
                 var_dump($curso);
                 
                $bandera = $this->comprobar($curso->cohorte, $curso->nivel );
                if ($bandera) {
                    echo "<br> Se puede promover <br>";
                    // Entonces promovemos
                       $datos = [
                            'id_curso' => null,
                            'nombre_curso' => trim($curso->nombre_curso),
                            'cohorte' => trim($curso->cohorte),
                            'descripcion' => trim($curso->descripcion),
                            'duracion' => trim($_POST['prmduracion']),
                            'sede' => trim($curso->sede),
                            'estado' => 1,
                            'nivel' => trim($curso->nivel + 1),
                            'fecha_inicio' => trim($_POST['prmcfecha_inicio']),
                            'fecha_fin' => trim($_POST['prmcfecha_fin'])
                        ];
                        var_dump($datos);
                            if($this->cursoModel->create($datos))
                            {
                                redireccionar('curso');
                            }
                            else
                            {
                                die("Error al insertar los datos");
                            }
                } else {
                    die("No se puede promover el curso");
                }
                
            } else {
                die("Error al promover el curso.");
            }
       }
    }

    public function comprobar($cohorte,$nivel)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $bandera = $this->cursoModel->comprobar($cohorte,$nivel);
        }
            if ($bandera->n_registros == 0) {
                    return TRUE;
            } else {
                    return FALSE;
            }
    }

    public function buscarCursos(){
        $id_curso = $_POST['id_curso'];
        $busqueda = $_POST['busqueda'];

        $datos = [
            'id_curso' => trim($id_curso),
            'busqueda' => trim($busqueda)
        ];

        if($busqueda == null || $busqueda== ""){
            $notas = $this->cursoModel->findById($datos);
        }else{
            $notas = $this->cursoModel->findByCriteria($datos);
        }

        $datos = [
            'cursos' => $notas,
        ];
        $this->view('pages/curso/buscarCurso', $datos);
    }

}