<?php
    require_once ('pages/fonctionConnexion.php');
    $conn1=connexionBDD('pages/paramCon.php');
    include('pages/fonctionsBDD.php');
    $prenom = $_GET['prenom'];
    $mail = $_GET['mail'];
    $id = $_GET['id'];
?>


<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title" style="font-size:33px;">MERCI <?php echo $prenom; ?> POUR VOTRE CONFIANCE !</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
	</div>
	<br><br><br>
	<button class='btn btn-primary' type='button' name='validation' style='text-align:center;'><a href='index.php?page=home'>Retourner à la page d'accueil</a></button>
	<br><br><br>
	<div>
		<p class="site-footer__fineprint" id="fineprint">Un mail vous a également été envoyé à  <strong><?php echo $mail;?></strong> </p>
		
	</div>
</body>
</html>