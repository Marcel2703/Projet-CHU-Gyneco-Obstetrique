<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT *,DATE_FORMAT(date_entree, '%d/%m/%Y') AS dateFormEntree,DATE_FORMAT(date_sortie, '%d/%m/%Y') AS dateFormSortie FROM sejour ORDER BY id_sejour DESC");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idSejour = $fetch['id_sejour'];
  	$idChambre = $fetch['id_chambre'];
  	$idLit = $fetch['id_lit'];
  	$nomPatiente = $fetch['nom_patiente'];
  	$dateEntree = $fetch['dateFormEntree'];
  	$dateSortie = $fetch['date_sortie'];
  	$dateFormSortie = $fetch['dateFormSortie'];
  	if($dateSortie=='0000-00-00'){
  		echo " <tr>
				<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idSejour</td>
				<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
				<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idLit</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:10px;'>$nomPatiente</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:10px;'>$dateEntree</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>En attente</td>
				<td class='col-lg-0 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/choixSejour.php?idSejour=$idSejour' onclick=\"lien=$(this).attr('href');choixSejour(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
		</tr>";
  	}
  	else
  	{
  		echo " <tr>
				<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idSejour</td>
				<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
				<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idLit</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:10px;'>$nomPatiente</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:10px;'>$dateEntree</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$dateFormSortie</td>
				<td class='col-lg-0 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/choixSejour.php?idSejour=$idSejour' onclick=\"lien=$(this).attr('href');choixSejour(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td></tr>";
  	} 		
}
$ligne->closeCursor();
?>