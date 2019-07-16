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
                <h1 class="main-title float-left">
                
                <?php echo $datos['titulo'] ?>&nbsp;</h1>

                <!-- El boton para agregar a traves de un modal -->
                   
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    

    <div class="row">
    
        <div class="card card-body">
            <!-- Para busquedas -->
            <!-- <div class="mb-2">
                <?php if (!empty($datos['curso'])) { ?>
                    <div class="col-xl-12">
                                
                        <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                    data-id-curso="<?php echo $datos['id_curso'] ?>"
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div>
                    </div>
                <?php } ?>
            </div> -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover display text-center">
                    <thead>
                    <tr>
                        <th class='secret'>ID</th>
                        <th>Cohorte</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        
                        <th colspan="2">Acciones
                            <a href="#" 
                                title="Generar reporte de desempeño"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirve para imprimir el reporte de desempeño por curso y nivel">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tbody-table">
                    <?php
                     
                    foreach ($datos['curso'] as $cursos) { ?>
                    
                        <tr id='fila-<?php echo $cursos->id_curso; ?>' class="center">
                                <td class='secret'><?php echo $cursos->id_curso; ?></td>
                                <td><?php echo $cursos->cohorte; ?></td>
                                <td><?php echo $cursos->nombre_curso ?></td>
                                <td><?php echo "Nivel $cursos->nivel " ?></td>
                                
                                
                                <td><?php echo $cursos->sede ?></td> 
                                <td><?php echo ($cursos->estado == 1? "ACTIVO":"INACTIVO") ?></td>
                                <!-- <td class="nivel"><?php echo $cursos->nivel ?></td> -->
                                <td colspan="2">

                                <!-- <form action="<?php echo constant('RUTA_URL')."/rankingNotas/rankingtop/" ?>" method="post">
                                
                                    <input type="hidden" name="id_curso" value="<?php echo $cursos->id_curso ?>">
                                    <input type="hidden" name="nivel" value="<?php echo $cursos->nivel ?>">

                                    <button type="submit" class="btn btn-primary btn-block"><span class='fa fa-print'></span> Generar reporte</button>
                                </!--> 
                                    <a href="<?php echo constant('RUTA_URL')."/reporte/generarDsmpNivel/$cursos->id_curso/$cursos->nivel" ?> " target="_blank" class="btn btn-primary btn-block">
                                        <span class='fa fa-print'></span> Generar reporte
                                    </a>
                                </td>
 
                        </tr>
                                
                                <?php }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
<!-- <script src="<?php echo RUTA_URL ?>/js/views/cursos.js"></script> -->
<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>