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
        //  session_start();
        if ((session_status() == 2)&&$_SESSION['id_sesion']==session_id()) { 
            
            echo "<script> alert('HOLA HAY SESSION :V');
                
                </script>";
            //validacion del tipoUsuario


            return true;
        }else{
            echo "<script> alert('HOLA NO HAY SESSION :V');
                
                </script>";
            return false;
            
        }

    }



}
?>