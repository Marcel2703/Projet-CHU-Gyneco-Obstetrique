<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistreVisite'])){
	$idRegistre=$_COOKIE['idRegistreVisite'];
	$ligne=$bdd->requete("SELECT *,DATE_FORMAT(date_visite, '%d/%m/%Y') AS dateForm FROM visite WHERE id_registre='{$idRegistre}' ORDER BY id_visite");
	echo "<table  class='table table-hover'>
				<tbody>";
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  		$idVisite = $fetch['id_visite'];
  		$dateForm = $fetch['dateForm'];
  		$demandeVisite = $fetch['demande_visite'];
  		$resultat = $fetch['resultat'];
  		$observation = $fetch['observation'];
  echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$dateForm</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$demandeVisite</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:15px'>$resultat</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>$observation</td>
		</tr>";
	}
$ligne->closeCursor();
}

?>