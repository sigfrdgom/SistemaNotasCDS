<?php if (empty($datos['participante'])) { ?>
    <td colspan="9" class="text-center"><h5>Tu busqueda no tiene resultados</h5></td>
<?php } else { ?>

<?php foreach ($datos['participante'] as $participantes) { ?>
    <tr>
        <td class='secret dp0'><?php echo $participantes->id_participante ?></td>
        <td class=' dp1'><?php echo $participantes->nombres ?></td>
        <td class=' dp2'><?php echo $participantes->apellidos ?></td>
        <td class='secret dp3'><?php echo $participantes->fecha_nacimiento ?></td>
        <td class='secret dp4'><?php echo $participantes->sexo ?></td>
        <td class=' dp5'><?php echo $participantes->dui ?></td>
        <td class='secret dp6'><?php echo $participantes->nit ?></td>
        <td class='secret dp7'><?php echo $participantes->carnet_minoridad ?></td>
        <td class='secret dp8'><?php echo $participantes->direccion ?></td>
        <td class='secret dp9'><?php echo $participantes->telefono ?></td>
        <td class='secret dp10'><?php echo $participantes->email ?></td>
        
        
        <td><?php echo ($participantes->estado == 1? "ACTIVO":"INACTIVO") ?></td>
        <td class='secret dp12'><?php echo $participantes->pass ?></td>
        
        <td class='shrink'> <button type='button' value='Detalles' class='btn_editar_participante btn btn-warning ' data-toggle='modal' data-target='#agregarParticipante'>
        <span class='fa fa-edit'></span> Editar</td>

        <td class='shrink'><button id='btn_eliminar2' onclick="menjaseBaja('Participante/updateDown/<?php echo $participantes->id_participante;?>', null)" class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Dar baja</button></td>
    </tr>
                                
                
<?php } } ?>