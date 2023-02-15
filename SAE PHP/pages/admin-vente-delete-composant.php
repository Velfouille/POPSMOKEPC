<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $vente = $_GET['vente'];
        $id = $_GET['id'];
        delete_composant_vente($conn1,$id);
        header('Location:index.php?page=admin-commandes-infos&id='.$vente)
?>