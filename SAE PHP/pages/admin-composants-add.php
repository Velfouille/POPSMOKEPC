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
                $stock = $_POST['stock'];
                $marque = $_POST['marque'];
                $type = $_POST['type'];
                $category = $_POST['category'];



                if (!empty($nom)){
                    if (!empty($prix)){
                        if (!empty($stock)){
                                ajouter_composant($conn1,$nom,$prix,$stock,$marque,$type,$category);
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
                            <h2 class="text-center mb-4">Ajouter un composant</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="nom" placeholder="Nom du composant" required></div>
                                <div class="mb-3"><input class="form-control" type="number" name="prix" placeholder="Prix du composant" required></div>
                                <div class="mb-3"><input class="form-control" type="number" name="stock" placeholder="Stock" required></div>
                                <div class="mb-3">
                                <select class="form-select" name="category">                                      
                                        <?php
                                            foreach ($categories as $categorie) {
                                                echo "<option value='{$categorie['id']}'>{$categorie['Nom']}</option>";
                                            }
                                        ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <select name="marque" class="form-select">                                      
                                        <?php
                                            foreach ($marques as $marque) {
                                                echo "<option value='{$marque['id']}'>{$marque['NomMarque']}</option>";
                                            }
                                        ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <select class="form-select" name="type">                                      
                                    <option value="true">Neuf</option>
                                    <option value="false">Occasion</option>
                                </select>
                                </div>
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
