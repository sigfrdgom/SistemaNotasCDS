<?php
class Curso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->cursoModel = $this->model('CursoModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');   
    }

    public function index(){
        $this->sessionActivaX();
        $curso = $this->cursoModel->findAll();
        $nivelCurso = $this->nivelCursoModel->findAll();
        // $obtenerNivel = $this->nivelCursoModel;
        $cantidadParticipantes =$this->cursoModel;
        $descripcion = "Vista que muestra todos los cursos que existen";
        $datos = [
            'titulo' => "Curso",
            'descripcion' => $descripcion,
            'curso' => $curso,
            'cantidadParticipantes' => $cantidadParticipantes,
            'obtenerNivel' => $nivelCurso
        ];
        $this->view('pages/curso/curso', $datos);
    }

    public function create()
    {
        $this->sessionActivaX();

        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
            $datos = [
                'id_curso' => null,
                'nombre_curso' => trim($_POST['cnombre']),
                'cohorte' => trim($_POST['ccohorte']),
                'descripcion' => trim($_POST['cdescripcion']),
                'duracion' => trim($_POST['cduracion']),
                'sede' => trim($_POST['csede']),
                'estado' => trim($_POST['cestado']),
                'nivel' => trim($_POST['cnivel']),
                'fecha_inicio' => trim($_POST['cfecha_inicio']),
                'fecha_fin' => trim($_POST['cfecha_fin'])
            ];
            var_dump($datos);
            if($this->cursoModel->create($datos))
            {
                redireccionar('curso');
            }
            else
            {
                die("Error al insertar los datos");
            }
        }else{
            redireccionar('curso');
        }
    }

    public function findById($id=null){
        $this->sessionActivaX();
            if(isset($id))
            {
                return $this->cursoModel->findById($id);
            }else{
                redireccionar('curso');
                die("Error al buscar el dato");
                
                redireccionar('curso');
            }
        }
        
    

    public function update()
    {
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
            $datos = [
            'id_curso' => trim($_POST['cid']),
            'nombre_curso' => trim($_POST['cnombre']),
            'cohorte' => trim($_POST['ccohorte']),
            'descripcion' => trim($_POST['cdescripcion']),
            'duracion' => trim($_POST['cduracion']),
            'sede' => trim($_POST['csede']),
            'estado' => trim($_POST['cestado']),
            'nivel' => trim($_POST['cnivel']),
            'fecha_inicio' => trim($_POST['cfecha_inicio']),
            'fecha_fin' => trim($_POST['cfecha_fin'])
        ];
    
        if($this->cursoModel->update($datos))
        {
            redireccionar('curso');
        }
        else
        {
            redireccionar('curso');   
            die("Error al actualizar los datos");
        }
    }else{
        redireccionar('curso');
    }
    }

    public function updateDown($id = null) 
    {
    $this->sessionActivaX();
        if (isset($id))
        {
            if($this->cursoModel->updateDown($id))
            {
                redireccionar('curso');
            }
            else
            {
                redireccionar('curso');
                die("Error al dar de baja el curso"); 
            }
        }
        else
        {
            redireccionar('curso');
        }

    }



    public function countParticipante($id = null){
        $this->sessionActivaX();
        if(isset($id)){
            return $this->cursoModel->countParticipante($id);
        }else{
        redireccionar('curso');
            die("Error al buscar el dato");
        }
    }


    public function promote($id_curso = null)
    {
        $this->sessionActivaX();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if ($curso =$this->cursoModel->findById($id_curso)) {
                //  var_dump($curso);
                $bandera = $this->comprobar($curso->cohorte, $curso->nivel );
                if ($bandera) {
                    // Entonces promovemos
                        $datos = [
                            'id_curso' => null,
                            'nombre_curso' => trim($curso->nombre_curso),
                            'cohorte' => trim($curso->cohorte),
                            'descripcion' => trim($curso->descripcion),
                            'duracion' => trim($_POST['prmduracion']),
                            'sede' => trim($curso->sede),
                            'estado' => 1,
                            'nivel' => trim($curso->nivel + 1),
                            'fecha_inicio' => trim($_POST['prmcfecha_inicio']),
                            'fecha_fin' => trim($_POST['prmcfecha_fin'])
                        ];
                            if($this->cursoModel->create($datos))
                            {
                                redireccionar('curso');
                            }
                            else
                            {
                                die("Error al insertar los datos");
                            }
                } else {
                    echo "<script> alert('No se puede promover el curso');
                    window.location='".RUTA_URL."/curso';
                    </script>";
                }
                
            } else {
                die("Error en los datos");
            }
        }
    }

    public function comprobar($cohorte,$nivel)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $bandera = $this->cursoModel->comprobar($cohorte,$nivel);
        }
            if ($bandera->n_registros == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
    }

    public function buscarCursos(){
        $this->sessionActivaX();
        $id_curso = $_POST['id_curso'];
        $busqueda = $_POST['busqueda'];

        $datos = [
            'id_curso' => trim($id_curso),
            'busqueda' => trim($busqueda)
        ];

        if($busqueda == null || $busqueda== ""){
            $notas = $this->cursoModel->findAll();
        }else{
            $notas = $this->cursoModel->findByCriteria($datos);
        }

        $datos = [
            'curso' => $notas,
        ];

        $this->view('pages/curso/buscarCurso', $datos);
    }

}