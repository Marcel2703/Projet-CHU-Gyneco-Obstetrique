<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistreFiche'])){
	$idRegistre=$_COOKIE['idRegistreFiche'];
	$ligne=$bdd->requete("SELECT * FROM examen WHERE id_registre='{$idRegistre}'");
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  	$element = $fetch['element'];
  	$valeur = $fetch['valeur'];
  	$lienImage = $fetch['lien_image'];
  			echo "<div class='form-group'>
						<label class='col-lg-5 col-md-5 col-sm-5' for='valeur' style='color:white;font-size:16px;'>$element:</label>
						<label id='valeur'>$valeur</label>
					</div>"; 	
	}
	$ligne->closeCursor();
}


?>