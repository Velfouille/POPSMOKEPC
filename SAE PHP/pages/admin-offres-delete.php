<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $vente = $_GET['vente'];
        $composant = $_GET['composant'];
        delete_composant_offres($conn1,$vente,$composant);
        header("Location:index.php?page=admin-offres-infos&id={$vente}");
?>