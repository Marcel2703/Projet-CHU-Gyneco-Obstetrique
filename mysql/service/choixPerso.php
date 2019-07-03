<?php 
require '../../class/database.class.php';
$db = new Database();
$idPerso=$_GET['idPerso'];
$query = $db->requete(" SELECT * FROM personnel WHERE id_perso = '{$idPerso}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nomPerso=$fetch['nom_perso'];
		$poste=$fetch['poste'];
	echo $idPerso.','.$nomPerso.','.$poste;
	}
$query->closeCursor();
?>