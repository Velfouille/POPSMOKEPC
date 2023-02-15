<?php
	require_once ('pages/fonctionConnexion.php');
	$conn1=connexionBDD('pages/paramCon.php');
    include('pages/fonctionsBDD.php');
    //include('pages/fonctionConnexion.php');
?>


<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>POPSMOKEPC</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;200&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@467&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/29ce3ec429.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="includes/css/base.css">
		<link rel="stylesheet" type="text/css" href="includes/css/header.css">
		<link rel="stylesheet" type="text/css" href="includes/css/articles.css">
    </head>
<body>   
    <?php
	
    require_once('includes/navbar/navbar.php');
    $title = "POPSMOKE PC, la référence PC ";
    $subtitle = "VENDRE MON PC";
    $links = "https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=home#pc_sell";
    $navbar = navbar($title,$subtitle,$links);
    echo $navbar;
    ?>
	<div class="articles">
		<div class="container">
			<h2 class="articles__title"> Bon plans :</h2>
			<div class="articles__items">
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#neuf">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Neuf</div>
				</a>
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#occas">
					<img class="article_bandeau" src='includes/img/pcoccasion.jpg'></img>
					<div class="article__name_resources">Occasion</div>
				</a>
			</div>
		</div>
	</div>
	<div class="articles">
		<div class="container">
			<h2 class="articles__title"> Achats :</h2>
			<div class="articles__items">
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#neuf">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Neuf</div>
				</a>
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#occas">
					<img class="article_bandeau" src='includes/img/pcoccasion.jpg'></img>
					<div class="article__name_resources">Occasion</div>
				</a>
			</div>
		</div>
	</div>

	
	<form method="post"> 
	<div class="articles">
		<div class="container">
			<h2 class="articles__title" id="pc_sell"> Vendre son PC :</h2>
			<div class="articles__items">
			<?php
				$categories = liste_categories($conn1); //fonction qui liste toutes les catégories
				$composants = liste_composants($conn1); //fonction qui liste touts les composants
				$prixtotal = 0;
				foreach($categories as $categorie){ //boucle pour parcourir toutes les catégories
					$value0 = $categorie['Nom']; //récupère le nom de la catégorie
					if(!empty($_POST)){ //récupère le nom de la catégorie lorsque la page est acutalisée (permet d'éviter une erreur)
					$value = $_POST[$value0];
					
					$tests = prix_composant($conn1,$value); //récupère les prix des composants dans $tests
					}
					echo" <div class='mb-3'><label class='form-label'>{$categorie['Nom']} :</label><select id='select' class='form-select' name='{$categorie['Nom']}'></div>"; //crée des selects pour chaque catégories grâce à la boucle
					foreach ($composants as $composant){ //boucle pour parcourir tout les composants
						$value0 = $categorie['Nom']; // récupère le nom de chaque composants (grâce a la boucle)
						$value = $_POST[$value0];
						if ($composant['Category'] == $categorie["id"]){ // permet d'associer les composants aux bons selects (GTX1080 dans Carte Graphique, ...)
							if ($composant["id"] == $value){ // si l'id correspond au nom de la catégorie
								echo "<option  selected='selected' value='{$composant['id']}'>{$composant['NomComposant']} </option>"; //print le composant dans le select
									vente_composant($conn1,$value);
							}else{    
								echo "<option value='{$composant['id']}'>{$composant['NomComposant']} </option>";
							}
						}
					}
					
					echo"</select>";
					
				/*	if(!empty($_POST)){
						
						foreach($tests as $test){
							echo "<p style='text-align:right;'>{$test['Prix']} €</p>";
						
							$prixtotal = $prixtotal + intval($test['Prix']);
							
						
						}
					} */
						
				}
				?>

			</div>
		</div>
	</div>
	<button class="btn btn-primary" type="submit" name="envoyer" style="text-align:center;">Valider</button>
	</form>
	



		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="public/js/app.js"></script>
	</body>
</body>
</html>