<?php
class ModulosCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');

    }

    public function index(){
        // $modulosCurso = $this->modulosCursoModel->findForTable();
        // $docente = $this->docenteModel->findAll();
        // $curso = $this->cursoModel->findAll();
        // $modulo = $this->moduloModel->findAll();
        $curso = $this->cursoModel->findByCohorte();

        $descripcion = "Vista que muestra todos los modulosCurso que existen";
       
        $datos = [
            'titulo' => "Modulos por curso",
            'descripcion' => $descripcion,
            // 'modulosCurso' => $modulosCurso,
            // 'docente' => $docente,
            'curso' =>$curso,
            // 'modulo' =>$modulo
        ];
        $this->view('pages/modulosCurso/modulosCurso', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_modulos_curso' => null,
               'id_curso' => trim($_POST['mcid_curso']),
               'id_modulo' => trim($_POST['mcid_modulo']),
               //'id_modulo' => $_POST['mcid_modulo'],
               'id_docente' => trim($_POST['mcid_docente']),
               'observaciones' => trim($_POST['mcobservaciones'])
           ];
           var_dump($datos);
           if($this->modulosCursoModel->create($datos))
           {
               redireccionar("modulosCurso/curso/".$_POST['mcid_curso']);
           }
           else
           {
               die("Error al insertar los datos");
           }
       }
   }
   
   public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_modulos_curso' => trim($_POST['idmc']),
               'id_curso' => trim($_POST['mcid_curso']),
               'id_modulo' => trim($_POST['mcid_modulo']),
               'id_docente' => trim($_POST['mcid_docente']),
               'observaciones' => trim($_POST['mcobservaciones'])
           ];
           var_dump($datos);
           if($this->modulosCursoModel->update($datos))
           {
               redireccionar('modulosCurso/modulosCurso');

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
            if($this->modulosCursoModel->delete($id))
            {
                redireccionar('modulosCurso/modulosCurso');
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

    public function down($id)
    {
         if (isset($id))
         {
             if($this->moduloModel->updateDown($id))
             {
                 redireccionar('modulosCurso/modulosCurso');
             }
             else
             {
                 die("Error al dar de baja el modulo");
             }
         }
         else
         {
             $this->index();
         }
     }

     public function nivel($cohorte){
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Vista que muestra todos las cursos con sus respectivos modulos que existen";
        $datos = [
            'titulo' => "Cursos disponibles en el COHORTE",
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];
        $this->view('pages/modulosCurso/modulosCursoNivel', $datos);
    }

    public function curso($id_curso){
        // $matricula = $this->matriculaModel->findForTableCurso($id_curso);
        // $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findAll();
        $modulosCurso = $this->modulosCursoModel->findByNivel($id_curso);
        $modulo = $this->moduloModel->findAll();
        $docente = $this->docenteModel->findAll();
        
        $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            // 'matricula' => $matricula,
            // 'participante' => $participante ,
            'modulosCurso' => $modulosCurso,
            'curso' => $curso ,
            'id_curso' => $id_curso,
            'modulo' =>$modulo,
            'docente' => $docente
        ];
        $this->view('pages/modulosCurso/modulosCursoDetalle', $datos);
    }

}



