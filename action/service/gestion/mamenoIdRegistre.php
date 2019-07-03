<?php 
require '../../../class/database.class.php';
$bdd= new Database();
$idRegistre=$_POST['recherchePatiente'];
$ligne=$bdd->requete("SELECT nom_patiente FROM patiente WHERE id_registre='{$idRegistre}'");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$nomPatiente = $fetch['nom_patiente'];
  	echo $nomPatiente;
}
$ligne->closeCursor();
?>