<?php if (empty($datos['modulo'])) { ?>
    <td colspan="9" class="text-center"><h5>Tu busqueda no tiene resultados</h5></td>
<?php } else { ?>

<?php
    foreach ($datos['modulo'] as $modulos) {  ?>
        <tr>
            <td class='secret'><?php echo $modulos->id_modulo ?></td>
            <td><?php echo $modulos->nombre_modulo ?></td>
            <td class='secret'><?php echo $modulos->descripcion_modulo ?></td>
            <td class='secret'><?php echo $modulos->horas_modulo ?></td>
            <td class='secret'><?php echo $modulos->tipo_modulo ?></td>
            <td><?php echo $modulos->evaluacion1?></td>
            <td><?php echo ($modulos->evaluacion2 == 0.0?'---': $modulos->evaluacion2) ?></td>
            <td><?php echo ($modulos->evaluacion3 == 0.0?'---': $modulos->evaluacion3) ?></td>
            <td><?php echo ($modulos->evaluacion4 == 0.0?'---': $modulos->evaluacion4) ?></td>
            <td><?php echo ($modulos->evaluacion5 == 0.0?'---': $modulos->evaluacion5) ?></td>
            <td><?php echo ($modulos->evaluacion6 == 0.0?'---': $modulos->evaluacion6) ?></td>
            <td><?php echo ($modulos->estado == 1?'ACTIVO':'INACTIVO') ?></td>
            <td class='shrink '><button  class='centrado btn btn-warning btn_editar_modulo' data-toggle='modal' data-target='#agregarModulo'><span class='fa fa-edit'></span> Editar</button></td>
            
            <td class='shrink align-middle'><button id='btn_eliminar2' data-Modulo="<?php echo $modulos->id_modulo;?>"
                onclick='menjaseBaja("<?php echo RUTA_URL."/modulo/down/$modulos->id_modulo"?>")' 
                class='centrado btn btn-danger'><span class='fa fa-trash'></span> Dar baja</button></td>
        </tr>
                
<?php } } ?>