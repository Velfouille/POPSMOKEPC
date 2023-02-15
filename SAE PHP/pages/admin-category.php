<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
?>
<div id="container" style="margin-right:55px; margin-left: 55px;">
  <h2>Liste des categories</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom de la catégorie</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Supprimer</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $categories = liste_categories($conn1);
                
				        foreach ($categories as $categorie) {
                  echo "<tr>";
					        echo "<td>{$categorie['id']}</td>";
                  echo "<td>{$categorie['Nom']}</td>";
                  echo "<td><a href='index.php?page=admin-category-edit&id={$categorie['id']}&category={$categorie['Nom']}'>Edit</a></td>";
                  echo "<td><a href='index.php?page=admin-category-delete&id={$categorie['id']}'>Supprimer</a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
    <a href="index.php?page=admin-category-add"><button type="button" style="float:right;" class="btn btn-dark">Ajouter une categorie</button></a>
</div>