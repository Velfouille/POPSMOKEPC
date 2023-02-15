<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        if (isset( $_POST['submit'])){
                $composant = $_POST['composant'];
                $vente = $_GET['vente'];
                ajouter_composant_vente($conn1,$composant,$vente);
                header('Location:index.php?page=admin-commandes-infos&id='.$_GET['vente']);
        }else{
               $erreur = "Veuillez renseignez le nom de la categorie";
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
                            <div class='mb-3'>
                            <select class="form-select" name="composant">
                            <?php 
                            $composants = liste_composants($conn1);
                            foreach ($composants as $composant){
                             echo    "<option value='{$composant['id']}'>{$composant['NomComposant']}</option>";
                            }
                            ?>
                            </select>    
                            </div>
                                <div><button class="btn btn-primary d-block w-100" type="submit" name="submit">Ajouter</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
