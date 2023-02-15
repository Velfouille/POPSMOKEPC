<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
?>

<div id="container" style="margin-right:55px; margin-left: 55px;">
  <h2>Liste des commandes</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Numéro de client</th>
                  <th scope="col">Date de la commande</th>
                  <th scope="col">Detail de la commande</th>
                  <th scope="col">Annuler</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $ventes = liste_commandes($conn1);
                foreach ($ventes as $vente) {
                  echo "<tr>";
                    echo "<td>{$vente['id']}</td>";
                    echo "<td><a href='index.php?page=admin-clients-infos&id={$vente['NuméroClient']}'>{$vente['NuméroClient']}</a></td>";
                    echo "<td>{$vente['DateCommande']}</td>";

                    echo "<td><a href='index.php?page=admin-commandes-infos&id={$vente['id']}'>Detail de la commande</a></td>";
                    echo "<td><a href='index.php?page=admin-commandes-delete&id={$vente['id']}'>Annuler</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
</div>