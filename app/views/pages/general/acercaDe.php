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
                
                <!-- <div class="text-center breadcrumb-holder">
                        <h3>Razon de ser</h3>
                </div> -->
                
                <div class="container-fluid align-middle">
                
                    <div class="row mx-0 ">
                        
                        <div class="col my-3 mx-3">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <img src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" class="img-fluid" width="50%">
                                    <!-- <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 10em"></i> -->
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">
                                            <b>Razon de ser</b> <br>
                                            Some quick example text to build on the card title and make up the bulk of the card's content.
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi, officiis dicta accusantium voluptatum incidunt asperiores consectetur officia. Nam, mollitia cumque? Maxime, animi quasi? Illo beatae esse facere minima a ab.
                                            <br><br><b>Objetivos</b><br>
                                            <ul>
                                                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse, laborum nobis, provident impedit facilis aliquid tenetur sit temporibus quia accusantium molestias error repellat ducimus minima fugiat? Rem nisi quas nam.</li>
                                                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione nobis labore deserunt asperiores quasi, nesciunt cupiditate dolore sed autem blanditiis, quo atque debitis pariatur nulla dicta enim illum iure omnis?</li>
                                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ex omnis iste. Incidunt explicabo ab dolores labore iure voluptatum voluptas ducimus itaque libero exercitationem. A et est quasi magni maxime.</li>
                                            </ul>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae ut veniam quaerat maiores, molestiae sit incidunt quasi fugiat, dolorum sed aspernatur earum placeat dolores soluta! Inventore deleniti quidem totam at.
                                        </p>
                                    </div>
                            </div>
                        </div>

                        


                    </div>
                </div>

                
            </div>


            <!-- Equipo desarrollo -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3">
                        <h3>Equipo de desarrollo</h3>
                </div>
                
                <div class="container-fluid align-middle">
                
                    <div class="row mx-0 ">
                        
                        <div class="col my-3 mx-3">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-3">
                            <div class="card" >
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-3">
                            <div class="card" >
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>


                    </div>
                </div>

                
            </div>

            <!-- plataformas -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3">
                        <h3>Plataformas</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-mobile" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-tablet" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-laptop" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-desktop" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>
            
            <!-- Tecnologias -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3">
                        <h3>Tecnologias</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-git mr-5" aria-hidden="true" style="font-size: 5em"></i><br>
                                    <i class="fa fa-github ml-5" aria-hidden="true" style="font-size: 5em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-tablet" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-laptop" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-desktop" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-desktop" aria-hidden="true" style="font-size: 10em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>

            <!--  funciones -->
            <div>
                
                <div class="text-center breadcrumb-holder mt-3">
                        <h3>Pincipales funciones</h3>
                </div>
                
                <div class="container-fluid">
                
                    <div class="row">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-book" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-id-badge" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-id-card" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-percent" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-certificate" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-question-circle" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-print" aria-hidden="true" style="font-size: 7em"></i>
                                </div>
                                    <div class="card-body text-justify">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col my-3 mx-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa fa-unlock" aria-hidden="true" style="font-size: 7em"></i>
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