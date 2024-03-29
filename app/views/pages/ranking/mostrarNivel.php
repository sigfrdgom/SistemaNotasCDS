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
            <div class="card-deck">

                <?php
                if (empty($datos['nivel'])) {
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                    <?php
                } else {
                $c = 0;
                foreach ($datos['nivel'] as $nivel) {
                if ($c % 5 == 0 && $c != 0) {
                ?>
            </div>
            <br/>
            <div class=\"card-columns\">
                <?php } ?>
                <div class="card p-2" style="width: 16rem;">
                    <form action="<?php echo constant('RUTA_URL') ?>/rankingNotas/seleccion/" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id_curso" value="<?php echo $datos['id_curso'] ?>">
                        <input type="hidden" name="nivel" value="<?php echo $nivel->id_nivel_curso ?>">
                        <h5 class="card-title"><?php echo $nivel->nivel_curso ?></h5>
                        <button type="submit" class="btn btn-primary">Nivel</button>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Estado: <?php
                            if ($nivel->estado == 1){
                                echo "Activo";
                            } else{
                                echo "Inactivo";
                            }?></small>
                    </div>
                    </form>
                </div>

                <?php
                $c++;
                }
                } ?>
            </div>
            <br/>


        </div>

    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>