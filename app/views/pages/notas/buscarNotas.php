<?php
foreach ($datos['notas'] as $participantes) {
    ?>
    <tr>
        <td class="td-center"><?php echo $participantes->nombres ?></td>
        <td class="td-center"><?php echo $participantes->apellidos ?></td>
        <?php if ($participantes->evaluacion1){ ?>
            <td class="td-center"><?php echo $participantes->nota1 ?></td>
        <?php } ?>
        <?php if ($participantes->evaluacion2){ ?>
            <td class="td-center"><?php echo $participantes->nota2 ?></td>
        <?php } ?>
        <?php if ($participantes->evaluacion3){ ?>
            <td class="td-center"><?php echo $participantes->nota3 ?></td>
        <?php } ?>
        <?php if ($participantes->evaluacion4){ ?>
            <td class="td-center"><?php echo $participantes->nota4 ?></td>
        <?php } ?>
        <?php if ($participantes->evaluacion5){ ?>
            <td class="td-center"><?php echo $participantes->nota5 ?></td>
        <?php } ?>
        <?php if ($participantes->evaluacion6){ ?>
            <td class="td-center"><?php echo $participantes->nota6 ?></td>
        <?php } ?>
        <th class="td-center"><?php
            $promedio = ($participantes->nota1 + $participantes->nota2 + $participantes->nota3 + $participantes->nota4 + $participantes->nota5 + $participantes->nota6) / 6;
            echo round($promedio, 2);
            ?></th>
        <td class="td-center"><?php echo $participantes->observaciones ?></td>
        <td class="td-center"><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span>
                Editar</a></td>
        </td>
    </tr>
    </tr>
<?php } ?>