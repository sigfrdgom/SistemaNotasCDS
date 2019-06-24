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
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-form-label">Seleccione un curso: </label>
                            <div class="input-group mb-1 float-right col-sm-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary my-1">Seleccionar</button>

                        </form>


                </div>
            </div>
        </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>
