<?php if (empty($datos['docente'])) { ?>
    <td colspan="9" class="text-center"><h5>Tu busqueda no tiene resultados</h5></td>
<?php } else { ?>

<?php foreach ($datos['docente'] as $docentes) { ?>
      
       <tr id="fila-<?php echo $docentes->id_docente;?>">
           <td class="secret"><?php echo $docentes->id_docente;?></td>
           <td><?php echo $docentes->nombres ?></td>
           <td><?php echo $docentes->apellidos?></td>
           <td class="secret"><?php echo $docentes->fecha_nacimiento?></td>
           <td class="secret"><?php echo $docentes->sexo ?></td>
           <td class="secret"><?php echo $docentes->dui?></td>
           <td class="secret"><?php echo $docentes->nit ?></td>
           <td><?php echo $docentes->especialidad ?></td>
           <td class="secret"><?php echo $docentes->tipo_usuario?></td>
           <td class="secret"><?php echo $docentes->pass ?></td>
           <td><?php if($docentes->estado ==1) {
               echo 'ACTIVO';}else{ echo 'INACTIVO';} ?></td>
           <td class='shrink'><button type='button' class='btn btn-warning btn_editar_usuario' data-toggle='modal' data-target='#agregarUsuario'><span class='fa fa-edit'></span> Editar</button></td>
           <td class='shrink'><button id='btn_eliminar3' onclick='menjaseBaja("docente/updateDown/<?php echo $docentes->id_docente?>", <?php echo $docentes->id_docente?>)' class='btn btn-danger alert_sweet'><span class='fa fa-warning bigfonts'></span> Dar baja</button></td>
        </tr>
                
<?php } } ?>