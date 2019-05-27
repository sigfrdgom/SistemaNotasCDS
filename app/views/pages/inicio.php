<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $datos['titulo'] ?>
            <small><?php echo $datos['descripcion'] ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>