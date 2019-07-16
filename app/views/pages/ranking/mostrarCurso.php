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
                            <li class="breadcrumb-item active">Ranking</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card-deck" style="margin: 0 auto" >
                <?php
                if (empty($datos['cursos'])) {
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                    <?php
                } else {
                foreach ($datos['cursos'] as $cursos) {
                ?>
                <div class="card p-2 card-mostrar" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cursos->cohorte ?></h5>
                        <p class="card-text"><?php echo $cursos->nombre_curso ?>
                        <small class="text-info"><?php echo "Nivel: ".$cursos->nivel ?></small></p>
                            <div>
                                <form action="<?php echo constant('RUTA_URL') ?>/rankingNotas/seleccion/" method="post">
                                    <input type="hidden" name="id_curso" value="<?php echo $cursos->id_curso ?>">
                                    <input type="hidden" name="nivel" value="<?php echo $cursos->nivel ?>">
                                    <button type="submit" class="btn btn-primary btn-block">Ranking</button>  
                                </form>
                            </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Inicio: <?php echo $cursos->fecha_inicio ?></small>
                    </div>
                </div>
                <?php
                }
                } ?>
            </div>
        </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>
