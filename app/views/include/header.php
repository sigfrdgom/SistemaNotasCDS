<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema CDS Notas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/img/icons/test.png">

    <!-- Bootstrap CSS -->
    <link href="<?php echo RUTA_URL ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
    
    <!-- CSS General para la pagina-->
    <link href="<?php echo RUTA_URL ?>/css/general.css" rel="stylesheet" type="text/css">

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

    <!-- Other CSS -->
    <link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" />

    
    <style>
        .mrg-spr-ex {
            margin-top:1.25em;
        }
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
</head>

<body class="adminbody-void">

<div id="main" class="enlarged forced">

    <!-- top bar navigation -->
    <div class="headerbar">

        <!-- LOGO -->
        <div class="headerbar-left">
            <a href="<?php echo RUTA_URL ?>" class="logo "><img alt="Logo" class="img-logo" style="border-radius: 3px;" src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" /> <span>CDS NOTAS</span></a>
        </div>

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">

                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="<?php echo RUTA_URL ?>" role="button" aria-haspopup="true" aria-expanded="true">
                        <img src="<?php echo RUTA_URL ?>/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow"><small>Hola, Carlos</small> </h5>
                        </div>

                        <!-- item-->
                        <a href="pro-profile.html" class="dropdown-item notify-item">
                            <i class="fa fa-user"></i> <span>Perfil</span>
                        </a>

                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
                        </a>

                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </li>
            </ul>

        </nav>

    </div>
    <!-- End Navigation -->


    <!-- Left Sidebar -->
    <div class="left main-sidebar">

        <div class="sidebar-inner leftscroll">

            <div id="sidebar-menu">
                <!-- <a href="index" ><img alt="Logo" class="img-fgk" style="border-radius: 3px;" src="<?php echo RUTA_URL ?>/img/logo/fgk.png" /></a> -->

                <ul >
                    <li class="submenu mt-3" >
                        <a href="<?php echo RUTA_URL?>/curso"><i class="fa fa-graduation-cap bigfont "></i><span> Cursos </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL?>/modulo"><i class="fa fa-fw fa-book"></i><span> Modulos </span> </a>
                    </li>
                    
                    <li class="submenu">
                        <a href="<?php echo RUTA_URL?>/docente"><i class="fa fa-id-badge bigfonts"></i><span> Usuarios </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL?>/participante"><i class="fa fa-fw fa-user"></i><span> Participantes </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/notas"><i class="fa fa-fw fa-book"></i><span> Notas </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/porcentajeCurso/porcentajes"><i class="fa fa-fw fa-percent"></i><span> Porcentajes Curso </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/matricula"><i class="fa fa-certificate bigfonts" aria-hidden="true"></i><span> Matriculas </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/rankingNotas"><i class="fa fa-bar-chart bigfonts"></i><span> Ranking Notas </span> </a>
                    </li>

                    <!-- <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-print"></i> <span> Reportes </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="#">Reporte </a></li>
                            <li><a href="#">Reporte </a></li>
                        </ul>
                    </li> -->

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/reporte"><i class="fa fa-fw fa-print"></i><span> Reportes </span> </a>
                    </li>

                    <li class="submenu">
                        <a ><i class="fa fa-cog bigfonts"></i> <span> Mantenimientos </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo RUTA_URL ?>/tipoModulo">Tipo Modulo</a></li>
                            <li><a href="<?php echo RUTA_URL ?>/nivelCurso">Niveles del curso</a></li>
                            <!-- <li><a href="<?php echo RUTA_URL ?>/modulo">Modulos</a></li> -->
                            <!-- <li><a href="<?php //echo RUTA_URL ?>/notas">Notas</a></li> -->
                            <!-- <li><a href="<?php echo RUTA_URL ?>/matricula">Matricula</a></li> -->
                            <!-- <li><a href="<?php //echo RUTA_URL ?>/curso">Cursos</a></li> -->
                            <li><a href="<?php echo RUTA_URL ?>/modulosCurso">Modulos por cursos</a></li>
                            <li><a href="<?php echo RUTA_URL ?>/porcentajeCurso">Porcentajes Curso</a></li>
                            <!-- <li><a href="<?php //echo RUTA_URL ?>/participante">Participantes</a></li> -->
                            <!-- <li><a href="<?php //echo RUTA_URL ?>/docente">Docentes</a></li> -->

                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/general/faq"><i class="fa fa-question-circle-o bigfonts" style="font-size: 1.5em;"></i><span> FA&Q </span> </a>
                    </li>

                    <li class="submenu">
                        <a href="<?php echo RUTA_URL ?>/general/acercaDe"><i class="fa fa-info-circle bigfonts" style="font-size: 1.5em;"></i><span> Sobre el proyecto </span> </a>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- End Sidebar -->


    <div class="content-page">

        <!-- Start content -->

