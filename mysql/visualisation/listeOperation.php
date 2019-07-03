<?php 
require '../../class/database.class.php';
$bdd= new Database();
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];
$type=$_POST['type'];
if($type=='0'){
$ligne=$bdd->requete("SELECT operation.id_registre AS id_registre,operation.id_operation AS id_operation,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm, acte.designation AS designation FROM operation,acte WHERE ((operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND operation.id_acte=acte.id_acte)");
echo "<table  class='table table-hover'>
				<tbody>";

while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
   	$idRegistre = $fetch['id_registre'];
  	$idOperation = $fetch['id_operation'];
  	$dateForm=$fetch['dateForm'];
  	$designation=$fetch['designation'];
  	$ligne1=$bdd->requete("SELECT nom_patiente FROM  patiente WHERE id_registre='{$idRegistre}'");
  	
  	while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
	{
		$nomPatiente = $fetch1['nom_patiente'];
  	echo "<tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPatiente</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$designation</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$dateForm</td>
		</tr>";
	}
}
}
else{
	$ligne=$bdd->requete("SELECT operation.id_registre AS id_registre,operation.id_operation AS id_operation,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm, acte.designation AS designation FROM operation,acte WHERE ((operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND operation.id_acte=acte.id_acte) AND acte.id_acte='{$type}'");
echo "<table  class='table table-hover'>
				<tbody>";

while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
   	$idRegistre = $fetch['id_registre'];
  	$idOperation = $fetch['id_operation'];
  	$dateForm=$fetch['dateForm'];
  	$designation=$fetch['designation'];
  	$ligne1=$bdd->requete("SELECT nom_patiente FROM  patiente WHERE id_registre='{$idRegistre}'");
  	
  	while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
	{
		$nomPatiente = $fetch1['nom_patiente'];
  	echo "<tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPatiente</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$designation</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$dateForm</td>
		</tr>";
	}
}
}

?>