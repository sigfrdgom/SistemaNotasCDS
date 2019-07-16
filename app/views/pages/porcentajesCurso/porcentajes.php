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
                <form method="post" style="margin: 0 auto">
                    <h3 class="text-center">Acciones</h3>
                    <button name="btnAgregar" class="btn btn-primary" >Agregar Porcentajes</button>
                    <button name="btnEditar" class="btn btn-warning" >Editar Porcentajes</button>
                </form>
            </div>
        </div>

        <div class="row margen-abajo-card">
            <div class="card card-body">
                <form method="POST" style="margin: 0 auto">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-form-label">Seleccione un curso: </label>
                        <div class="input-group mb-1 float-right col-sm-12">
                            <select name="select_id_curso" id="select_id_curso" class="form-control">
                                <?php foreach ($datos['cursoSinPorcentaje'] AS $item) { ?>
                                    <?php if ($item->nombre_curso) { ?>
                                        <option value="<?php echo $item->id_curso ?>"><?php echo $item->nombre_curso . ", NIVEL " . $item->nivel ?></option>
                                    <?php } else { ?>
                                        <option value="" disabled><?php echo "No existen cursos disponibles" ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>

                    </div>
                    <button type="button" class="btn btn-primary my-1" id="btn-seleccionar"><i class='fa fa-send'></i>
                        Seleccionar
                    </button>
                </form>
            </div>
        </div>

        <div id="div_procentajes"></div>


        <?php
        /*Importacion de Footer de la aplicacion */
        require_once RUTA_APP . '/views/include/footer.php';
        ?>
        <script src="<?php echo RUTA_URL ?>/js/views/porcentajeModulo.js"></script>

