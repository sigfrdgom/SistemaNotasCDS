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
                            <li class="breadcrumb-item active">Modulos por curso</li>
                            <li class="breadcrumb-item active">Cohortes</li>
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
        
                <?php if (empty($datos['curso'])){ ?>
                        <div class="card">
                            <h2 class="centrado">No hay registros</h2>
                        </div>
                <?php } else {  ?>
                    
                    <?php   $c = 0; $x=0;
                    foreach ($datos['curso'] as $cursos) {
                    if ($c % 4 == 0 ) { $x=1; ?>
                        <div class="card-deck">
                    <?php } ?> 
                    
                        <!-- El card -->
                        <div class="card p-2" >
                            <div class="card-body" >
                                <h5 class="card-title"><?php echo $cursos->cohorte ?></h5>
                                <p class="card-text"><?php echo "$cursos->nombre_curso" ?> </p>
                                    <a href="<?php echo constant('RUTA_URL')."/modulosCurso/nivel/". base64_encode($cursos->cohorte); ?>"
                                    class="btn btn-primary btn-block">Ver niveles</a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Sede: <?php echo $cursos->sede ?></small>
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