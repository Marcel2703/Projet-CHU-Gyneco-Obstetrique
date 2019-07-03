<?php 
require '../../class/database.class.php';
$db = new Database();
$idRegistre=$_GET['idRegistre'];
$query = $db->requete(" SELECT * FROM patiente WHERE id_registre = '{$idRegistre}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nomPatiente=$fetch['nom_patiente'];
		$gestite=$fetch['gestite'];
		$parite=$fetch['parite'];
	echo $idRegistre.','.$nomPatiente.','.$gestite.','.$parite;
	}
$query->closeCursor();
?>