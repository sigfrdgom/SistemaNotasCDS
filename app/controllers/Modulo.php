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
        // $modulo = $this->moduloModel->findAll();
        $tipoModulo = $this->tipoModuloModel->findAll();
            
        
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            // 'modulo' => $modulo,
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/modulo/modulo', $datos);
    }

    public function create()
    {
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
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
                redireccionar("modulo/detalle/".$_POST['mtipo_modulo']);
           }
           else
           {
                redireccionar('modulo');
               die("Error al insertar los datos");
           }
       }else{
        redireccionar('modulo');
     }
   }


   public function update()
    {
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
           $datos = [
               'id_modulo' => trim($_POST['mid']),
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
           if($this->moduloModel->update($datos))
           {
               redireccionar("modulo/detalle/".$_POST['mtipo_modulo']);
           }
           else
           {
            redireccionar('modulo');
            die("Error al insertar los datos");
            }
        }else{
            redireccionar('modulo');
 }
   }

   public function delete($id = null)
   {
    $this->sessionActivaX();
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

    public function down($id = null)
    {
        $this->sessionActivaX();
        if (isset($id))
        {
             if($this->moduloModel->updateDown($id))
             {
                 redireccionar('modulo');
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

     public function  findById($id=null)
     {
        $this->sessionActivaX();
        if (isset($id))
        {
            return $this->ModuloModel->findById($id);
        }
        else
        {
            die("Error al buscar el dato");
        }
    }

    public function detalle($id_tipo){
        $modulo = $this->moduloModel->findByTipo($id_tipo);
        $tipoModulo = $this->tipoModuloModel->findById($id_tipo);
            
        
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulos de tipo '".strtolower($tipoModulo->nombre)."'",
            'descripcion' => $descripcion,
            'modulo' => $modulo,
            'tipoModulo' => $tipoModulo,
            'idTipoModulo' => $id_tipo
        ];
        $this->view('pages/modulo/moduloDetalle', $datos);
    }

    public function buscarModulos(){
        $id_tipo = $_POST['tipo'];
        $busqueda = $_POST['busqueda'];

        $datos = [
            'id_modulo' => trim($id_tipo),
            'busqueda' => trim($busqueda)
        ];

        if($busqueda == null || $busqueda== ""){
            $results = $this->moduloModel->findByTipo($id_tipo);
        }else{
            $results = $this->moduloModel->findByCriteria($datos);
        }

        $datos = [
            'modulo' => $results,
        ];
        $this->view('pages/modulo/buscarModulo', $datos);
    }

}