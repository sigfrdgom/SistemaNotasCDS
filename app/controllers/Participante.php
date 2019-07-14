<?php
class Participante extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->participanteModel = $this->model('ParticipanteModel');
    }

    public function index(){
        $participante = $this->participanteModel->findAll();
        $descripcion = "Vista que muestra todos las participantes que existen";
        $datos = [
            'titulo' => "Participantes",
            'descripcion' => $descripcion,
            'participante' => $participante
        ];
        $this->view('pages/participante/participante', $datos);
    }

    public function create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'nombres' => trim($_POST['nombres']),
                'apellidos' => trim($_POST['apellidos']),
                'fecha_nacimiento' => trim($_POST['fecha_nacimiento']),
                'sexo' => trim($_POST['sexo']),
                'dui' => trim($_POST['dui']),
                'nit' => trim($_POST['nit']),
                'carnet_minoridad' => trim($_POST['carnet_minoridad']),
                'direccion' => trim($_POST['direccion']),
                'telefono' => trim($_POST['telefono']),
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass']),
                // 'estado' => trim($_POST['pestado'])
                'estado' => 1


            ];
            var_dump($datos);
            if($this->participanteModel->create($datos)){
                redireccionar('participante/participante');

            }else{
                die("Error al insertar los datos");
            }
        }



    }


    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           $datos = [
               'id' => trim($_POST['id']),
               'nombres' => trim($_POST['nombres']),
               'apellidos' => trim($_POST['apellidos']),
               'fecha_nacimiento' => trim($_POST['fecha_nacimiento']),
               'sexo' => trim($_POST['sexo']),
               'dui' => trim($_POST['dui']),
               'nit' => trim($_POST['nit']),
               'carnet_minoridad' => trim($_POST['carnet_minoridad']),
               'direccion' => trim($_POST['direccion']),
               'telefono' => trim($_POST['telefono']),
               'email' => trim($_POST['email']),
            // 'pass' => trim($_POST['ppass']),
            // 'estado' => trim($_POST['estado'])
                'estado' => 1


           ];
           var_dump($datos);
           if($this->participanteModel->update($datos)){
               redireccionar('participante/participante');

           }else{
               die("Error al actualizar los datos");
           }
       }


    
    }



    public function delete($id){
        if (isset($id)){
            if($this->participanteModel->delete($id)){
                redireccionar('participante/participante');
            }else{
                die("Error al eliminar los datos");
            }
        }else{
            $this->index();
        }
    }


    public function updateDown($id)
   {
        if (isset($id))
        {
            if($this->participanteModel->updateDown($id))
            {
                redireccionar('participante/participante');
            }
            else
            {
                die("Error al dar de baja el participante");
            }
        }
        else
        {
            $this->index();
        }
    }


}