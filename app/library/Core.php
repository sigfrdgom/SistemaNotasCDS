<?php
class Core{
    protected $controladorActual = 'Paginas';
    protected $metodoActual = 'index';
    protected $parametros = [];

    //Constructor de la clase
    public function __construct(){
        //print_r($this->getUrl());
        $url = $this->getUrl();
        
        //buscar en controladores si el controlador existe
        if(file_exists('../app/controllers/' .ucwords($url [0]. '.php'))){
            //Si existe se setea como controlador por defecto
            $this->controladorActual= ucwords($url[0]);

            //unset indice
            unset($url[0]);
        }

        //comprobar que el controlador existe
        require_once '../app/controllers/' . $this->controladorActual . '.php';
        $this->controladorActual = new $this->controladorActual;

        //verificar la segunda parte de la url que seria el método
        if (isset($url[1])) {
            if(method_exists($this->controladorActual, $url[1])){
                //verificar el metodo
                $this->metodoActual = $url[1];
                //unset indice
                unset($url[1]);
            }
        }
        //comprobar que parametro es correcto
        //echo $this->metodoActual ;
        
        //obtener los parametros
        $this->parametros = $url ? array_values($url) : [];

        //llamar callback con parametros array
        call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getUrl(){
        //echo $_GET['url'];

        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}
?>