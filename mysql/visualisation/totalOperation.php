<?php 
require '../../class/database.class.php';
$bdd= new Database();
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];
$type=$_POST['type'];
if($type=='0'){
	$ligne=$bdd->requete("SELECT operation.id_registre AS id_registre,operation.id_operation AS id_operation,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm, acte.designation AS designation FROM operation,acte WHERE ((operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND operation.id_acte=acte.id_acte)");
	$total_operation=$ligne->rowCount();
}
else{
	$ligne=$bdd->requete("SELECT operation.id_registre AS id_registre,operation.id_operation AS id_operation,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm, acte.designation AS designation FROM operation,acte WHERE ((operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND operation.id_acte=acte.id_acte) AND acte.id_acte='{$type}'");
	$total_operation=$ligne->rowCount();
}
echo $total_operation;
$ligne->closeCursor();
?>