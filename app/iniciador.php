<?php
    /* Importar las librerias */
    require_once 'config/configurar.php';
    require_once 'helpers/url_helper.php';

    //Funcion Autoload que importa todos los archivos de clase carpeta library 
    spl_autoload_register(function($nombreClase){
        require_once 'library/' . $nombreClase. '.php';
    });
?>