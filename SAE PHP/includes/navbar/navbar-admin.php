<?php 
session_start();
if (empty($_SESSION['id'])){
  header('Location:home');
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body>
<header>    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?page=admin-home" style="margin-left:25px;">POPSMOKE PC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=admin-home">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=admin-marques">Marques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=admin-category">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=admin-composants">Composants</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=admin-commandes">Commandes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=admin-offres">Offres</a>
      </li>
    </ul>
    <a href="index.php?page=logout" style="text-decoration:none;">
    <span class="navbar-text" style="margin-right:25px;">
      <?php echo $_SESSION['prenom']?>
      <?php echo $_SESSION['nom']?>
    </span>
    </a>
  </div>
</nav>
</header>


