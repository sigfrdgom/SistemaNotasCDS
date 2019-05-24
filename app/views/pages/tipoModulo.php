<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>
    <h1>Vista de Tipo Modulo</h1>

<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php
    foreach ($datos['tipoModelo'] as $tipoModelos){
        echo "<tr>
        <td>$tipoModelos->nombre</td>
        <td>$tipoModelos->estado</td>
        </tr>
        ";
    }
    ?>
</table>



<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>