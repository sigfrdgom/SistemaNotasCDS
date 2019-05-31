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
            'titulo' => "participante",
            'descripcion' => $descripcion,
            'participante' => $participante
        ];
        $this->view('pages/participante', $datos);
    }

    public function create(){
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'nombres' => trim($_POST['pnombres']),
                'apellidos' => trim($_POST['papellidos']),
                'fecha_nacimiento' => trim($_POST['pfechanacimiento']),
                'sexo' => trim($_POST['psexo']),
                'dui' => trim($_POST['pdui']),
                'nit' => trim($_POST['pnit']),
                'carnet_minoridad' => trim($_POST['pcarnet_minoridad']),
                'direccion' => trim($_POST['pdireccion']),
                'telefono' => trim($_POST['ptelefono']),
                'email' => trim($_POST['pemail']),
                'pass' => trim($_POST['ppass']),
                'estado' => trim($_POST['pestado'])


            ];
            var_dump($datos);
            if($this->participanteModel->create($datos)){
                redireccionar('participante');

            }else{
                die("Error al insertar los datos");
            }
        }



    }


    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           $datos = [
               'id' => trim($_POST['pdid']),
               'nombres' => trim($_POST['pdnombres']),
               'apellidos' => trim($_POST['pdapellidos']),
               'fecha_nacimiento' => trim($_POST['pdfechanacimiento']),
               'sexo' => trim($_POST['pdsexo']),
               'dui' => trim($_POST['pddui']),
               'nit' => trim($_POST['pdnit']),
               'carnet_minoridad' => trim($_POST['pdcarnet_minoridad']),
               'direccion' => trim($_POST['pddireccion']),
               'telefono' => trim($_POST['pdtelefono']),
               'email' => trim($_POST['pdemail']),
            // 'pass' => trim($_POST['ppass']),
               'estado' => trim($_POST['pdestado'])


           ];
           var_dump($datos);
           if($this->participanteModel->update($datos)){
               redireccionar('participante');

           }else{
               die("Error al actualizar los datos");
           }
       }


    
    }



    public function delete($id){
        if (isset($id)){
            if($this->participanteModel->delete($id)){
                redireccionar('participante');
            }else{
                die("Error al eliminar los datos");
            }
        }else{
            $this->index();
        }
    }

}