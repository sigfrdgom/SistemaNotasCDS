<?php
class ModulosCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');

    }

    public function index(){
        $modulosCurso = $this->modulosCursoModel->findForTable();
        $docente = $this->docenteModel->findAll();
        $curso = $this->cursoModel->findAll();
        $modulo = $this->moduloModel->findAll();

        $descripcion = "Vista que muestra todos los modulosCurso que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulosCurso' => $modulosCurso,
            'docente' => $docente,
            'curso' =>$curso,
            'modulo' =>$modulo
        ];
        $this->view('pages/modulosCurso', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_modulos_curso' => null,
               'id_curso' => trim($_POST['mcid_curso']),
               'id_modulo' => trim($_POST['mcid_modulo']),
               'id_docente' => trim($_POST['mcid_docente']),
               'observaciones' => trim($_POST['mcobservaciones'])
           ];
           var_dump($datos);
           if($this->modulosCursoModel->create($datos))
           {
               redireccionar('modulosCurso');

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
            if($this->moduloModel->delete($id))
            {
                redireccionar('modulosCurso');
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
             if($this->moduloModel->updateDown($id))
             {
                 redireccionar('modulosCurso');
             }
             else
             {
                 die("Error al dar de baja el modulo");
             }
         }
         else
         {
             $this->index();
         }
     }
}