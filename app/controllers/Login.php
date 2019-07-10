<?php

class Login extends Controller
{

    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->docenteModel = $this->model('DocenteModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->notaModel = $this->model('NotaModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
    }

    public function index(){

        $nombres = array();
        $n_participantes= $this->participanteModel->count();
        $n_usuarios = $this->docenteModel->count();
        $n_notas = $this->notaModel->count();
        $n_cursos = $this->cursoModel->count();
        $n_modulos = $this->moduloModel->count();
        $descripcion = "";
        $datos = [
            'titulo' => "Inicio",
            'descripcion' => $descripcion,
            'nombres' => $nombres,
            'n_participantes' => $n_participantes[0]->n_registros,
            'n_usuarios' => $n_usuarios[0]->n_registros,
            'n_notas' => $n_notas[0]->n_registros,
            'n_cursos' => $n_cursos[0]->n_registros,
            'n_modulos' => $n_modulos[0]->n_registros,
        ];
        $this->view('pages/inicio', $datos);
    
    
    }



    public function finalizarSesion()
    {
        session_start();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }


        session_regenerate_id(true);
        unset($_COOKIE['id_sesion']);
        session_destroy(); 
        $this->view('pages/login/login');
       
        



    }




    public function logIn()
    {
        
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&(session_status() != 2))
        {
           $docente = $this->docenteModel->logIn($_POST['pass'],$_POST['dui']);
  
           //Verificacion de la consulta
           if($docente)
           {
               
               session_start();
               session_cache_expire(60);
               $_SESSION['id_sesion'] = session_id();
               $_SESSION['tipoUsuario']=$docente->tipo_usuario;
               $_SESSION['nombres'] = $docente->nombres;
               $_SESSION['apellidos'] = $docente->apellidos;
               $_SESSION['start'] = time();
               $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;						
               
               //MENSAJE DE BIENVENIDA CHAFA 

               echo "<script>history.forward(); </script>";
               echo "<script> alert('Bienvenido ".$_SESSION['id_sesion']."');
               </script>";
               echo "<script> alert('Bienvenido ".$_SESSION['nombres']."');
               </script>";
               
   

                $this->index();
            //    $this->view('pages/inicio', $datos);
           }
           else
           {
               //DESTRUIR TODA LA SESION Y COOKIES
               $this->finalizarSesion();

           }
       }else{
            $this->index();
       }
   }

   
//    public function index(){

//     $this->view('pages/inicio', $this->datos);
// }

    




}