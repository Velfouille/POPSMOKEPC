<?php
	require_once ('pages/fonctionConnexion.php');
	$conn1=connexionBDD('pages/paramCon.php');
    include('pages/fonctionsBDD.php');
    //include('pages/fonctionConnexion.php');
	
?>



<html>
<body>
<?php
    require_once('includes/navbar/navbar.php');
    $title = "Découvrez nos offres";
    $subtitle = "CONSTRUIRE MON PC";
    $links = "https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#pc_build";
    $navbar = navbar($title,$subtitle,$links);
    echo $navbar;
?>
	
	<div class="articles">
		<div class="container">
			<h2 class="articles__title" id="neuf"> PC Neufs</h2>
			<div class="articles__items">
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 1</div>
				</a>
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcoccasion.jpg'></img>
					<div class="article__name_resources">Offre 2</div>
				</a>
                <a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 3</div>
				</a>
                <a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 4</div>
				</a>
			</div>
		</div>
	</div>
    <div class="articles">
		<div class="container">
			<h2 class="articles__title" id="occas"> PC d'occasion</h2>
			<div class="articles__items">
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 1</div>
				</a>
                <a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 2</div>
				</a>
                <a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcneuf.jpg'></img>
					<div class="article__name_resources">Offre 3</div>
				</a>
				<a href="https://srv-prj-new.iut-acy.local/RT/ALT4/index.php?page=pcfixe#1">
					<img class="article_bandeau" src='includes/img/pcoccasion.jpg'></img>
					<div class="article__name_resources">Offre 4</div>
				</a>
			</div>
		</div>
	</div>
	<form method="post"> 	
    <div class="articles">
		<div class="container">
			<h2 class="articles__title" id="pc_build"> Construire son propre PC</h2>
            <br><br>
			<div class="articleSelect" style="text-align:left;">
			<?php
				$categories = liste_categories($conn1); //appel de la fonction qui liste toutes les catégories (SELECT * FROM category)
				$composants = liste_composants_achat($conn1); //appel de la fonction qui liste touts les composants (SELECT * FROM composants)
				$prixtotal = 0;
				
				foreach($categories as $categorie){ //permet de ne pas avoir d'erreur (variable vide) et faire une boucle pour récupérer toutes les catégories
					$value0 = $categorie['Nom']; 
					if(!empty($_POST)){
					$value = $_POST[$value0];
					
					$tests = prix_composant($conn1,$value);
					}
					echo" <div class='mb-3'><label class='form-label'>{$categorie['Nom']} :</label><select id='select' class='form-select' name='{$categorie['Nom']}'></div>"; //permet d'automatiser l'ajout de selects
					foreach ($composants as $composant){ 
						$value0 = $categorie['Nom'];
						$value = $_POST[$value0];
						if ($composant['Category'] == $categorie["id"]){ //boucle pour récupérer touts les composants
							if ($composant["id"] == $value){ //si l'id du composant correspond au nom de la catégorie
								echo "<option  selected='selected' value='{$composant['id']}'>{$composant['NomComposant']} </option>"; // print le composant dans sa catégorie
								achat_composant($conn1,$value); //enlève les composants du stock
							}else{    
								echo "<option value='{$composant['id']}'>{$composant['NomComposant']} </option>";
							}
							
						}
						}
					
					echo"</select>";
					
					if(!empty($_POST)){ //pour ne pas que ça affiche d'erreur lorsque l'on charge la page -> pas de valeur POST
						
						foreach($tests as $test){
							echo "<p style='text-align:right;'>{$test['Prix']} €</p>"; //pour chaque composant, print le prix
						
							$prixtotal = $prixtotal + intval($test['Prix']); //somme de tout les prix pour appeler la variable plus tard
							
						
						}
						}
				
			}
			
			?>
			</select>
			</div>
			
			<br>

			

			
			<p> Prix total : <?php if ($prixtotal != 0){echo $prixtotal;} ?>  € </p> <!-- appel de la variable de prix total -->

			
			<button class="btn btn-primary" type="submit" name="submit" style="text-align:center;">Voir le prix</button> <!-- bouton pour voir les prix des composans-->
			<?php
			echo "<button class='btn btn-primary' type='submit' name='validation' style='text-align:center;'><a href='index.php?page=formulaireClient&prix={$prixtotal}'>Valider</a></button>"; //bouton pour acheter + $_GET le prix total

			
			?>
			

			</form>
			
		
			</div>
		</div>
		</div>
	</div>


</body>
</html>






<!-- $categories = liste_categories($conn1);
			foreach($categories as $categorie){
				$value0 = $categorie['Nom'];
				$value = $_POST[$value0];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
					if(isset($value)){
						echo $test['Prix'];
						echo '<br>';
					}else{
						echo "pas de valeur";
					}
				}
			}

				$value = $_POST["RAM"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				$value = $_POST["Carte Graphique"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				
				$value = $_POST["Carte Mère"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				
				$value = $_POST["Boitier"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				
				$value = $_POST["Disque Dur"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				$value = $_POST["Alimentation"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}

				$value = $_POST["Processeur"];
				$tests = prix_composant($conn1,$value);
				foreach($tests as $test){
				if(isset($value)){
					echo $test['Prix'];
				}else{
					echo "pas de valeur";
				}
				}  -->