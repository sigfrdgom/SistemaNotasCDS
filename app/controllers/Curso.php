<?php
class Curso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->cursoModel = $this->model('CursoModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
        
        
    }

    public function index(){
        $curso = $this->cursoModel->findAll();
        
        $nivelCurso = $this->nivelCursoModel->findAll();
        // $obtenerNivel = $this->nivelCursoModel;

        $cantidadParticipantes =$this->cursoModel;

        $descripcion = "Vista que muestra todos los cursos que existen";
        $datos = [
            'titulo' => "Curso",
            'descripcion' => $descripcion,
            'curso' => $curso,
            'cantidadParticipantes' => $cantidadParticipantes,
            'obtenerNivel' => $nivelCurso
        ];
        $this->view('pages/curso', $datos);
    }

    public function create()
    {
        $this->sessionActivaX();

        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
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
            redireccionar('curso');
       }
   }

    public function findById($id=null){
       
        $this->sessionActivaX();
            if(isset($id))
            {
                return $this->cursoModel->findById($id);
            }else{
                redireccionar('curso');
                die("Error al buscar el dato");
                
            }
       }
        
    

    public function update()
   {
    
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
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
       
       if($this->cursoModel->update($datos))
       {
           redireccionar('curso');

       }
       else
       {
            redireccionar('curso');   
            die("Error al actualizar los datos");
       }
    }else{
       redireccionar('curso');
    }
  }

  public function updateDown($id = null) 
  {
    $this->sessionActivaX();
    
        if (isset($id))
        {
            if($this->cursoModel->updateDown($id))
            {
                redireccionar('curso');
            }
            else
            {
                redireccionar('curso');
                die("Error al dar de baja el curso");
                
            }
        }
        else
        {
            redireccionar('curso');
        }

    }



    public function countParticipante($id = null){
        
        $this->sessionActivaX();
        if(isset($id)){
            return $this->cursoModel->countParticipante($id);
        }else{
        redireccionar('curso');
            die("Error al buscar el dato");
        }
       
    }






}