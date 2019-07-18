<?php

/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/headerLogin.php';
?>

<div class="limiter">
    <div class="container-login100">


        <div class="wrap-login100">
            <div class="div-completo">
                <label>BIENVENIDOS A NOTAS CDS</label>
            </div>
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo RUTA_URL ?>/img/fondo/img-01.jpg" alt="IMG">
            </div>

            <!-- <form class="login100-form validate-form"> -->
            <form class="login100-form validate-form"  id="formu" method="POST" action="<?php echo RUTA_URL ?>/login/logIn" data-parsley-validate novalidate >

					<span class="login100-form-title">
						Iniciar Sesión
					</span>

                <div class="wrap-input100 validate-input" data-validate = "El DUI es requerido, ejemplo: 03456123-9">
                    <input class="input100" type="text" name="dui" placeholder="DUI">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
                    <input class="input100" type="password" name="pass" placeholder="Contraseña">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>


                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" value="Iniciar" name="validando">
    
                </div>

                <div class="text-center p-t-12">
                </div>

                <div class="text-center p-t-136">
                </div>
            </form>
        </div>
    </div>
</div>




<!--===============================================================================================-->
<script src="<?php echo RUTA_URL ?>/js/plugin/jquery/jquery-3.4.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo RUTA_URL ?>/assets/js/popper.min.js"></script>
<script src="<?php echo RUTA_URL ?>/assets/css/bootstrap.min.css"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="<?php echo RUTA_URL ?>/js/plugin/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="<?php echo RUTA_URL ?>/js/views/login.js"></script>



</body>
</html>