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
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="card-deck">
                <!-- El card -->
                <div class="card p-2">
                    <div class="card-body" >
                        <h5 class="card-title">Desempeño por Cohorte</h5>
                        <p class="card-text"> Descripción del reporte </p>
                            <a href="#" class="btn btn-primary btn-block">Generar Reporte</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Otra información sobre el reporte </small>
                    </div>
                </div>
                <!-- El card -->

                <!-- El card -->
                <div class="card p-2" >
                    <div class="card-body" >
                        <h5 class="card-title">Desempeño por nivel</h5>
                        <p class="card-text"> Descripción del reporte </p>
                            <a href="#" class="btn btn-primary btn-block">Generar Reporte</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Otra información sobre el reporte </small>
                    </div>
                </div>
                <!-- El card -->

                <!-- El card -->
                <div class="card p-2">
                    <div class="card-body" >
                        <h5 class="card-title">Desempeño por participante</h5>
                        <p class="card-text"> Descripción del reporte </p>
                            <a href="#" class="btn btn-primary btn-block">Generar Reporte</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Otra información sobre el reporte </small>
                    </div>
                </div>
                <!-- El card -->

            </div> 
        </div>
    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>