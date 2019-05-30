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


}