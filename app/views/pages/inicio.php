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
                        <h1 class="main-title float-left"><?php echo $datos['titulo'] ?></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div>

                <div class="row">


                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                            <i class="fa fa-user-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Usuarios</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_usuarios'] ?></h1>
                            <span class="text-white">5 Nuevos Usuarios</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-success">
                            <i class="fa fa-user-o float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Participantes</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_participantes']?></h1>
                            <span class="text-white">5 Nuevos Usuarios</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                            <i class="fa fa-bar-chart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Cursos</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_cursos'] ?></h1>
                            <span class="text-white">5 Cursos agregados</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="fa fa-book float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Notas</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_notas']?></h1>
                            <span class="text-white">5 Ingresos de notas</span>
                        </div>
                    </div>

                </div>
                <!-- end row -->



<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>