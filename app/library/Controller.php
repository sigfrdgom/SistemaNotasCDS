 <?php
//clase encargada de cargar los modelos y las vistas
class Controller{

    //cargar modelo
    public function model($model){
        //verificar que el modelo exista
        require_once '../app/models/'. $model. '.php';
        //Instanciar el modelo
        return new $model();
    }

    //Cargar vista
    public function view($vista, $datos = []){
        //verificar si el archivo de la vista existe
        if (file_exists('../app/views/'. $vista. '.php')) {
            require_once '../app/views/'. $vista. '.php';
        }else{
            //Si el archivo no existe en la vista
            die("El archivo de la vista no existe");
        }

    }




    // public function sessionActiva(){
    //     session_start();
    //     if ((isset($_SESSION['id_sesion']))) { 
            
    //         echo "<script> alert('HOLA HAY SESSION ACTIVA EN CONTROLLER SUPREMO :V');</script>";
                
    //             if ($_SESSION['tipoUsuario']=='ADMINISTRADOR') {
    //                 return true;
    //             }else{
    //                 echo "<script> alert('NO ESTA AUTORIZADO');
    //                 window.location='".RUTA_URL."';
    //                 </script>";
    //                 return false;
    //                 exit;
    //             }
    //                 ;

                
    //     }else{
    //         session_destroy();
    //         echo "<script> alert('NO HAY SESSION AHORITA EN CONTROLLER MASTER :V');
    //         console.log('holaa');
    //             </script>";
    //         return false;  
    //     }

    // }

    // public function sessionMultiple(){
    //     session_start();
    //     if ((isset($_SESSION['id_sesion']))) { 
            
    //         echo "<script> alert('HOLA HAY SESSION ACTIVA EN CONTROLLER SUPREMO :V');</script>";
                
    //             if (($_SESSION['tipoUsuario']=='DOCENTE')||($_SESSION['tipoUsuario']=='ADMINISTRADOR')) {
    //                 return true;
    //             }else{
    //                 return false;

    //             }
    //     }else{
    //         session_destroy();
    //         echo "<script> alert('NO HAY SESSION AHORITA EN CONTROLLER MASTER :V');
    //         console.log('holaa');
    //             </script>";
    //         return false;
            
        // }

    // }

    //  PD. Por el momento de no logre pensar algo mas optimo, se que lo hay sorry

    // Para que un metodo solo sea usado por el admin
    public function sessionActivaX(){
        session_start();
        if ((isset($_SESSION['id_sesion']))) { 
            
            // echo "<script> alert('HOLA HAY SESSION ACTIVA EN CONTROLLER SUPREMO :V');</script>";
                
                if ($_SESSION['tipoUsuario']==$_SESSION['admin']) {
                    return true;
                }else{

                    $this->NoAUTH();
                    // require_once '../app/controllers/errores.php';
                    // $this->controladorActual = new Errores();
                    // $this->controladorActual->errorNoAUTH();
                    //MEJORAR EL MENSAJEEEEEEEEEEEEEEE
                    // echo "<script> alert('NO ESTA AUTORIZADO');
                    // window.location='".RUTA_URL."/index/index2';
                    // </script>";
                    exit;
                }

                
        }else{
            $this->NoLOG();
            // session_destroy();
            // // echo "<script> alert('NO HAY SESSION AHORITA EN CONTROLLER MASTER :V');</script>";
            // require_once '../app/controllers/errores.php';
            //         $this->controladorActual = new Errores();
            //         $this->controladorActual->errorNoLOG();

            // // echo "<script> alert('NO ESTA AUTORIZADO');
            // //     window.location='".RUTA_URL."';
            // //     </script>";
            //     exit;
        }

    }

    // El metodo solo puede ser usado por admin y docente
    public function sessionActivaXD(){
        session_start();
        if ((isset($_SESSION['id_sesion']))) {   
            if ($_SESSION['tipoUsuario']==$_SESSION['admin']) {
                return true;
            }else if ($_SESSION['tipoUsuario']==$_SESSION['admin2']) {
                return true;
            }else{
                $this->NoAUTH();
            }   
        }else{
            $this->NoLOG();
        }

    }

    // El metodo puede ser usado por cualquier usuario del sistema
    public function sessionActivaXDP(){
        session_start();
        if ((isset($_SESSION['id_sesion']))) {   
            if ($_SESSION['tipoUsuario']==$_SESSION['admin']) {
                return true;
            }else if ($_SESSION['tipoUsuario']==$_SESSION['admin2']) {
                return true;
            }else if ($_SESSION['tipoUsuario']==$_SESSION['admin3']) {
                return true;
            }else{
                $this->NoAUTH();
            }  
        }else{
            $this->NoLOG();
        }
    }

    // Funciones para ahorrar codigo
    public function NoAUTH(){
        require_once '../app/controllers/errores.php';
        $this->controladorActual = new Errores();
        $this->controladorActual->errorNoAUTH();
        exit;
    }

    public function NoLOG(){
        session_destroy();
        require_once '../app/controllers/errores.php';
        $this->controladorActual = new Errores();
        $this->controladorActual->errorNoLOG();
        exit;
    }

}
?>