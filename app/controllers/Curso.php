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
        $this->view('pages/curso', $datos);
    }

    public function create()
    {
        session_start();
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
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
       }else{
        echo "<script> alert('No estas autorizado');
        </script>";
        //  var_dump($datos);
        redireccionar('curso');
       }
   }

   public function delete($id = null)
   {
    
       if($this->sessionActiva()){
          
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
       }else{
        redireccionar('curso');
       }
   }



    public function findById($id=null){
        if($this->sessionActiva()){
            if(isset($id)){
                return $this->cursoModel->findById($id);
            }else{
                die("Error al buscar el dato");
            }
        }else {
            redireccionar('curso');
        }

       }
        
    

    public function update()
   {
    if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
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
   }else{
       redireccionar('curso');
    }
  }

  public function updateDown($id)
  {
    session_start();
    if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
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

    }else{
        redireccionar('curso');
        }
    }



    public function countParticipante($id = null){
        if($this->sessionActiva()){
            if(isset($id)){
                return $this->cursoModel->countParticipante($id);
            }else{
                die("Error al buscar el dato");
            }
        }else{
        redireccionar('curso');
    }
    }






}