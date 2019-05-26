<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>
    <h1>Vista de Porcentajes Curso</h1>

<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th colspan="2">Acciones</th>
    </tr>
    <?php
    foreach ($datos[''] as $tipoModelos){
        echo "<tr>
        <td>$porcentajesCurso->porcentaje</td>
        <td>$porcentajesCurso->observacion</td>
        </tr>
        ";
    }
    ?>
</table>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>