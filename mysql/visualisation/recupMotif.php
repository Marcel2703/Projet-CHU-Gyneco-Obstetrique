<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistreFiche'])){
	$idRegistre=$_COOKIE['idRegistreFiche'];
$ligne=$bdd->requete("SELECT acte.designation AS designation FROM operation,acte WHERE operation.id_registre = '{$idRegistre}' AND operation.id_acte=acte.id_acte ORDER BY operation.id_operation DESC LIMIT 1");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$designation = $fetch['designation'];
  	echo $designation;
}
}
$ligne->closeCursor();
?>