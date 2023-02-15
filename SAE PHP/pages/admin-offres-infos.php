<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $id = $_GET['id'];
        if (isset( $_POST['submit'])){
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
        if (!empty($nom)){
            if (!empty($prix)){
                modifier_offre($conn1,$id,$nom,$description,$prix);
            }else{
                $erreur = "Veuillez renseignez tous les champs";
            }        header('Location:index.php?page=admin-offres');
        }else{
            $erreur = "Veuillez renseignez tous les champs";
        }
    }     
?>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Informations sur l'offre</h2>
                            <form method="post">
                                <?php
                                $infos = listes_infos_offres($conn1,$id);
                                foreach ($infos as $info) {
                                echo "<div class='mb-3'><label>Id :</label><input class='form-control' type='text' name='id' value='{$info["id"]}' readonly></div>";
                                echo "<div class='mb-3'><label>Nom de l'offre :</label><input class='form-control' type='text' name='nom' value='{$info["nomOffres"]}' required></div>";
                                echo "<div class='mb-3'><label>Description :</label><textarea class='form-control' type='text' name='description'required>{$info["Description"]}</textarea></div>";
                                echo "<div class='mb-3'><label>Prix de l'offre :</label><input class='form-control' type='text' name='prix' value='{$info["PrixOffres"]}'required></div>";
                                
                                ?>

                                <div><button class="btn btn-primary d-block w-100 mb-3 " type="submit" name="submit">Modifier </button></div>
                            </form>
                            <?php
                                $value = $info['id'];
                                $offres = liste_offre_composant($conn1,$value);
                                foreach ($offres as $offre) {
                                    $value2 = $offre['refcomposant'];
                                    $composants = infoscomposant($conn1,$value2);
                                        foreach ($composants as $composant){
                                            echo "<div class='mb-3' style='text-align:right;'><input class='form-control' type='text' name='{$composant['id']}' value='{$composant['NomComposant']}' readonly>";
                                            echo "<a href='index.php?page=admin-offres-delete&vente={$id}&composant={$composant['id']}'><label>Supprimer</label></a></div>";
                                        }
                                    }
                                }
                            
                            
                                
                            ?>
                            <div><a href="index.php?page=admin-offres-add-composant&offre=<?php echo $id; ?>"><button class="btn btn-primary d-block w-100 mt-1" type="button" name="submit">Ajouter un produit</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
