<?php

class Login extends Controller
{

    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->docenteModel = $this->model('DocenteModel');
        
    
    }

    // public function index(){

       
    //     $this->view('pages/inicio', $datos);
    
    
    // }



    //FINALIZACION DE LA SESION
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


        // session_regenerate_id(true);
        
        unset($_COOKIE['id_sesion']);
        
        session_destroy(); 
        session_abort();
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
            //    ini_set("session.gc_maxlifetime","60");
            //    ini_set("session.cookie_lifetime","60");
            echo "<script>history.forward(); </script>";   
         
            session_start();
            
         
         
            //    session_cache_expire(60);
               $_SESSION['id_sesion'] = session_id();
               $_SESSION['tipoUsuario']=$docente->tipo_usuario;
               $_SESSION['nombres'] = $docente->nombres;
               $_SESSION['apellidos'] = $docente->apellidos;
               $_SESSION['start'] = time();
               $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;						
               
               //MENSAJE DE BIENVENIDA CHAFA 

               
               echo "<script> alert('Bienvenido ".$_SESSION['id_sesion']."');
               </script>";
               echo "<script> alert('Bienvenido ".$_SESSION['nombres']."');
               </script>";
               
   

                // $this->index();
            //    $this->view('pages/inicio', $datos);
               redireccionar('index/index2');  
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