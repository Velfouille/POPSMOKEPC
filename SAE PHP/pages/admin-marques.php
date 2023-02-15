<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
          include('pages/fonctionsBDD.php');
?>
<div id="container" style="margin-right:55px; margin-left: 55px;">
  <h2>Liste des marques</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom de la marques</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $marques = liste_marques($conn1);
                
				        foreach ($marques as $marque) {
                  echo "<tr>";
					        echo "<td>{$marque['id']}</td>";
                  echo "<td>{$marque['NomMarque']}</td>";
                  echo "<td><a href='index.php?page=admin-marques-edit&id={$marque['id']}&marque={$marque['NomMarque']}'>Edit</a></td>";
                  echo "<td><a href='index.php?page=admin-marques-delete&id={$marque['id']}'>Supprimer</a></td>";
                  echo "</tr>";
                }
				        ?>
              </tbody>
            </table>
          </div>
    <a href="index.php?page=admin-marques-add"><button type="button" style="float:right;" class="btn btn-dark">Ajouter une marque</button></a>
</div>