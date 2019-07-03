<?php 
require '../../class/database.class.php';
$db = new Database();
$idOperation=$_GET['idOperation'];
$query = $db->requete(" SELECT * FROM operation WHERE id_operation = '{$idOperation}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$idActe=$fetch['id_acte'];
		$idRegistre=$fetch['id_registre'];
		$operateur=$fetch['operateur'];
		$dateOperation=$fetch['date_heure'];
	echo $idOperation.','.$idActe.','.$idRegistre.','.$operateur.','.$dateOperation;
	}
$query->closeCursor();
?>