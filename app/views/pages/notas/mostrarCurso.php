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
            $c=0;
            foreach ($datos['cursos'] as $cursos) {
            if ($c%5 == 0 && $c !=0){
                echo "</div>
                <br/>
                <div class=\"card-columns\">
                ";
            }
            ?>
                <div class="card p-2" style="width: 16rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cursos->cohorte?></h5>
                        <p class="card-text"><?php echo $cursos->nombre_curso?></p>
                        <a href="<?php echo constant('RUTA_URL') ?>/notas/modulos/<?php echo $cursos->id_curso?>" class="btn btn-primary">Ver Modulos</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Inicio: <?php echo $cursos->fecha_inicio ?></small>
                    </div>
            </div>

        <?php
            $c++;
            } ?>
        </div>
        <br/>



    </div>

    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>