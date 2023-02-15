<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $categories = liste_categories($conn1);
        $marques = liste_marques($conn1);

        
        if (isset( $_POST['submit'])){
                $nom = $_POST['nom'];
                $prix = $_POST['prix'];
                $description = $_POST['description'];
                if (!empty($nom)){
                    if (!empty($prix)){
                        if (!empty($stock)){
                                ajouter_offres($conn1,$nom,$prix,$description);
                                header('Location:index.php?page=admin-composants');
                        }else{
                            $erreur = "Veuillez renseignez le stock";
                        }
                    }else{
                        $erreur = "Veuillez renseignez le prix";
                }
                }else{
                    $erreur = "Veuillez renseignez le nom du composant";
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
                            <h2 class="text-center mb-4">Ajouter une offre</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="nom" placeholder="Nom de l'offre" required></div>
                                <div class="mb-3"><input class="form-control" type="number" name="prix" placeholder="Prix de l'offre" required></div>
                                <div class="mb-3"><textarea class="form-control"  name="description" placeholder="Description" required></textarea></div>

                                <div><button class="btn btn-primary d-block w-100" type="submit" name="submit">Ajouter </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
