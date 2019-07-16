<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';
?>

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                    <h3 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h3>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
           
            <!-- Presentacion sistema -->
            <div>    
                <div class="container-fluid align-middle">
                
                    <div class="row card-deck mx-0 ">
                        
                        <div class="col my-3 mx-0">
                            <div class="card">
                                <div class="card-img-top text-center mt-3" >

                                    <img src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" class="img-fluid" style="width: 60%">
                                    <img src="<?php echo RUTA_URL ?>/img/logo/fgk.png" class="img-fluid mr-5" style="width: 15%">
                                    
                                </div>
                                
                                    <div class="card-body text-justify mx-3">
                                        <p class="card-text">
                                            <b>Razon de ser del proyecto</b><br> <br>
                                            El proyecto surge con la necesita de solventar el inconveniente modo de manejar las notas para el personal del Proyecto de USAID, Puentes para el Empleo, Centro de Desarrollo de Software y Fundación Gloria de Kriete sede de Santa Ana, de los participantes de los cursos que imparten y facilitar en la medida de lo posible la gestión de notas y reportes dentro de dicho proyecto.
                                            <br><br><b>Objetivos</b><br>
                                            <ul>
                                                <li>
                                                    Crear un sistema de notas que integre diferentes funcionalidades para que sea un sistema integral capaz de gestionar las notas de todos los participantes del proyecto CDS.
                                                </li>
                                                <br>
                                                <li>
                                                    Implementar en el sistema de notas, al funcionabilidad necesaria para el correcto funcionamiento de este y que pueda proveer de información que facilite la obtencion de reportes de desempeño, manteniendo la eficiencia, seguridad y la mayor usabilidad posible.
                                                </li>
                                            </ul>
                                            Todo lo anterior desarrollado y montado en un entorno web para que pueda ser accedido desde cualquier dispositivo con acceso a internet o intranet(Celular, Tablet, Computadora) y llegar a implementarse en más sedes aparte de Santa Ana, que es la sede donde se realiza el desarrollo de este proyecto.
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            

            

            <!-- Equipo de desarrollo -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3 pb-2 border-dark border">
                        <h3>Equipo de desarrollo</h3>
                </div>
                
                <div class="container-fluid">
                    <div class="row card-deck" >

                        <!-- Card Carlos Martinez -->
                        <div class="col mx-0 my-3" style="height: 25em" >
                            <div class="card">
                            
                                <div class="card-img-top text-center mt-2">
                                    <img src="<?php echo RUTA_URL ?>/img/team/Carlos.jpg" class="img-fluid rounded-circle border border-info" style="width: 10em; height: 10em">
                                </div>
                                <div  class="text-center mt-2 text-white" style="background: black">
                                    <h4 class="mt-2">Carlos Martinez </h4>
                                </div>
                                <div class="card-body text-justify">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="align-bottom">
                                    <div class="bg-info text-center" style="font-size: 2em;">
                                    <a class="text-dark mx-3" href=""><i class="fab fa-linkedin-square"></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fas fa-file-pdf "></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Kevin Martinez -->
                        <div class="col mx-0 my-3" style="height: 25em" >
                            <div class="card">
                            
                                <div class="card-img-top text-center mt-2">
                                    <img src="<?php echo RUTA_URL ?>/img/team/Kevin.jpg" class="img-fluid rounded-circle border border-info" style="width: 10em; height: 10em">
                                </div>
                                <div  class="text-center mt-2 text-white" style="background: black">
                                    <h4 class="mt-2">Kevin Martinez </h4>
                                </div>
                                <div class="card-body text-justify">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="align-bottom">
                                    <div class="bg-info text-center" style="font-size: 2em;">
                                    <a class="text-dark mx-3" href=""><i class="fab fa-linkedin-square"></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fas fa-file-pdf "></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Sigfrido Gómez -->
                        <div class="col mx-0 my-3" style="height: 25em" >
                            <div class="card">
                            
                                <div class="card-img-top text-center mt-2">
                                    <img src="<?php echo RUTA_URL ?>/img/team/Sigfrido.jpg" class="img-fluid rounded-circle border border-info" style="width: 10em; height: 10em">
                                </div>
                                <div  class="text-center mt-2 text-white" style="background: black">
                                    <h4 class="mt-2">Sigfrido Gómez </h4>
                                </div>
                                <div class="card-body text-justify">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="align-bottom">
                                    <div class="bg-info text-center" style="font-size: 2em;">
                                    <a class="text-dark mx-3" href=""><i class="fab fa-linkedin-square"></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fas fa-file-pdf "></i></a>
                                    <a class="text-dark mx-3" href=""><i class="fa fa-phone" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <div>

                
            <!-- plataformas -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3 pb-2 border-danger border" >
                        <h3>Enfoque a multiplataforma</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row card-deck">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-mobile" aria-hidden="true" style="font-size: 10em; color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Smartphone</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Sistema probado y accesible desde Smartphones a traves de navegador WEB</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-tablet" aria-hidden="true" style="font-size: 10em; color: #002e6c "></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Tablet</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Sistema probado y accesible desde Tablets a traves de navegador WEB.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-laptop" aria-hidden="true" style="font-size: 10em; color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Laptop</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Sistema accesible desde laptop a traves de navegador WEB como target principal.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-desktop" aria-hidden="true" style="font-size: 10em; color: #002e6c"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Desktop</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Sistema accesible desde Desktop-PC a traves de navegador WEB como target principal.</p>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>
            
            <!-- Tecnologias -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3 pb-2 border-warning border">
                        <h3>Tecnologias</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row card-deck">
                        
                        <div class="col my-3 mx-2" >
                            <div class="card" >
                                <div class="card-img-top text-center align-middle mt-3" >

                                    <i class="fab fa-git mr-5" aria-hidden="true" style="font-size: 5em; color: #002e6c;"></i><br>
                                    <i class="fab fa-github-square ml-5" aria-hidden="true" style="font-size: 5em; color: #b90b2e"></i>
                                    
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Git y GitHub</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Controlador de versiones y trabajo colaborativo en el proyecto.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card" >
                                <div class="card-img-top text-center mt-3" >
                                    <i class="fab fa-html5 mx-2"  aria-hidden="true" style="font-size: 5em; color: #b90b2e"></i>
                                    <i class="fab fa-css3-alt mx-2"  aria-hidden="true" style="font-size: 5em; color: #002e6c"></i><br>
                                    <i class="fab fa-js mx-2"  aria-hidden="true" style="font-size: 5em; color: #f29800" ></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Stack Web</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Para diseño y maquetado de vistas funcionales Front-End del sistema.</p>
                                    </div>
                            </div>
                        </div>


                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fab fa-php" aria-hidden="true" style="font-size: 10em; color:#002e6c"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">PHP</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Lenguaje principal del proyecto y logica de Backend y servicios del sistema.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fas fa-database" aria-hidden="true" style="font-size: 10em; color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">MariaDB</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Gestor de datos para el resgaurdo de los datos usados y proveidos por el sistema.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fas fa-server" aria-hidden="true" style="font-size: 10em; color: #f29800"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h4 class="mt-2">Apache Server</h4>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Servidor apache para montaje del sistema, servidor de aplicaciónes del sistema.</p>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>

            <!--  funciones -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3 pb-2 border-info border">
                        <h3>Principales funciones</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row card-deck">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 7em;color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Gestion de cursos</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-book" aria-hidden="true" style="font-size: 7em;color: #f29800 "></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Gestion de modulos</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-id-badge" aria-hidden="true" style="font-size: 7em;color: #002e6c"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Control de usuarios</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-id-card" aria-hidden="true" style="font-size: 7em;color: #f29800 "></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Control de participantes</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-share-alt" aria-hidden="true" style="font-size: 7em;color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">API REST READY</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                    </div>

                    <div class="row card-deck">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-certificate" aria-hidden="true" style="font-size: 7em; color: #f29800"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Gestion de matriculas</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 7em;color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Notas y evaluaciones</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-question-circle" aria-hidden="true" style="font-size: 7em;color: #002e6c"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Soporte incluido</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-print" aria-hidden="true" style="font-size: 7em;color: #b90b2e"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Reportes</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-unlock" aria-hidden="true" style="font-size: 7em; color: #f29800"></i>
                                </div>
                                    <div class="text-center mt-2" style="background: #cad3e0">
                                        <h6 class="mt-2 " style="font-weight: bolder">Seguridad</h6>
                                    </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>

                
            </div>
 
        </div>
    </div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>