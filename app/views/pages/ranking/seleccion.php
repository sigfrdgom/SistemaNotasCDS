<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';
?>
<!-- Start content -->
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Ranking</li>
                        <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Promedio de Modulos</h5>
                    <p class="card-text">Muestra los promedios de los participantes inscritos en el curso</p>
                    <button type="submit" class="btn btn-primary">Ver Promedios</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top de Notas por Curso</h5>
                    <p class="card-text">Detalla las mejores notas optenidas durante el curso</p>
                    <button type="submit" class="btn btn-primary">Ver Promedios</button>
                </div>
            </div>
        </div>


        <?php
        /*Importacion de Footer de la aplicacion */
        require_once RUTA_APP . '/views/include/footer.php';
        ?>
