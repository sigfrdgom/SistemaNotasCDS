<?php
foreach ($datos['notas'] as $participantes) {
    ?>
    <tr>
        <td class="td-center"><?php echo $participantes->nombres?></td>
        <td class="td-center"><?php echo $participantes->apellidos?></td>
        <td class="td-center"><?php echo $participantes->nota1 ?></td>
        <td class="td-center"><?php echo $participantes->nota2 ?></td>
        <td class="td-center"><?php echo $participantes->nota3 ?></td>
        <td class="td-center"><?php echo $participantes->nota4 ?></td>
        <td class="td-center"><?php echo $participantes->nota5 ?></td>
        <td class="td-center"><?php echo $participantes->nota6 ?></td>
        <td class="td-center"><?php echo $participantes->observaciones ?></td>
        <td class="td-center"><a href='#' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
        </td>
    </tr>
<?php } ?>