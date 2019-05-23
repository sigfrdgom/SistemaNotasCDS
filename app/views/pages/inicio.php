<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

echo "<h1>Vista de Inicio</h1>";
//echo $datos['nombres'],"<br/>";
$datos['nombres'];
echo RUTA_APP."<br>";

var_dump($datos['nombres']);
echo "<ul>";
foreach ($datos['nombres'] as $nombre) {
    echo "<li>$nombre->nombres</li>";
}
echo "</ul>";

/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>