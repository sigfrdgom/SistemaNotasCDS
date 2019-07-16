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
                            <li class="breadcrumb-item active">Notas</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="card-deck">

                <?php
                if (empty($datos['cursos'])) {
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                    <?php
                } else {
                $c = 0;
                foreach ($datos['cursos'] as $cursos) {
                if ($c % 5 == 0 && $c != 0) {
                ?>
            </div>
            <br/>
            <div class=\"card-columns\">
                <?php } ?>
                <div class="card p-2" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cursos->cohorte ?></h5>
                        <p class="card-text"><?php echo $cursos->nombre_curso ?></p>
                        <a href="<?php echo constant('RUTA_URL') ?>/rankingNotas/nivel/<?php echo $cursos->id_curso ?>"
                           class="btn btn-primary">Nivel</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Inicio: <?php echo $cursos->fecha_inicio ?></small>
                    </div>
                </div>

                <?php
                $c++;
                }
                } ?>
            </div>
            <br/>


        </div>

    </div>

