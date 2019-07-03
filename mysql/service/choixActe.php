<?php 
require '../../class/database.class.php';
$db = new Database();
$idActe=$_GET['idActe'];
$query = $db->requete(" SELECT * FROM acte WHERE id_acte = '{$idActe}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$designation=$fetch['designation'];
		$mention=$fetch['mention'];
	echo $idActe.','.$designation.','.$mention;
	}
$query->closeCursor();
?>