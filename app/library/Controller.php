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




    public function sessionActiva(){
        session_start();
        if ((isset($_SESSION['id_sesion']))) { 
            
            echo "<script> alert('HOLA HAY SESSION ACTIVA EN CONTROLLER SUPREMO :V');</script>";
                
                if ($_SESSION['tipoUsuario']=='ADMINISTRADOR') {
                    return true;
                }else{
                    return false;

                }
        }else{
            session_destroy();
            echo "<script> alert('NO HAY SESSION AHORITA EN CONTROLLER MASTER :V');
            console.log('holaa');
                </script>";
            return false;  
        }

    }

    public function sessionMultiple(){
        session_start();
        if ((isset($_SESSION['id_sesion']))) { 
            
            echo "<script> alert('HOLA HAY SESSION ACTIVA EN CONTROLLER SUPREMO :V');</script>";
                
                if (($_SESSION['tipoUsuario']=='DOCENTE')||($_SESSION['tipoUsuario']=='ADMINISTRADOR')) {
                    return true;
                }else{
                    return false;

                }
        }else{
            session_destroy();
            echo "<script> alert('NO HAY SESSION AHORITA EN CONTROLLER MASTER :V');
            console.log('holaa');
                </script>";
            return false;
            
        }

    }





}
?>