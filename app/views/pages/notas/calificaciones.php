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

    <div class="row">

        <div class="card card-body">

            <?php
            if (empty($datos['participantes'])) {
                ?>
                <div class="card ">
                    <h2 class="centrado">No hay registros</h2>
                </div>
                <?php
            } else {
            ?>
            <div class="table-responsive">
                <form action="<?php echo constant('RUTA_URL')?>/notas/create" method="POST" >
                    <input type="hidden" name="id_curso" value="<?php echo $datos['id_curso'] ?>">
                    <input type="hidden" name="id_modulo" value="<?php echo $datos['id_modulo'] ?>">
                    <table class="table table-sm table-bordered table-hover display ">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <?php if($datos['participantes'][0]->evaluacion1)  { ?>
                            <th>Nota1</th>
                            <?php } ?>
                            <?php if($datos['participantes'][0]->evaluacion2)  { ?>
                            <th>Nota2</th>
                            <?php } ?>
                            <?php if($datos['participantes'][0]->evaluacion3)  { ?>
                            <th>Nota3</th>
                            <?php } ?>
                            <?php if($datos['participantes'][0]->evaluacion4)  { ?>
                            <th>Nota4</th>
                            <?php } ?>
                            <?php if($datos['participantes'][0]->evaluacion5)  { ?>
                            <th>Nota5</th>
                            <?php } ?>
                            <?php if($datos['participantes'][0]->evaluacion6)  { ?>
                            <th>Nota6</th>
                            <?php } ?>
                            <th>Observaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($datos['participantes'] as $participantes) {
                            ?>
                            <tr>
                                <td><?php echo $participantes->nombres ?><input type="hidden" name="id_nota[]" value="<?php echo $participantes->id_nota ?>"><input type="hidden" name="id_modulos_curso[]" value="<?php echo $participantes->id_modulos_curso ?>"></td>
                                <td><?php echo $participantes->apellidos ?><input type="hidden" name="id_participante[]" value="<?php echo $participantes->id_participante ?>"></td>
                                <?php if($datos['participantes'][0]->evaluacion1)  { ?>
                                <td class="td-center"><input type="text" name="nota1[]" value="<?php echo $participantes->nota1 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <?php if($datos['participantes'][0]->evaluacion2)  { ?>
                                <td class="td-center"><input type="text" name="nota2[]" value="<?php echo $participantes->nota2 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <?php if($datos['participantes'][0]->evaluacion3)  { ?>
                                <td class="td-center"><input type="text" name="nota3[]" value="<?php echo $participantes->nota3 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <?php if($datos['participantes'][0]->evaluacion4)  { ?>
                                <td class="td-center"><input type="text" name="nota4[]" value="<?php echo $participantes->nota4 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <?php if($datos['participantes'][0]->evaluacion5)  { ?>
                                <td class="td-center"><input type="text" name="nota5[]" value="<?php echo $participantes->nota5 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <?php if($datos['participantes'][0]->evaluacion6)  { ?>
                                <td class="td-center"><input type="text" name="nota6[]" value="<?php echo $participantes->nota6 ?>" class="input-nota form-control" min="1" max="10" title="Ingrese un número en 0.00 y 10.00" maxlength="5" onkeypress="decimalonly();" onkeyup="validar_nota(this);" pattern="^[0-9]+([.][0-9]+)?$" ></td>
                                <?php } ?>
                                <td class="td-center"><input type="text" name="observaciones[]" value="<?php echo $participantes->observaciones ?>" class="form-control" onkeypress="textonly()"></td>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" value="Guardar">Guardar</button>
                </form>
                <?php } ?>
            </div>

        </div>
    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>
