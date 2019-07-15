<?php
class Docente extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->docenteModel = $this->model('DocenteModel');
    }
    public function index(){
        $docente = $this->docenteModel->findAll();
        $descripcion = "Vista que muestra todos los docentes que existen";
        $datos = [
            'titulo' => "Usuarios",
            'descripcion' => $descripcion,
            'docente' => $docente
        ];
        $this->view('pages/docente', $datos);
    }

    public function create()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
        {
           $datos = [
               'id_docente' => null,
               'nombres' => trim($_POST['dnombres']),
               'apellidos' => trim($_POST['dapellidos']),
               'fecha_nacimiento' => trim($_POST['dfechanacimiento']),
               'sexo' => trim($_POST['dsexo']),
               'dui' => trim($_POST['ddui']),
               'nit' => trim($_POST['dnit']),
               'especialidad' => trim($_POST['despecialidad']),
               'tipo_usuario' => trim($_POST['dtipo_usuario']),
               'pass' => trim($_POST['dpass']),
               'estado' => trim($_POST['destado'])
           ];
           var_dump($datos);
           if($this->docenteModel->create($datos))
           {
               redireccionar('docente');

           }
           else
           {
               die("Error al insertar los datos");
           }
       }else{
        redireccionar('docente');
       }
   }

   public function update()
   {
       if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
       {
          $datos = [
              'id_docente' =>trim($_POST['did']),
              'nombres' => trim($_POST['dnombres']),
              'apellidos' => trim($_POST['dapellidos']),
              'fecha_nacimiento' => trim($_POST['dfechanacimiento']),
              'sexo' => trim($_POST['dsexo']),
              'dui' => trim($_POST['ddui']),
              'nit' => trim($_POST['dnit']),
              'especialidad' => trim($_POST['despecialidad']),
              'tipo_usuario' => trim($_POST['dtipo_usuario']),
              'pass' => trim($_POST['dpass']),
              'estado' => trim($_POST['destado'])
          ];
        
          if($this->docenteModel->update($datos))
          {
               redireccionar('docente');

          }
          else
          {
              die("Error al insertar los datos");
          }
        }else
        {
        redireccionar('docente');
     }
  }

//    public function delete($id)
//    {
//         if (isset($id))
//         {
//             if($this->docenteModel->delete($id))
//             {
//                 redireccionar('docente');
//             }
//             else
//             {
//                 die("Error al eliminar los datos");
//             }
//         }
//         else
//         {
//             $this->index();
//         }
//     }

    public function updateDown($id = null)
   {
       if (isset($id)&&$this->sessionActiva())
       {
            if($this->docenteMbodel->updateDown($id))
            {
                redireccionar('docente');
            }
            else
            {
                redireccionar('docente');
                die("Error al dar de baja el docente");
            }
        }else
        {
            redireccionar('docente');
        }

    }
}