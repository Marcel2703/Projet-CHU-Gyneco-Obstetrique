<?php 
require '../../class/database.class.php';
$db = new Database();
$idChambre=$_GET['idChambre'];
$query = $db->requete(" SELECT * FROM chambre WHERE id_chambre = '{$idChambre}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$codeCategorie=$fetch['code_categorie'];
	echo $idChambre.','.$codeCategorie;
	}
$query->closeCursor();
?>