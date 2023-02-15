<?php

function navbar($title,$subtitle,$links){
$navbar = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>POPSMOKEPC</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@467&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/29ce3ec429.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" type="text/css" href="includes/css/base.css">
        <link rel="stylesheet" type="text/css" href="includes/css/header.css">
        <link rel="stylesheet" type="text/css" href="includes/css/articles.css">
  </head>
  <body>
    <div class="header">
        <div class="header__texture"></div>
          <div class="header__mask">
            <svg width="100%"height="100%"viewBox="0 0 100 100"preserveAspectRatio="none">
              <path d="M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100"fill="#fff""></path>
            </svg>
          </div>
          <div class="container">
            <div class="header__navbar">
              <div class="header__navbar--logo">
                <a href="index.php?page=home"><h1 class="header__navbar--logo--title">POPSMOKE PC</h1></a>
              </div>
              <div class="header__navbar--menu">
                <a href="index.php?page=home" class="header__navbar--menu--link"><i class="fas fa-home"></i>  Accueil</a>
                <a href="index.php?page=pcfixe" class="header__navbar--menu--link"><i class="fas fa-address-card"></i> Acheter mon PC</a>
                <a href="index.php?page=home#pc_sell" class="header__navbar--menu--link"><i class="fas fa-briefcase"></i>  Vendre mon PC</a>
                <!-- <a href="partenaire.html" class="header__navbar--menu--link"><i class="fas fa-handshake"></i>  À propos</a> -->
                <a href="index.php?page=contact" class="header__navbar--menu--link"><i class="fas fa-comment"></i> Nous Contacter</a>
              </div>
              <div class="header__navbar-toogle">
                <span class="header__navbar-toogle-icons"></span>
              </div>
            </div>
            <div class="header__slogan">
              <h1 class="h__slogan--title" style="margin-bottom:15px;">'.$title.'</h1>
              <a href="'.$links.'" class="h__slogan--btn"><i class="fas fa-briefcase"></i> '.$subtitle.'</a>
            </div>
        </div>
      </div>
  </body>
</html>
';
return $navbar;
}