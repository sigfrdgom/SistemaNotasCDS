<?php
class Modulo extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->moduloModel = $this->model('ModuloModel');
        // No se si sea correcto
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    public function index(){
        $modulo = $this->moduloModel->findAll();
        $tipoModulo = $this->tipoModuloModel->findAll();
            
        
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulo' => $modulo,
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/modulo', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_modulo' => null,
               'nombre_modulo' => trim($_POST['mnombre']),
               'descripcion_modulo' => trim($_POST['mdescripcion']),
               'horas_modulo' => trim($_POST['mhoras']),
               'tipo_modulo' => trim($_POST['mtipo_modulo']),
               'evaluacion1' => trim($_POST['mevaluacion1']),
               'evaluacion2' => trim($_POST['mevaluacion2']),
               'evaluacion3' => trim($_POST['mevaluacion3']),
               'evaluacion4' => trim($_POST['mevaluacion4']),
               'evaluacion5' => trim($_POST['mevaluacion5']),
               'evaluacion6' => trim($_POST['mevaluacion6']),
               'estado' => trim($_POST['mestado'])
               
           ];
           var_dump($datos);
           if($this->moduloModel->create($datos))
           {
               redireccionar('modulo');

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
                redireccionar('modulo');
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
}