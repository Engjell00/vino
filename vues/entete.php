<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-blue.min.css" />
    
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/style2.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
     
    <style>
              #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
          }
              .mdl-grid {
          max-width: 600px;
      }
      .mdl-card__media {
          margin: 0;
          background-color: white;
          text-align: center;
      }
      .mdl-card__media > img {
          max-width: 100%;
      }
      .mdl-card__actions {
          display: flex;
          box-sizing:border-box;
          align-items: center;
      }
      .mdl-card__actions > .mdl-button--icon {
          margin-right: 3px;
          margin-left: 3px;
      }

      .mdl-card__supporting-text > ul{
      margin-left: 20%;
          list-style-type: none;
      }
    </style>
		

		<base href="<?php echo BASEURL; ?>">
		<!--<script src="./js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
		<script src="./js/main.js"></script>
    <script src="./js/script.js"></script>
	
		<!-- inclus bootstrap cdn -->
		
	</head>
	<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
         <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		 <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
             <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            </div>
             <div class="mdl-layout--large-screen-only mdl-layout__header-row">
                <a href="index.php?requete=cellierParUsager">
  <img src="./img/vinoLogo-blanc.png"
       alt="Logo du site Vino">
</a>
               
            </div>
             <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            </div>
			 <div class="container mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
            <?php
              if(isset($_SESSION["UserID"]))
              { 
            ?>
                <a href="index.php?requete=profil" class="mdl-layout__tab">Mon profil</a>
                <a href="index.php?requete=cellierParUsager" class="mdl-layout__tab">Mes celliers</a>
                <a href="index.php?requete=Logout" class="mdl-layout__tab">Se déconnecter</a>
            <?php
                if(isset($data2)){
                    if($data2==1)
                    {
            ?>
                      <a href="index.php?requete=statistiques" class="mdl-layout__tab">Admin</a>
            <?php
                    }
                }
              }
            if(!isset($_SESSION["UserID"]))
              {                               
            ?>
                <a href="index.php?requete=formulaireInscription" class="mdl-layout__tab">Inscription</a>
                <a href="index.php?requete=accueil" class="mdl-layout__tab">Connexion</a>
            <?php
              }
              ?>
               
               
            </div>
		</header>
		<main class="container mdl-layout__content"'>
			