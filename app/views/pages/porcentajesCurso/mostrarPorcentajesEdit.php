<div class="row margen-abajo-card">
    <div class="card card-body">
        <div class="col-xl-12">
            <form method="POST" id="form_porcentajes" action="<?php echo RUTA_URL ?>/porcentajeCurso/guardarPorcentajes">

                <table class="table table-sm table-bordered table-hover display">
                    <thead>
                    <th>Curso</th>
                    <?php foreach ($datos['porcentajes'] as $item) { ?>
                        <th><input type="hidden" name="id_tipoModulo[]"
                                   value="<?php echo $item->id_tipo_modulo ?>" class="id_procentaje_class"><?php echo $item->nombre ?></th>
                    <?php } ?>
                    </thead>
                    <tbody id="table-content ">
                    <td><input type="hidden" id="id_curso_text" name="id_curso_text" value="<?php echo $datos['curso']->id_curso ?>"><?php echo $datos['curso']->nombre_curso ?></td>
                    <?php foreach ($datos['porcentajes'] as $item) { ?>
                        <td style="min-width: 76px;">
                            <div class="input-group">
                                <?php  ?>
                                <input type="hidden" name="id_porcentajes_curso[]" value="<?php echo $item->id_porcentajes_curso ?>" >
                                <input type="text" value="<?php echo $item->porcentaje ?>" class="form-control text-centrado porcentaje" name="porcentajes_curso[]" maxlength="5"
                                       onkeypress="decimalonly()" onkeyup="filterFloat(this);sumar()"
                                       aria-label="Ingrese un porcentaje" pattern="^[0-9]+([.][0-9]+)?$">
                                <div class="input-group-append" >
                                    <span class="input-group-text text-center" >%</span>
                                </div>
                            </div>
                        </td>
                    <?php } ?>

                    </tbody>
                </table>

                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error">
                    <strong>Error en los porcentajes</strong> La sumatoria debe ser de 100%. El porcentaje total actual
                    es de: <label id="total_danger"></label>%.
                </div>

                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-warning">
                    <strong>Revisar Pocentajes</strong> La sumatoria de los porcentajes es menor de 100%. El porcentaje
                    total actual es de: <label id="total_warning"></label>%.
                </div>

                <button type="submit" id="btn-porcentajes-save" class="btn btn-primary my-1"><i class='fa fa-save'></i> Guardar</button>
                <button type="reset" class="btn btn-secondary my-1" >Limpiar</button>
            </form>
        </div>
    </div>
</div>