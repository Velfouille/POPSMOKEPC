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
                            <h2 class="text-center mb-4">Informations sur le client</h2>
                            <form method="post">
                                <?php
                                $clients = liste_clients($conn1,$id);
                                foreach ($clients as $client) {
                                ?>
                                <div class="mb-3"><label>Nom :</label><input class="form-control" type="text" name="NomComposant" value="<?php echo $client['Nom'];?>" readonly></div>
                                <div class="mb-3"><label>Prénom :</label><input class="form-control" type="text" name="prenom" value="<?php echo $client['Prénom'];?>" readonly></div>
                                <div class="mb-3"><label>Adresse :</label><input class="form-control" type="text" name="adresse" value="<?php echo $client['Adresse'];?>" readonly></div>
                                <div class="mb-3"><label>Ville :</label><input class="form-control" type="text" name="ville" value="<?php echo $client['Ville'];?>" readonly></div>
                                <div class="mb-3"><label>Code Postal :</label><input class="form-control" type="text" name="cp" value="<?php echo $client['Code_Postal'];?>" readonly></div>
                                <div class="mb-3"><label>Tel :</label><input class="form-control" type="text" name="Stock" value="<?php echo $client['Tel'];?>" readonly></div>
                                <div class="mb-3"><label>Email :</label><input class="form-control" type="text" name="Stock" value="<?php echo $client['Email'];?>" readonly></div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
