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
                    <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp;</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row margen-abajo-card">
            <div class="card card-body">
                <div class="col-xl-12">
                    <form method="POST">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-form-label">Seleccione un curso: </label>
                            <div class="input-group mb-1 float-right col-sm-4">
                                <select name="id_curso" class="form-control">
                                    <?php foreach ($datos['cursoSinPorcentaje'] AS $item){?>
                                        <?php if($item->nombre_curso){ ?>
                                            <option value="<?php echo $item->id_curso ?>"><?php echo $item->nombre_curso ?></option>
                                        <?php } else{?>
                                            <option disabled ><?php echo "No existen cursos disponibles"?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary my-1"><i class='fa fa-send'></i> Seleccionar</button>

                        </form>


                </div>
            </div>
        </div>

        <div class="row margen-abajo-card">
            <div class="card card-body">
                <div class="col-xl-12">
                    <form method="POST">

                        <table class="table table-sm table-bordered table-hover display">
                            <thead>
                            <th>Curso</th>
                            <?php foreach ($datos['tipoModulo'] as $item){ ?>
                                <th><input type="hidden" name="id_tipoModulo[]" value="<?php echo $item->id_tipo_modulo ?>"><?php echo $item->nombre ?></th>
                            <?php } ?>
                            </thead>
                            <tbody id="table-content ">
                            <td>La curacao para vivir mejo</td>
                            <?php foreach ($datos['tipoModulo'] as $item){ ?>
                                <td><div class="input-group">
                                        <input type="text" class="form-control text-centrado porcentaje" maxlength="5" onkeypress="decimalonly()" onkeyup="filterFloat(this);sumar()" aria-label="Ingrese un porcentaje" pattern="^[0-9]+([.][0-9]+)?$" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div></td>
                            <?php } ?>

                            </tbody>
                        </table>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error">
                            <strong>Error en los porcentajes</strong> La sumatoria debe ser de 100%. El porcentaje total actual es de: <label id="total_danger"></label>%.
                        </div>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-warning">
                            <strong>Revisar Pocentajes</strong> La sumatoria de los porcentajes es menor de 100%. El porcentaje total actual es de: <label id="total_warning"></label>%.

                        </div>

                        <button type="submit" class="btn btn-primary my-1"><i class='fa fa-save'></i> Guardar</button>

                    </form>




                </div>
            </div>
        </div>


        <?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>
        <script src="<?php echo RUTA_URL ?>/js/views/porcentajeModulo.js"></script>

