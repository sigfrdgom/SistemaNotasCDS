<?php
//    require_once RUTA_APP . '/views/include/header.php';
  require_once RUTA_APP . '/views/include/headerPadre.php';

    


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
                            <i class="fa fa-id-badge float-right text-white"></i>
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
                            <i class="fa fa-graduation-cap float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Cursos</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_cursos'] ?></h1>
                            <span class="text-white">Ultimo: C# Xamarim</span>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                            <i class="fa fa-book float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Modulos</h6>
                            <h1 class="m-b-20 text-white counter"><?php echo $datos['n_modulos']?></h1>
                            <span class="text-white">5 Ingresos de notas</span>
                        </div>
                    </div>

                </div>
                <!-- end row -->


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fa fa-line-chart"></i> Promedio por Cursos</h3>
                    Pricipales promedios de los curso activos en el proyecto CDS
                </div>

                <div class="card-body">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="card-footer small text-muted">Actualizado ayer a las 11:59 AM [ This is MOCK-UP <b>:(</b> ]</div>
            </div><!-- end card-->
        </div>
    </div>



<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>

                <script>
                    var ctx1 = document.getElementById("lineChart").getContext('2d');
                    var urlPromedios= 'http://localhost/SistemaNotasCDS/indexRest/grafica';

                    fetch(urlPromedios).then(
                        res =>{return res.json();}
                    ).then( response =>{
                        console.log(response.promedios);
                        var lineChart = new Chart(ctx1, {
                            type: 'bar',
                            data: {
                                labels: response.cursos,
                                datasets: [{
                                    label: 'Promedio Por Curso',
                                    backgroundColor: ['#b90c2f','#ff5d48','#f1b53d','#3db9dc','#002f6c'],
                                    data: response.promedios
                                }]

                            },
                            options: {
                                tooltips: {
                                    mode: 'index',
                                    intersect: false
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        stacked: true,
                                    }],
                                    yAxes: [{
                                        stacked: true
                                    }]
                                }
                            }
                        });
                    });

                </script>


                <!-- END Java Script for this page -->
