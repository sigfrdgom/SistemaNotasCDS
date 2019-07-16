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
                <h1 class="main-title float-left mb-2"><?php echo $datos['titulo'] ?>&nbsp;</h1>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">

        <div class="card card-body">
            <!-- Para busqueda -->
            <div class="mb-2">
                <?php if (!empty($datos['matricula'])) { ?>
                    <div class="col-xl-12">
                                
                        <!-- <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                    data-id-curso="<?php echo $datos['id_matricula'] ?>"
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div> -->
                    </div>
                <?php } ?>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th class='secret'>ID Matricula</th>
                        <th class='secret'>ID Curso</th>
                        <th class='secret'>Curso</th>
                        <th class='secret' > ID Participante</th>
                        <th>Participante</th>
                        <th class='secret'>Estado</th>
                        <th class='secret'>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos['matricula'] as $matricula) { ?>
                        <tr>
                                <td class='secret' ><?php echo $matricula->id_matricula ?></td>
                                <td class='secret' ><?php echo $matricula->id_curso ?></td>
                                <td class='secret'><?php echo $matricula->nombre_curso.", nivel ".$matricula->nivel ?></td>
                                <td class='secret' ><?php echo $matricula->id_participante ?></td>
                                <td ><?php echo $matricula->nombre ?></td>
                                <td class='secret'><?php echo ($matricula->estado == 1? "ACTIVO":"INACTIVO") ?></td>
                                <td class='secret'><?php echo $matricula->observaciones ?></td>
                                <td class='shrink' colspan="2">
                                    <a href="<?php echo constant('RUTA_URL')."/reporte/generarDsmpParticipante/$matricula->id_curso/$matricula->nivel/$matricula->id_participante" ?> " target="_blank" class="btn btn-primary btn-block">
                                        <span class='fa fa-print'></span> Generar reporte
                                        <!-- <?php //echo constant('RUTA_URL')."reporte/generarDsmpParticipante/$matricula->id_curso/$matricula->nivel/$matricula->id_participante" ?> -->
                                    </a>
                                </td>
                                
                                </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>