<?php
    require_once ('pages/fonctionConnexion.php');
    $conn1=connexionBDD('pages/paramCon.php');
    include('pages/fonctionsBDD.php');
    if (isset( $_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $cp = $_POST['cp'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $variable = achat_commande($conn1,$nom,$prenom,$adresse,$ville,$cp,$tel,$email);
        $prix = $_GET['prix'];
        achat_composant($conn1,$value);

        header("Location:index.php?page=thanks&prenom={$prenom}&mail={$email}&id={$variable}");

    }
?>


<body>  
    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <h2 class="text-center mb-4">Vos informations</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="nom" placeholder="Nom" required pattern="[a-zA-Z]+$"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="prenom" placeholder="Prénom" required pattern="[A-Za-z]+$"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="adresse" placeholder="Adresse" required></div>
                                <div class="mb-3"><input class="form-control" type="text" name="ville" placeholder="Ville" required pattern="[A-Za-z]+$"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="cp" placeholder="Code Postal" required pattern="[0-9]{5}$"></div>
                                <div class="mb-3"><input class="form-control" type="text" name="tel" placeholder="Numéro de téléphone" required pattern="[0-9]{10}$"></div>
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="E-mail" required></div>
                                <div><button class="btn btn-primary d-block w-100" type="submit" name="submit">Valider le paiement </button></div>
                                <?php

                  
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
