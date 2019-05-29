<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>

    <!-- BEGIN CSS for this page -->
    <style>
        .parsley-error {
            border-color: #ff5d48 !important;
        }

        .parsley-errors-list.filled {
            display: block;
        }

        .parsley-errors-list {
            display: none;
            margin: 0;
            padding: 0;
        }

        .parsley-errors-list > li {
            font-size: 12px;
            list-style: none;
            color: #ff5d48;
            margin-top: 5px;
        }

        .form-section {
            padding-left: 15px;
            border-left: 2px solid #FF851B;
            display: none;
        }

        .form-section.current {
            display: inherit;
        }
    </style>
    <!-- END CSS for this page -->

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?php echo $datos['titulo'] ?></h1>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover display">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($datos['TipoModulo'] as $tipoModelos) {
                                echo "<tr>
                                <td>$tipoModelos->nombre</td>
                                <td>$tipoModelos->estado</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><a href='' class='btn btn-danger'><span class='fa fa-trash'></span> Eliminar</a></td>
                                </tr>
                                ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Nuevo Registro</h3>
                    </div>

                    <div class="card-body">

                        <form action="#" data-parsley-validate novalidate>
                            <div class="form-group">
                                <label for="userName">Nombre de Usuario<span class="text-danger">*</span></label>
                                <input type="text" name="nick" data-parsley-trigger="change" required
                                       placeholder="Ingrese el nombre de usuario" class="form-control" id="userName">
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" data-parsley-trigger="change" required
                                       placeholder="Enter email" class="form-control" id="emailAddress">
                            </div>
                            <div class="form-group">
                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                <input id="pass1" type="password" placeholder="Password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                <input data-parsley-equalto="#pass1" type="password" required placeholder="Password"
                                       class="form-control" id="passWord2">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <div>
                                    <input data-parsley-type="url" type="url" class="form-control" required
                                           placeholder="URL"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <div>
                                    <input data-parsley-type="number" type="text" class="form-control" required
                                           placeholder="Enter only numbers"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Textarea</label>
                                <div>
                                    <textarea required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="remember-1" type="checkbox">
                                    <label for="remember-1"> Remember me </label>
                                </div>
                            </div>

                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary m-l-5">
                                    Cancel
                                </button>
                            </div>

                        </form>

                    </div>
                </div><!-- end card-->
            </div>


        </div>

    </div>
    <!-- END container-fluid -->

    </div>
    <!-- END content -->


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>