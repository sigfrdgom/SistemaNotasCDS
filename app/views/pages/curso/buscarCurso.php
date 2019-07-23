<?php foreach ($datos['curso'] as $cursos) { ?>
                    
        <tr id='fila-<?php echo $cursos->id_curso; ?>' class="center">
                <td class='secret'><?php echo $cursos->id_curso; ?></td>
                <td><?php echo $cursos->nombre_curso ?></td>

                <td><?php echo $cursos->cohorte; ?></td>
                <td class='secret'><?php echo $cursos->descripcion ?> </td>
                <td class='secret'><?php echo $cursos->duracion ?></td>
                <td><?php echo $cursos->sede ?></td> 
                <td><?php echo ($cursos->estado == 1? "ACTIVO":"INACTIVO") ?></td>

                <td class="nivel">Nivel <?php echo $cursos->nivel?></td>

                <td class='secret'><?php echo $cursos->fecha_inicio ?></td>
                <td><?php echo $cursos->fecha_fin; ?></td>
                <td class='shrink'><button type='button' data-nivel="<?php echo $cursos->nivel;?>"
                class='btn btn-warning btn_editar_curso' 
                data-toggle='modal' data-target='#agregarCurso'><span class='fa fa-edit'></span> Editar</button></td>
                <td class='shrink'><button id='btn_eliminar2' onclick="menjaseBaja('curso/updateDown/<?php echo $cursos->id_curso ?>', <?php echo $cursos->id_curso ?>)" class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Dar baja</button></td>

                <?php  if ($cursos->nivel < 3) {  ?>

                        <td class="shrink"><button type="button" class="btn btn-info btn_promover_curso ivkprmcurso" data-toggle="modal" data-target="#promoverCurso" >
                        <span class='fa fa-line-chart bigfonts'></span> Promover</button></td>

                <?php } else{ ?>

                <td class="shrink"></td>

        <?php } ?>
</tr>
        
<?php } ?>