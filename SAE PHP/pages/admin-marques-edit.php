<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
        $id = $_GET['id'];
        $marque = $_GET['marque'];
        if (isset( $_POST['submit'])){
                $marque = $_POST['marque'];
        if (!empty($marque)){
                modifier_marque($conn1,$id,$marque);
                header('Location:index.php?page=admin-marques');
        }else{
               $erreur = "Veuillez renseignez le nom de la marque";
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
                            <h2 class="text-center mb-4">Modifier une marque</h2>
                            <form method="post">
                                <div class="mb-3"><input class="form-control" type="text" name="id" value="<?php echo $id;?>" readonly></div>
                                <div class="mb-3"><input class="form-control" type="text" name="marque" value="<?php echo $marque;?>" required></div>
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
