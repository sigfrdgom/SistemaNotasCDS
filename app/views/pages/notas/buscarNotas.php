<?php
foreach ($datos['notas'] as $participantes) {
    ?>
    <tr>
        <td class="td-center"><?php echo $participantes->nombres ?></td>
        <td class="td-center"><?php echo $participantes->apellidos ?></td>
        <?php if ($participantes->evaluacion1){

            ?>
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
        <?php }
        $promedio = ($participantes->nota1*($participantes->evaluacion1/100)
            + $participantes->nota2*($participantes->evaluacion2/100)
            + $participantes->nota3*($participantes->evaluacion3/100)
            + $participantes->nota4*($participantes->evaluacion4/100)
            + $participantes->nota5*($participantes->evaluacion5/100)
            + $participantes->nota6*($participantes->evaluacion6/100)
        );
        ?>
        <th class="td-center" <?php echo ($promedio>=6) ? 'style="background: #76D7C4"' : 'style="background: #F9AD96"' ?> ><?php
            echo round($promedio, 2);
            ?></th>
        <td class="td-center"><?php echo $participantes->observaciones ?></td>
    </tr>
    </tr>
<?php } ?>