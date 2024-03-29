<?php

class Login extends Controller
{

    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->docenteModel = $this->model('DocenteModel');
        $this->estudianteModel = $this->model('ParticipanteModel');

    }


    //FINALIZACION DE LA SESION
    public function finalizarSesion()
    {
        if (session_status()!= 2) {
            session_start();
        }
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]);
        }

        unset($_COOKIE['id_sesion']);     
        session_destroy(); 
        session_abort();
        $this->view('pages/login/login');
    }




    public function logIn()
    {
        
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&(session_status() != 2))
        {
            
                $estudiante = $this->estudianteModel->logIn($_POST['pass'],$_POST['dui']);  
                if($estudiante)
                {
                        session_start();
                    //    session_cache_expire(60);
                        $_SESSION['admin']="ADMINISTRADOR";
                        $_SESSION['admin2']="DOCENTE";
                        $_SESSION['admin3']="PARTICIPANTE";
                        $_SESSION['id_sesion'] = session_id();
                        $_SESSION['tipoUsuario']="PARTICIPANTE";
                        $_SESSION['id_participante'] = $estudiante->id_participante;
                        $_SESSION['nombres'] = $estudiante->nombres;
                        $_SESSION['apellidos'] = $estudiante->apellidos;
                  

                        redireccionar('index/index2');  
                }else{

                    $docente = $this->docenteModel->logIn($_POST['pass'],$_POST['dui']);
                //Verificacion de la consulta
                if($docente)
                {
                    //    ini_set("session.gc_maxlifetime","60");
                    //    ini_set("session.cookie_lifetime","60");
                        session_start();
                    //    session_cache_expire(60);
                        $_SESSION['admin']="ADMINISTRADOR";
                        $_SESSION['admin2']="DOCENTE";
                        $_SESSION['admin3']="PARTICIPANTE";
                        $_SESSION['id_sesion'] = session_id();
                        $_SESSION['tipoUsuario']=$docente->tipo_usuario;
                        $_SESSION['id_usuario'] = $docente->id_docente;
                        $_SESSION['nombres'] = $docente->nombres;
                        $_SESSION['apellidos'] = $docente->apellidos;
                    //    $_SESSION['start'] = time();
                    //    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;						

                        echo "<script> alert('Bienvenido ".$_SESSION['nombres']."');
                        </script>";

                        redireccionar('index/index2');  
                }else
                {
                //DESTRUIR TODA LA SESION Y COOKIES
                $this->finalizarSesion();
                }
            } 
        }else
        {
            $this->index();
        }
                }
                



    
                
    }



