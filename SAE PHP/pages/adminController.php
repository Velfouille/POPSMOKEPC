<?php
require_once ('pages/fonctionConnexion.php');
require_once("pages/fonctionsBDD.php");
$conn1=connexionBDD('pages/paramCon.php');
session_start();


$email = $_POST['email'];
$password = $_POST['password'];

// déclaration de la variable appelee $sql.
if (!empty($email)){
  if (!empty($password)){
     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $res = CHECK_USER($conn1,$email,$password);
              if($res != false){
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $res['id'];
                    $_SESSION['nom'] = $res['Nom'];
                    $_SESSION['prenom'] = $res['Prénom'];
                    setcookie('POPSMOKEPC', serialize(array('id' => $_SESSION['id'], 'email' => $email, 'nom' => $_SESSION['nom'],'prenom' =>$_SESSION['prenom'],)), time() + 3600, '/');
                    header('Location:index.php?page=admin-home');
              }else{
                echo"Je n'existe pas bougre d'enculer";
              }
            } else {
             echo "Email address '$email' is considered invalid.\n";
            }
    }else{
        $erreur = "Le mot de passe n'a pas été renseigné";
    }
}else{
    $erreur = "L'email n'a pas été renseigné";
}
?>