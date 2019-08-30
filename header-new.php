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

    <header class="container-fluid d-flex flex-column justify-content-between">
        
           <div class="bg_header_new"></div>
        
        <div class="filter"></div>

        <!-- NAVBAR BEGINNING -->
        <div class="title d-flex justify-content-between">
            <a href="localhost:8080"><h1>NatuReel</h1></a>
            <div class="burger"><i class="fas  fa-bars"></i><i class="fas fa-times"></i></div>
        </div>
        <div class="d-flex justify-content-around align-items-center  container_menu">

            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'menu')); ?>
            <div class="coordonnees d-flex flex-column justify-content-between">
                <ul class="fondateur_contact">
                    <li class="titre_fondateur">Fondateur</li>
                    <li>6 Rue blabla 25000 Besançon</li>
                    <li>06 00 00 00 00</li>
                    <li>natureel@pro.com</li>
                </ul>

                <ul class="fondateur_contact">
                    <li class="titre_fondateur">Fondateur</li>
                    <li>6 Rue blabla 25000 Besançon</li>
                    <li>06 00 00 00 00</li>
                    <li>natureel@pro.com</li>
                </ul>
            </div>
            <ol class="siege_contact">
                <li class="titre_fondateur">Association NatuReel</li>
                <li>6 Rue blabla 25000 Besançon</li>
                <li>06 00 00 00 00 </li>
                <li>natureel@pro.com</li>
            </ol>
        </div>

        <!-- <div class="btn_arrow"><a href="#concept"><i class="fas fa-angle-double-down"></a></i></div> -->

        <!-- NAVBAR END -->
    </header>
