<?php
/*Importacion de Header de la aplicacion*/
// require_once RUTA_APP . '/views/include/header.php';
require_once RUTA_APP . '/views/include/headerPadre.php';
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
                        
                        <div class="clearfix">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Este es el deck -->
            <!-- <div class="card-deck"> -->
            <!-- Este es el deck -->
        
                <?php if (empty($datos['tipoModulo'])){ ?>
                        <div class="card">
                            <h2 class="centrado">No hay registros</h2>
                        </div>
                <?php } else {  ?>
                    
                    <?php   $c = 0; $x=0;
                    foreach ($datos['tipoModulo'] as $tipo) {
                        if ($c % 4 == 0 ) { $x=1; ?>
                            <div class="card-deck align-middle">
                    <?php } ?> 
                    
                        <!-- El card -->
                        <div class="card p-2 ">
                            <div class="card-body" >
                                <h5 class="card-title">Modulo tipo</h5>
                                <p class="card-text"><?php echo "$tipo->nombre" ?> </p>
                                    <a href="<?php echo constant('RUTA_URL')."/modulo/detalle/".$tipo->id_tipo_modulo ?>"
                                    class="btn btn-primary btn-block text-center">Ver modulos</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Estado: <?php echo ($tipo->estado == 1)?"<b style='color: green'>Activo</b>":"<b style='color:red'>Inactivo</b>" ?></small>
                            </div>
                        </div>
                        <!-- El card -->

                    <?php if ($x == 4) { ?>
                        </div> <br>
                    <?php } ?>
                   
                    <?php $c++; $x++;}} ?>

            <!-- Este es el deck -->
            <!-- </div> -->
            <!-- Este es el deck -->
        </div>
    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>