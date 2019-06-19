<?php
class Curso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->cursoModel = $this->model('CursoModel');
    }

    public function index(){
        $curso = $this->cursoModel->findAll();
        $descripcion = "Vista que muestra todos los cursos que existen";
        $datos = [
            'titulo' => "Curso",
            'descripcion' => $descripcion,
            'curso' => $curso
        ];
        $this->view('pages/curso', $datos);
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
}