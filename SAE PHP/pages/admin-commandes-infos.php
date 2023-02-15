<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $id = $_GET['id'];     
?>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Informations sur la commande</h2>
                            <form method="post">
                                    <?php
                                    $commandes = liste_commandes_vente($conn1,$id);
                                    foreach ($commandes as $commande) {
                                        $value = $commande['refcomposants'];
                                        $composants = infoscomposant($conn1,$value);
                                        foreach ($composants as $composant){
                                            echo "<div class='mb-3' style='text-align:right;'><input class='form-control' type='text' name='{$composant['id']}' value='{$composant['NomComposant']}' readonly>";
                                            echo "<a href='index.php?page=admin-vente-delete-composant&vente={$id}&id={$commande['id']}'><label>Supprimer</label></a></div>";
                                        }
                                    }
                                    ?>
                            </form>
                            <div><a href="index.php?page=admin-ventes-add-composant&vente=<?php echo $id; ?>"><button class="btn btn-primary d-block w-100" type="button" name="submit">Ajouter un produit</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
