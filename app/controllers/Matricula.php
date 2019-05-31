<?php
class Matricula extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->matriculaModel = $this->model('MatriculaModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');

    }

    public function index(){
        $matricula = $this->matriculaModel->findAll();
        $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findAll();
        
        $descripcion = "Vista que muestra todos las matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula,
            'participante' => $participante ,
            'curso' => $curso ,
        ];
        $this->view('pages/matricula', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_matricula' => null,
               'id_curso' => trim($_POST['mid_curso']),
               'id_participante' => trim($_POST['mid_participante']),
               'estado' => trim($_POST['mestado']),
               'observaciones' => trim($_POST['mobservaciones'])
           ];
           var_dump($datos);
           if($this->matriculaModel->create($datos))
           {
               redireccionar('matricula');

           }
           else
           {
               die("Error al insertar los datos");
           }
       }
   }

   public function delete($id)
   {
        if (isset($id))
        {
            if($this->matriculaModel->delete($id))
            {
                redireccionar('matricula');
            }
            else
            {
                die("Error al eliminar los datos");
            }
        }
        else
        {
            $this->index();
        }
    }

}