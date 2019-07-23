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
                        <h1 class="main-title float-left">
                            <a href="<?php echo constant('RUTA_URL') ?>/notas">    
                                <i class="fas fa-arrow-circle-left color-primary"></i>
                            </a>
                            <?php echo $datos['titulo'] ?> &nbsp;</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Notas</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card-deck" style="margin: 0 auto">
                <?php
                if (empty($datos['modulos'])){
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                    <?php
                }else{
                foreach ($datos['modulos'] as $modulos) {
                ?>
                
                <?php if ($_SESSION['id_usuario'] == $modulos->id_docente || $_SESSION['tipoUsuario']=="ADMINISTRADOR") { ?>
                    
                    <div class="card p-1 card-mostrar">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;" ><?php echo $modulos->nombre_modulo ?></h6>
                            <p class="card-text"><?php echo $modulos->descripcion_modulo ?></p>
                        </div>
                        <div class="mx-3 mb-2">
                        <form action="<?php echo constant('RUTA_URL') ?>/notas/calificaciones/<?php echo $datos['id_curso'] ?>/<?php echo $modulos->id_modulo ?>" method="post">
                        <button type="submit" class="btn btn-success btn-block">Ver Modulos</button>
                        </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Inicio: <?php echo $modulos->horas_modulo ?></small>
                        </div>
                    </div>

                <?php
                }
                }
                } ?>
            </div>
    </div>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>