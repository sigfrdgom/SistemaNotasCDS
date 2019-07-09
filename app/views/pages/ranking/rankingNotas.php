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
<!--                            <th>Promedio</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $c = 0;
                        foreach ($datos['participantes'] as $participante) {
                        ?>
                        <tr>
                            <td><?php echo $participante->nombres . " " . $participante->apellidos;
                                ?>
                            </td>
                            <?php
                            $suma=0;
                            for ($i=0; $i<sizeof($datos['modulos']); $i++){
                                ?>
                                <?php
                                if(isset($datos['matrizModulos'][$i][$c])) {
                                    ?>
                                    <td style="background: rgb(130, 224, 170, 0.8);">
                                    <?php
//                                    $suma += promedioModulo($datos['matrizModulos'][$i][$c]);
                                    echo promedioModulo($datos['matrizModulos'][$i][$c]);
                                    }else{
                                    ?>
                                    <td style="background: rgb(241, 148, 138, 0.8)">
                                    <?php
                                    echo "No";
                                }
                                    ?>

                                </td>
                                <?php
                            }

//                            $promedio= $suma/sizeof($datos['modulos']);
//                            if($promedio>6){
//                                ?>
<!--                            <td style="background: rgb(130, 224, 170, 0.8);">-->
<!--                                --><?php
//                                echo $promedio;
//                            }else{
//                                ?>
<!--                            <td style="background: rgb(241, 148, 138, 0.8)">-->
<!--                                --><?php
//                                echo $promedio;
//                            }
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
        </div>
    </div>

<?php

function promedioModulo($notas)
{
    if (!$notas) {
        return "No";
    }
    $c = 0;
    $nota1 = 0;
    $nota2 = 0;
    $nota3 = 0;
    $nota4 = 0;
    $nota5 = 0;
    $nota6 = 0;

    if ($notas->evaluacion1) {
        $nota1 = $notas->nota1;
        $c++;
    }
    if ($notas->evaluacion2) {
        $nota2 = $notas->nota2;
        $c++;
    }
    if ($notas->evaluacion3) {
        $nota3 = $notas->nota3;
        $c++;
    }
    if ($notas->evaluacion4) {
        $nota4 = $notas->nota4;
        $c++;
    }
    if ($notas->evaluacion5) {
        $nota5 = $notas->nota5;
        $c++;
    }
    if ($notas->evaluacion6) {
        $nota6 = $notas->nota6;
        $c++;
    }
    return ($nota1 + $nota2 + $nota3 + $nota4 + $nota5 + $nota6) / $c;
}

/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>