<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
?>

<div id="container" style="margin-right:55px; margin-left: 55px;">
  <h2>Liste des offres</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom de l'offre</th>
                  <th scope="col">Prix en €</th>
                  <th scope="col">En Savoir +</th>
                  <th scope="col">Annuler</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $ventes = liste_offres($conn1);
                foreach ($ventes as $vente) {
                  echo "<tr>";
                    echo "<td>{$vente['id']}</td>";
                    echo "<td><a href='index.php?page=admin-offres-infos&id={$vente['id']}'>{$vente['nomOffres']}</a></td>";
                    echo "<td>{$vente['PrixOffres']}</td>";
                    echo "<td><a href='index.php?page=admin-offres-infos&id={$vente['id']}'>En savoir +</a></td>";
                    echo "<td><a href='index.php?page=admin-offres-delete&id={$vente['id']}'>Supprimer</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          <a href="index.php?page=admin-offres-add"><button type="button" style="float:right;" class="btn btn-dark">Ajouter une offre</button></a>
</div>