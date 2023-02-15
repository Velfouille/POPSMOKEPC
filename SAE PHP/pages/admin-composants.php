<?php
        require_once('includes/navbar/navbar-admin.php');
        require_once ('pages/fonctionConnexion.php');
        $conn1=connexionBDD('pages/paramCon.php');
        include('pages/fonctionsBDD.php');
?>
<div id="container" style="margin-right:55px; margin-left: 55px;">
  <h2>Liste des composants</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nom du composant</th>
                  <th scope="col">Marques</th>
                  <th scope="col">Prix en €</th>
                  <th scope="col">Type</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Category</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $composants = liste_composants($conn1);
                
				        foreach ($composants as $composant) {
                  echo "<tr>";
					        echo "<td>{$composant['id']}</td>";
                  echo "<td>{$composant['NomComposant']}</td>";
                  echo "<td>";
                  $temp_marque= $composant['RefMarque'];
                  $marques = liste_marques_detail($conn1,$temp_marque);
                  foreach ($marques as $marque) {
                  echo "{$marque['NomMarque']}";
                  }
                  echo "</td>";
                  echo "<td>{$composant['Prix']}</td>";
                  if ($composant['Neuf'] == 1){
                    echo "<td>Neuf</td>";
                  }else{
                    echo "<td>Occasion</td>";
                  }
                  echo "<td>{$composant['stock']}</td>";
                  echo "<td>";
                  $temp_category= $composant['Category'];
                  $categorys = liste_category_detail($conn1,$temp_category);
                  foreach ($categorys as $category) {
                  echo "{$category['Nom']}";
                  }
                  echo "</td>";
                  echo "<td><a href='index.php?page=admin-composants-edit&id={$composant['id']}&NomComposant={$composant['NomComposant']}&RefMarque={$composant['RefMarque']}&Prix={$composant['Prix']}&type={$composant['Neuf']}&&category={$composant['Category']}&stock={$composant['stock']}'>Edit</a></td>";
                  echo "<td><a href='index.php?page=admin-composants-delete&id={$composant['id']}'>Supprimer</a></td>";
                  echo "</tr>";
                }
				        ?>
              </tbody>
            </table>
          </div>
    <a href="index.php?page=admin-composants-add"><button type="button" style="float:right;" class="btn btn-dark">Ajouter un composant</button></a>
</div>