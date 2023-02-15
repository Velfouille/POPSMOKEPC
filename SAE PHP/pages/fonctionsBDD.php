<?php

function enregistreClient($nom,$connex) {
/* ------------------------------------------------
permet d'enregister le client dans  la bdd (insert)
	paramètres d'entrée
		- 1er paramètre $nom : contient le nom du client
		- 2ème paramètre $connex : contient le connecteur de la bdd
	retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
*/
  $sql="INSERT INTO CLIENTS (NomClient, PrenomClient, Tel, Email, Adresse, Code_Postal, Ville) VALUES ('".$nom."','".$prenom."','".$tel."','".$email."','".$adresse."','".$cp."','".$ville."') RETURNING idclient";    // déclaration de la variable appelée $sql.
  $res=$connex->query($sql);				// demande d'execution de la requête sur la base via le connecteur $connex. Le resultat est dans la variable $res au format structuré PDO
  $lire = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  return $lire;							// retourne l'identifiant choisi par le sgbd
}

function ListerClients($connex) {
/*--------------------------------
récupère les clients à partir de la base de données
paramètres d'entrées :
	$connex : connecteur de la base de données
retourne la liste des clients
-----------------------------*/
   $sql="SELECT NomClient, PrenomClient, Tel, Email, Adresse, Code_Postal, Ville, IdClient FROM CLIENTS ORDER BY NomClient;";				// déclaration de la variable appelee $sql.
   $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
   return $res;								// retourne a l'appelant le resultat.
}

function CHECK_USER($connex,$email,$password) {
	/*--------------------------------
	récupère les clients à partir de la base de données
	paramètres d'entrées :
		$connex : connecteur de la base de données
	retourne la liste des clients
	-----------------------------*/
	$reqtot = $connex->prepare('SELECT * FROM gestionnaire WHERE email=:email and mot_de_passe=:mot_de_passe');
	$reqtot -> execute(['email' => $email,'mot_de_passe' => $password]);
	$total=$reqtot->fetch();		// execution de la requête. Le resultat est dans la variable $res.
	return $total;								// retourne a l'appelant le resultat.

}

function EnregistreNouvelArticle($leNomArticle,$lePrix, $connex){
	$sql="INSERT INTO ARTICLES (Designation, PrixVente) VALUES ('".$leNomArticle."', '".$lePrix."') RETURNING IdArticle";
	$res=$connex->query($sql);				// demande d'execution de la requête sur la base via le connecteur $connex. Le resultat est dans la variable $res au format structuré PDO
	$lire = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
	return $lire;							// retourne l'identifiant choisi par le sgbd
}

function ListeArticles($connex){
	$sql="SELECT idarticle,Designation, PrixVente FROM ARTICLES ORDER BY Designation;";				// déclaration de la variable appelee $sql.
	$res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
	return $res;								// retourne a l'appelant le resultat.
}
	
function EnregistreNouvelleCommande($laRefClient, $laDate, $connex){
	$sql="INSERT INTO COMMANDES (refclient, datec) VALUES ('".$laRefClient."', '".$laDate."') RETURNING idcommande" ;
	print($sql);
	$res=$connex->query($sql);				// demande d'execution de la requête sur la base via le connecteur $connex. Le resultat est dans la variable $res au format structuré 
	return $sql;
}

function EnregistreCommande($IdCommande,$Article,$Quantité,$connex){
	$sql="INSERT INTO CONTENIR (idrefcommande, idrefarticle, qtecommandee) VALUES ('".$IdCommande."', '".$Article."','".$Quantité."')";
	$res=$connex->query($sql);
	return;
}

function ListeCommande($connex){
	$sql="SELECT idcommande FROM COMMANDES";
	$res=$connex->query($sql); 	
	return $res;
}

function rechercheArticle($connex,$leprix) {

	// permet de lister les articles dont le prix est supérieur au prix passé en paramètre.
	// parametres d'entrée :
	
	//    - $connex : le connecteur de la base de données
	
	//    - $leprix :
	
	// retourne le résultat sous forme d'objet PDO
	
	$sql="SELECT designation, infosuppl,prixvente FROM articles WHERE prixvente > ".$leprix; // déclaration de la variable appelee $sql.
	
	$res=$connex->query($sql); // execution de la requête. Le resultat est dans la variable $res.
	
	return $res;                                               // retourne a l'appelant le resultat.
	
	}


function rechercheArticleSecure($connex,$leprix) {

		// permet de lister les articles dont le prix est supérieur au prix passé en paramètre.
		// parametres d'entrée :
		
		//    - $connex : le connecteur de la base de données
		
		//    - $leprix :
		
		// retourne le résultat sous forme d'objet PDO
		$stmt = $connex->prepare("SELECT designation, infosuppl,prixvente FROM articles WHERE prixvente > :leprix");

		$stmt->bindParam(':leprix', $leprix);

		$stmt->execute();

		return $stmt;
/*
		$sql="SELECT designation, infosuppl,prixvente FROM articles WHERE prixvente > ".$leprix; // déclaration de la variable appelee $sql.
		
		$res=$connex->query($sql); // execution de la requête. Le resultat est dans la variable $res.
		
		return $res;                                               // retourne a l'appelant le resultat.
*/		
}

function liste_composants($connex){
	$reqtot = $connex->prepare('SELECT * FROM composants ORDER BY id ASC'); // SELECT Composants.NomComposant FROM Composants WHERE Composants.RefMarque = 1 
	$reqtot -> execute();
	$total=$reqtot->fetchAll();		// récupération de la valeur l'élément RETURNING contenu dans $res
  	return $total;			
}

function liste_composants_achat($connex){
	$reqtot = $connex->prepare('SELECT * FROM composants WHERE stock != 0'); // SELECT Composants.NomComposant FROM Composants WHERE Composants.RefMarque = 1 
	$reqtot -> execute();
	$total=$reqtot->fetchAll();		// récupération de la valeur l'élément RETURNING contenu dans $res
  	return $total;			
}

function prix_composant($connex,$value){
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM composants WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));
	$total=$reqtot->fetchAll();
	return $total;	
}
function infoscomposant($connex,$value){
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM composants WHERE id = :id and stock != 0');
	$reqtot -> execute(array(":id"=>$id));
	$total=$reqtot->fetchAll();
	return $total;	
}


function listes_infos_offres($connex,$value){
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM produits WHERE id = :id ');
	$reqtot -> execute(array(":id"=>$id));
	$total=$reqtot->fetchAll();
	return $total;	
}
function delete_composant_vente($connex,$id){
	$id = intval($id);
	$stmt = $connex->prepare('DELETE FROM commandes WHERE id = :id');
	$stmt -> execute(array(":id"=>$id));
	return;
}
function delete_composant_offres($connex,$offre,$composant){
	$composant = intval($composant);
	$offre = intval($offre);
	$stmt = $connex->prepare('DELETE FROM posseder WHERE refproduit = :produit and refcomposant = :composant');
	$stmt -> execute(array(":produit"=>$offre,":composant"=>$composant));
	return;
}

function ajouter_composant_vente($connex,$composant,$vente){
	$composant = intval($composant);
	$vente = intval($vente);
	$reqtot = $connex->prepare('INSERT INTO commandes ("refventes","refcomposants") VALUES (:vente,:composant)');
	$reqtot -> execute(array(":vente"=>$vente,":composant"=>$composant));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;
}
function ajouter_composant_offre($connex,$composant,$offre){
	$composant = intval($composant);
	$offre = intval($offre);
	$reqtot = $connex->prepare('INSERT INTO posseder ("refproduit","refcomposant") VALUES (:vente,:composant)');
	$reqtot -> execute(array(":vente"=>$offre,":composant"=>$composant));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;
}

function vente_composant($connex,$value){
	$id = intval($value);
	$reqtot = $connex->prepare('UPDATE composants SET "stock" = "stock" + 1 WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;
}

function liste_composants2($connex){
	$temp = 0;
	$reqtot = $connex->prepare('SELECT * FROM composants  WHERE stock > :temp ORDER BY id ASC'); // SELECT Composants.NomComposant FROM Composants WHERE Composants.RefMarque = 1 
	$reqtot -> execute(':temp', $temp);
	$total=$reqtot->fetchAll();		// récupération de la valeur l'élément RETURNING contenu dans $res
  	return $total;			
}

function liste_marques($connex) {
	$reqtot = $connex->prepare('SELECT * FROM marques ORDER BY id ASC');
	$reqtot -> execute();
	$total=$reqtot->fetchAll();		// execution de la requête. Le resultat est dans la variable $res.
	return $total;								// retourne a l'appelant le resultat.
}

function liste_categories($connex) {
	$reqtot = $connex->prepare('SELECT * FROM category ORDER BY id ASC');
	$reqtot -> execute();
	$total=$reqtot->fetchAll();		// execution de la requête. Le resultat est dans la variable $res.
	return $total;								// retourne a l'appelant le resultat.

}
function ajouter_categorie($connex,$category) {
	$sql = 'INSERT INTO category ("Nom") VALUES (:Nom)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":Nom"=>$category));
	return;								// retourne a l'appelant le resultat.

}
function delete_marque($connex,$id) {
	$stmt = $connex->prepare('DELETE FROM marques WHERE id = :id');
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	return;								// retourne a l'appelant le resultat.

}
function delete_category($connex,$id) {
	$stmt = $connex->prepare('DELETE FROM category WHERE id = :id');
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	return;								// retourne a l'appelant le resultat.

}
function delete_ventes($connex,$id) {
	$stmt = $connex->prepare('DELETE FROM ventes WHERE id = :id');
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	return;								// retourne a l'appelant le resultat.

}

function delete_composant($connex,$id) {
	$stmt = $connex->prepare('DELETE FROM composants WHERE id = :id');
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	return;								// retourne a l'appelant le resultat.

}

function ajouter_marque($connex,$marque) {
	$sql = 'INSERT INTO marques ("NomMarque") VALUES (:NomMarque)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":NomMarque"=>$marque));
	return;								// retourne a l'appelant le resultat.

}
function modifier_marque($connex,$id,$marque) {
	$sql = 'UPDATE marques SET "NomMarque" = :marque WHERE id = :id';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":id"=>$id,":marque"=>$marque));
	return;								// retourne a l'appelant le resultat.

}

function modifier_offre($connex,$id,$nom,$description,$prix) {
	$sql = 'UPDATE produits SET "nomOffres" = :nom, "PrixOffres" = :prix, "Description" = :descript WHERE id = :id';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":id"=>$id,":nom"=>$nom,":prix"=>$prix,":descript"=>$description));
	return;								// retourne a l'appelant le resultat.

}
function modifier_category($connex,$id,$category) {
	$sql = 'UPDATE category SET "Nom" = :category WHERE id = :id';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":id"=>$id,":category"=>$category));
	return;								// retourne a l'appelant le resultat.

}
function modifier_composant($connex,$id,$nom,$prix,$stock,$marque,$type,$category) {
	$sql = 'UPDATE composants SET "NomComposant" = :NomComposant, "RefMarque" = :RefMarque,"Prix" = :Prix,"Neuf" = :Neuf,"stock" = :stock,"Category" = :Category WHERE id = :id';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":id"=>$id,":NomComposant"=>$nom,":RefMarque"=>$category,":Prix"=>$prix,":Neuf"=>$type,":Category"=>$category,":stock"=>$stock,":RefMarque"=>$marque));
	return;								// retourne a l'appelant le resultat.

}

function liste_marques_detail($connex,$value) {
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM marques WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;								// retourne a l'appelant le resultat.

}
function liste_category_detail($connex,$value) {
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM category WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;								// retourne a l'appelant le resultat.

}

function liste_commandes($connex) {
	$reqtot = $connex->prepare('SELECT * FROM ventes');
	$reqtot -> execute();	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;								// retourne a l'appelant le resultat.
}
function liste_offres($connex) {
	$reqtot = $connex->prepare('SELECT * FROM produits');
	$reqtot -> execute();	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;								// retourne a l'appelant le resultat.
}
function liste_offre_composant($connex,$value) {
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM posseder  WHERE refproduit = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable
	$total=$reqtot->fetchAll();
	return $total;								// retourne a l'appelant le resultat.
}
	
function liste_clients($connex,$value) {
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT * FROM clients WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable
	$total=$reqtot->fetchAll();
	return $total;											

}
function ajouter_composant($connex,$nom,$prix,$stock,$marque,$type,$category) {
	$prix = intval($prix);
	$stock = intval($stock);
	$marque = intval($marque);
	$category = intval($category);
	$sql = 'INSERT INTO composants ("NomComposant","RefMarque","Prix","Neuf","stock","Category") VALUES (:NomComposant,:RefMarque,:Prix,:Neuf,:stock,:Category)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":NomComposant"=>$nom,":RefMarque"=>$marque,":Prix"=>$prix,":Neuf"=>$type,":stock"=>$stock,":Category"=>$category));
	return;								// retourne a l'appelant le resultat.
}
function ajouter_offres($connex,$nom,$prix,$description) {
	$prix = intval($prix);
	$sql = 'INSERT INTO produits ("nomOffres","PrixOffres","Prix",)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":NomComposant"=>$nom,":RefMarque"=>$marque,":Prix"=>$prix,":Neuf"=>$type,":stock"=>$stock,":Category"=>$category));
	return;								// retourne a l'appelant le resultat.
}

function liste_commandes_vente($connex,$value) {
	$id = intval($value);
	$reqtot = $connex->prepare('SELECT id,RefComposants FROM commandes WHERE RefVentes = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable
	$total=$reqtot->fetchAll();
	return $total;					// retourne a l'appelant le resultat.
	}


function ajout_commande($connex,$numclient,$date) {
	$date = intval($date);
	$sql = 'INSERT INTO ventes ("NuméroClient","DateCommande","RefCommande") VALUES (:NuméroClient,:DateCommande)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":NuméroClient"=>$numclient,":DateCommande"=>$date));
	return;								
}

function liste_ventes($connex) {
	$reqtot = $connex->prepare('SELECT * FROM ventes ORDER BY id ASC');
	$reqtot -> execute();
	$total=$reqtot->fetchAll();		// execution de la requête. Le resultat est dans la variable $res.
	return $total;								// retourne a l'appelant le resultat.
}

function achat_commande($connex,$nom,$prenom,$adresse,$ville,$cp,$tel,$email) {
	$sql = 'INSERT INTO clients ("Nom","Prénom","Adresse","Ville","Code_Postal","Tel","Email") VALUES (:Nom,:Prenom,:Adresse,:Ville,:Code_Postal,:Tel,:Email) RETURNING id';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":Nom"=>$nom,":Prenom"=>$prenom, ":Adresse"=>$adresse, ":Ville"=>$ville, ":Code_Postal"=>$cp, ":Tel"=>$tel, ":Email"=>$email));
	return;								
}

function nouvelle_commande($connex,$refventes,$refcomposants){
	$sql = 'INSERT INTO commandes ("refventes","refcomposants") VALUES (:refventes,:refcomposants)';
	$res = $connex->prepare($sql);
	$exec = $res->execute(array(":refventes"=>$refventes,":refcomposants"=>$refcomposants));
	return;		
}

function trouver_client($connex, $nom) {
	/*--------------------------------
	récupère les clients à partir de la base de données
	paramètres d'entrées :
		$connex : connecteur de la base de données
	retourne la liste des clients
	-----------------------------*/
	   $sql="SELECT id FROM clients WHERE Nom = $nom RETURNING id;";				// déclaration de la variable appelee $sql.
	   $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
	   return $res;								// retourne a l'appelant le resultat.
	}

function achat_composant($connex,$value){
	$id = intval($value);
	$reqtot = $connex->prepare('UPDATE composants SET "stock" = "stock" - 1 WHERE id = :id');
	$reqtot -> execute(array(":id"=>$id));	// execution de la requête. Le resultat est dans la variable $res.
	$total=$reqtot->fetchAll();
	return $total;
}

?>

