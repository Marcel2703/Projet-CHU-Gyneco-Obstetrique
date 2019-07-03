<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT operation.id_registre as id_registre,  DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateSeule, acte.designation AS designation FROM operation, acte WHERE operation.id_acte=acte.id_acte AND (acte.designation='accouchement' OR acte.designation='césarienne')");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$idRegistre = $fetch['id_registre'];
  	$date = $fetch['dateSeule'];
  	$designation=$fetch['designation'];
  	$ligne1=$bdd->requete("SELECT nom_patiente FROM patiente WHERE id_registre='{$idRegistre}'");
  	while( $fetch = $ligne1->fetch(PDO::FETCH_ASSOC) )
	{
  		$nomPatiente=$fetch['nom_patiente'];
  		echo "<tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
					<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>$nomPatiente</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$designation</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$date</td>					
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/choixVisite.php?idRegistre=$idRegistre&nomPatiente=$nomPatiente' onclick=\"lien=$(this).attr('href');choixVisite(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					</tr>";
	}
	$ligne1->closeCursor();
}
$ligne->closeCursor();
?>