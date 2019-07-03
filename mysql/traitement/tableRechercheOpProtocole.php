<?php 
require '../../class/database.class.php';
$bdd= new Database();
$rechercheOperation=$_POST['rechercheOperation'];
$ligne=$bdd->requete("SELECT operation.id_operation as id_operation, operation.id_registre as id_registre,  DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateSeule, operation.id_acte AS id_acte FROM operation, acte WHERE operation.id_acte=acte.id_acte AND (acte.designation='accouchement' OR acte.designation='césarienne')");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idOperation = $fetch['id_operation'];
  	$idRegistre = $fetch['id_registre'];
  	$date = $fetch['dateSeule'];
  	$idActe=$fetch['id_acte'];
  	$ligne1=$bdd->requete("SELECT nom_patiente FROM patiente WHERE id_registre='{$idRegistre}' AND nom_patiente LIKE '%$rechercheOperation%'");
  	while( $fetch = $ligne1->fetch(PDO::FETCH_ASSOC) )
	{
  		$nomPatiente=$fetch['nom_patiente'];
  		echo "<tr>
					<td class='col-lg-2 col-md-1 col-sm-1 col-xs-1'>$idOperation</td>
					<td class='col-lg-3 col-md-2 col-sm-2 col-xs-2'>$nomPatiente</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$date</td>					
					<td class='col-lg-2 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/choixProtocole.php?idOperation=$idOperation&idActe=$idActe&nomPatiente=$nomPatiente&dateActe=$date' onclick=\"lien=$(this).attr('href');choixProtocole(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					</tr>";
	}
}
$ligne->closeCursor();
?>