<?php
require '../../../class/database.class.php';
$bdd= new Database();
$idBebe=$_POST['idBebe'];
$idOperation=$_POST['idOperation'];
$ligne=$bdd->requete("SELECT * FROM protocoleA WHERE id_operation='{$idOperation}' AND id_bebe='{$idBebe}' AND element='Nom du bébé'");
	if ($ligne->rowCount()==0) {
		echo 'non';
					}
	else{
		echo 'oui';
}


?>