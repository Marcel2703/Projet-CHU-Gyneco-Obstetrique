<?php 
require '../../class/database.class.php';
$idChambre=$_POST['idChambre'];
$bdd= new Database();
$ligne=$bdd->requete("SELECT *,DATE_FORMAT(date_entree, '%d/%m/%Y') AS dateFormEntree,DATE_FORMAT(date_sortie, '%d/%m/%Y') AS dateFormSortie FROM sejour WHERE id_chambre='{$idChambre}'");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idSejour = $fetch['id_sejour'];
  	$nomPatiente = $fetch['nom_patiente'];
  	$dateEntree = $fetch['dateFormEntree'];
  	$dateSortie = $fetch['date_sortie'];
  	$dateFormSortie = $fetch['dateFormSortie'];
  	if($dateSortie=='0000-00-00'){
  		echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idSejour</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:10px'>$nomPatiente</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:15px'>$dateEntree</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:25px'>Non réglée</td>
				</tr>";
  	}
  	else
  	{
  		echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idSejour</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:5px'>$nomPatiente</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:15px'>$dateEntree</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:25px'>$dateFormSortie</td>
				</tr>";
  	} 		
}
$ligne->closeCursor();
?>