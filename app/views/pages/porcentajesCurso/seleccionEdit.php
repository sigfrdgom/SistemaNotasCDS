<div class="row margen-abajo-card">
    <div class="card card-body">
        <form method="POST" style="margin: 0 auto">
            <div class="form-group row">
                <label for="inputEmail3" class="col-form-label">Seleccione un curso: </label>
                <div class="input-group mb-1 float-right col-sm-12">
                    <select name="select_id_curso" id="select_id_curso" class="form-control">
                        <?php foreach ($datos['cursoConPorcentaje'] AS $item) { ?>
                            <?php if ($item->nombre_curso) { ?>
                                <option value="<?php echo $item->id_curso ?>"><?php echo $item->nombre_curso . ", NIVEL " . $item->nivel ?></option>
                            <?php } else { ?>
                                <option value="" disabled><?php echo "No existen cursos disponibles" ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

            </div>
            <button type="button" class="btn btn-primary my-1" id="btn-seleccionar"><i class='fa fa-send'></i>
                Seleccionar
            </button>
        </form>
    </div>
</div>