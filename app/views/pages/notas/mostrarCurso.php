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
                    <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
        <div class="card-columns">

        <?php for ($i=0 ; $i <= 12 ; $i++){
            if ($i%5 == 0){
                echo "</div>
                <div class=\"card-deck\">
                ";
            }
            ?>
                <div class="card p-3" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cohorte 4</h5>
                        <p class="card-text">Programador analista en PHP.</p>
                        <a href="#" class="btn btn-primary">Ver Modulos</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
            </div>

        <?php } ?>
        </div>



    </div>

    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>