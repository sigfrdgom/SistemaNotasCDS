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


    <div class="row">
        <div class="card card-body">
            <?php if (empty($datos['modulos'])) {
                ?>
                <h2 class="text-center">No existen registros</h2>
            <?php } else { ?>
                <div class="card-deck">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover display ">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <?php
                                foreach ($datos['modulos'] as $modulo) {
                                    ?>
                                    <th><?php echo $modulo->nombre_modulo ?></th>
                                    <?php
                                }
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $c = 0;
                            foreach ($datos['matrizModulos'][0] as $participante) {
                            ?>
                            <tr>
                                <td><?php echo $participante->nombres . " " . $participante->apellidos;
                                    ?>
                                </td>
                                <?php
                                for ($i = 0; $i < sizeof($datos['modulos']); $i++) {
                                    ?>
                                    <?php
                                    if (isset($datos['matrizModulos'][$i][$c])) {
                                        $prom = promedioModulo($datos['matrizModulos'][$i][$c]);
                                        if ($prom > 6) {
                                            ?>
                                            <td class="text-center" style="background: rgb(130, 224, 170, 0.8);">
                                            <?php
                                        } else {
                                            ?>
                                            <td class="text-center" style="background: rgb(241, 148, 138, 0.8)">
                                            <?php
                                        }
                                        echo $prom;
                                    } else {
                                        ?>
                                        <td class="text-center" style="background: rgb(241, 148, 138, 0.8)">
                                        <?php
                                        echo "Vacío";
                                    }
                                    ?>
                                    </td>
                                    <?php
                                }
                                ?>
                                </td>
                                <?php
                                $c++;
                                } ?>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php
function promedioModulo($notas)
{
    if (!$notas) {
        return "Vacío";
    }
    $prom = 0;

    if ($notas->evaluacion1) {
        $prom += $notas->nota1 * ($notas->evaluacion1 / 100);
    }
    if ($notas->evaluacion2) {
        $prom += $notas->nota2 * ($notas->evaluacion2 / 100);
    }
    if ($notas->evaluacion3) {
        $prom += $notas->nota3 * ($notas->evaluacion3 / 100);
    }
    if ($notas->evaluacion4) {
        $prom += $notas->nota4 * ($notas->evaluacion4 / 100);
    }
    if ($notas->evaluacion5) {
        $prom += $notas->nota5 * ($notas->evaluacion5 / 100);
    }
    if ($notas->evaluacion6) {
        $prom += $notas->nota6 * ($notas->evaluacion6 / 100);
    }
    return round($prom, 2);
}

/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>