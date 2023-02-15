<div class="liste_déroulante"> 
			<h3>Carte Graphique :</h3>
            <select name="Carte graphique"><br>
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == "1"){
						echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
						}
					}
				?>
				</select>
			</div>

			<div class="liste_déroulante"> 
				<!-- <input type="text" name="Processeur" required><br> -->
				<h3>Processeur :</h3>
				<select name="Processeur"><br>
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == '2' && $liste['Stock']>'0'){
						echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
						}
					}
				?>
				</select>
			</div>

			<div class="liste_déroulante"> 
				<!-- <input type="text" name="Processeur" required><br> -->
				<h3>RAM :</h3>
				<select name="RAM"><br>
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == "3"){
					echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
					}
				}
				?>
				</select>
			</div>

			<div class="liste_déroulante"> 
				<!-- <input type="text" name="Processeur" required><br> -->
				<h3>Disque Dur :</h3>
				<select name="disque"><br>
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == "4"){
					echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
					}
				}
				?>
				</select>
			</div>

			<div class="liste_déroulante"> 
				<!-- <input type="text" name="Processeur" required><br> -->
				<h3>Carte mère :</h3>
				<select name="boitier"><br>
				
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == "4"){
					echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
					}
				}
				?>
				</select>
			</div>

			<div class="liste_déroulante"> 
				<!-- <input type="text" name="Processeur" required><br> -->
				<h3>Boitier :</h3>
				<select name="boitier"><br>
				
			<?php
                $listes = liste_composants($conn1);
				foreach ($listes as $liste) {
					if ($liste['Category'] == "6"){
					echo "<option value={$liste['id']}>{$liste['NomComposant']}</option>";
					}
				}
				?>
				</select>
			</div>