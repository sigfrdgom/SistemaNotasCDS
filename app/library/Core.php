<?php

class Core
{
    protected $controladorActual = 'Index';
    protected $metodoActual = 'index';
    protected $parametros = [];

    //Constructor de la clase
    public function __construct(){

        $url = $this->getUrl();
        //Comprobar si la URL esta vacia y redireccionar
        $url[0] = isset($url[0])? $url[0] : $this->controladorActual;

        //buscar en controladores si el controlador existe
        if (file_exists('../app/controllers/' . ucwords($url [0] . '.php'))) {
            //Si existe se setea como controlador por defecto
            $this->controladorActual = ucwords($url[0]);

            //Destruir la variable en el indice espeficiado
            unset($url[0]);

            //comprobar que el controlador existe
            require_once '../app/controllers/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //verificar la segunda parte de la url que seria el método
            if (isset($url[1])) {
                if (method_exists($this->controladorActual, $url[1])) {
                    //verificar el metodo
                    $this->metodoActual = $url[1];
                    //Destruir la variable en el indice espeficiado
                    unset($url[1]);
                }
            }
            //Obtener los parametros
            $this->parametros = $url ? array_values($url) : [];

            //llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

        } else {
            require_once '../app/controllers/errores.php';
            $this->controladorActual = new Errores();
        }

    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>