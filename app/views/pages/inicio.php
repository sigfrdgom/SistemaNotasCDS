<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

echo "<h1>Vista de Inicio</h1>";
echo $datos['titulo'],"<br/>";
echo RUTA_APP;

var_dump($datos['usuarios']);
echo "<ul>";
foreach ($datos['usuarios'] as $usuarios) {
    echo "<li>$usuarios->username</li>";
}
echo "</ul>";

/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>