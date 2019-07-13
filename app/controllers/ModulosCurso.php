<?php
class ModulosCurso extends Controller
{
    public function __construct() 
    {
        //Cargar Modelos de la paginas;
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->tipoModuloModel = $this->model('TipoModuloModel');

    }

    public function index()
    {
        $curso = $this->cursoModel->findByCohorte();
        $descripcion = "Vista que muestra todos los modulosCurso que existen";
       
        $datos = [
            'titulo' => "Modulos por curso",
            'descripcion' => $descripcion,
            'curso' =>$curso
        ];
        $this->view('pages/modulosCurso/modulosCurso', $datos);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Recibiendo y limpiando los arreglos
            $modulo=$_POST['mcid_modulo'];
            $array=$_POST['mcid_docente'];
            $limit=count($array);
            
                for ($i=0; $i < $limit; $i++) { 
                    if ($array[$i] == "") {
                        unset($array[$i]);
                    }
                }
            
            $docente = array_values($array);
            
            // Recorriendo los arreglos para guardar la informacion correspondiente
            $limit=count($modulo);
                for ($x=0; $x < $limit; $x++) 
                { 
                    // Para comprobar si existe ya una tupla con la informacion, si no existe la insertamos, de lo contrario la pasamos de largo
                    $bandera=$this->comprobar(trim($_POST['mcidcurso']),trim($modulo[$x]));
                    if ($bandera) {
                        $datos = [
                            'id_modulos_curso' => null,
                            'id_curso' => trim($_POST['mcidcurso']),
                            'id_modulo' => trim($modulo[$x]),
                            'id_docente' => trim($docente[$x]),
                            'observaciones' => trim($_POST['mcobservaciones'])
                            ];

                                if(!$this->modulosCursoModel->create($datos))
                                {
                                    die("Error al insertar los datos"); 
                                    return;
                                }  
                    } else {
                        echo "Error al insertar el modulo al curso, ya existen";
                    }  
                }
            redireccionar("modulosCurso/curso/".$_POST['mcidcurso']);
       }
    }

    public function createORG()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           $datos = [
               'id_modulos_curso' => null,
               'id_curso' => trim($_POST['mcidcurso']),
               'id_modulo' => trim($_POST['mcid_modulo']),
               'id_docente' => trim($_POST['mcid_docente']),
               'observaciones' => trim($_POST['mcobservaciones'])
            ];
            
            
            if($this->modulosCursoModel->create($datos))
            {
                redireccionar("modulosCurso/curso/".$_POST['mcidcurso']);
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
                'id_curso' => trim($_POST['mcidcurso']),
                'id_modulo' => trim($_POST['mcid_modulo']),
                'id_docente' => trim($_POST['mcid_docente']),
                'observaciones' => trim($_POST['mcobservaciones'])
            ];
           
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

    public function nivel($cohorte)
    {
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Vista que muestra todos las cursos con sus respectivos modulos que existen";
        $datos = [
            'titulo' => "Niveles ".base64_decode($cohorte),
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];
        $this->view('pages/modulosCurso/modulosCursoNivel', $datos);
    }

    public function curso($id_curso)
    {
        $curso = $this->cursoModel->findById($id_curso);
        $modulo = $this->moduloModel->findAll();
        $docente = $this->docenteModel->findAll();
        $modulosCurso = $this->modulosCursoModel->findByNivel($id_curso);
        $tipoModulo = $this->tipoModuloModel->findAll();
        
        $descripcion = "Vista que muestra todos las modulos pertenecientes a un curso";
        $datos = [
            'titulo' => "Modulos del curso $curso->nombre_curso, Nivel $curso->nivel ",
            'descripcion' => $descripcion,
            'modulosCurso' => $modulosCurso,
            'curso' => $curso,
            'modulo' =>$modulo,
            'docente' => $docente,
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/modulosCurso/modulosCursoDetalle', $datos);
    }

    public function comprobar($curso,$modulo)
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
       {
          $datos = [
              'id_curso' => $curso,
              'id_modulo' => $modulo
          ];  
          $bandera = $this->modulosCursoModel->comprobar($datos);
      }
      if ($bandera[0]->n_registros == 0) {
            return TRUE;
      } else {
            return FALSE;
      }
      
    } 
}



