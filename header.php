<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="manger local">
    <meta name="author" content="Meriem, Jessy, Igal et Bryan">
    <title>NatuReel</title>

    <!-- Ajout d'une nouvelle feuille de style qui sera spécifique à notre thème -->
    <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
    <!-- HTML5 shim et Respond.js pour supporter les éléments HTML5 pour les versions plus anciennes que Internet Explorer 9 -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <?php wp_head(); ?>
</head>

<body>

    <header class="container-fluid">
        <video autoplay muted loop id="myVideo">
            <source src="wp-content/themes/natureel/assets/img/ble.mp4" type="video/mp4">
        </video>

        <!-- NAVBAR BEGINNING -->
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class=" p-4">
                    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'menu')); ?>
                </div>
            </div>
            <nav class="navbar">
                <button class="navbar-toggler burger" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars"></i></span>
                </button>
            </nav>
        </div>
        <!-- NAVBAR END -->
    </header>