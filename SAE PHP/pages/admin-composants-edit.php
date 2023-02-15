<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $id = $_GET['id'];
        $NomComposant = $_GET['NomComposant'];
        $prix = $_GET['Prix'];
        $RefMarque = $_GET['RefMarque'];
        $type = $_GET['type'];
        $category = $_GET['category'];
        $stock = $_GET['stock'];        
        $categories = liste_categories($conn1);
        $marques = liste_marques($conn1);


        if (isset( $_POST['submit'])){
            $P_Nom = $_POST['NomComposant'];
            $P_Prix = $_POST['Prix'];
            $P_RefMarque = $_POST['marque'];
            $P_type = $_POST['type'];
            $P_category = $_POST['category'];
            $P_stock = $_POST['stock'];
            if (!empty($category)){
                    modifier_composant($conn1,$id,$P_Nom,$P_Prix,$P_stock,$P_RefMarque,$P_type,$P_category);
                    header('Location:index.php?page=admin-composants');
            }else{
                $erreur = "Veuillez renseignez le nom de la categorie";
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
                            <h2 class="text-center mb-4">Modifier un composant</h2>
                            <form method="post">
                                <div class="mb-3"><label>Id :</label><input class="form-control" type="text" name="id" value="<?php echo $id;?>" readonly></div>
                                <div class="mb-3"><label>Nom :</label><input class="form-control" type="text" name="NomComposant" value="<?php echo $NomComposant;?>" required></div>
                                <div class="mb-3"><label>Prix :</label><input class="form-control" type="text" name="Prix" value="<?php echo $prix;?>" required></div>
                                <div class="mb-3"><label>Stock :</label><input class="form-control" type="text" name="stock" value="<?php echo $stock;?>" required></div>
                                <div class="mb-3">
                                <select class="form-select" name="category">                                      
                                        <?php
                                            foreach ($categories as $categorie) {
                                                if ($categorie['id'] == $category){
                                                    echo "<option value='{$categorie['id']}' selected='selected'>{$categorie['Nom']}</option>";
                                                }else{    
                                                    echo "<option value='{$categorie['id']}'>{$categorie['Nom']}</option>";
                                                }
                                            }
                                        ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <select name="marque" class="form-select">                                      
                                        <?php
                                            foreach ($marques as $marque) {
                                                if ($marque['id'] == $RefMarque){
                                                    echo "<option value='{$marque['id']}' selected='selected'>{$marque['NomMarque']}</option>";
                                                }else{    
                                                    echo "<option value='{$marque['id']}'>{$marque['NomMarque']}</option>";
                                                }
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
                                <div><button class="btn btn-primary d-block w-100" type="submit" name="submit">Envoyer </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
