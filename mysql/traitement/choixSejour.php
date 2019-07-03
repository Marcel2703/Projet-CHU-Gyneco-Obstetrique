<?php 
require '../../class/database.class.php';
$db = new Database();
$idSejour=$_GET['idSejour'];
$query = $db->requete(" SELECT * FROM sejour WHERE id_sejour = '{$idSejour}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$idSejour=$fetch['id_sejour'];
		$idChambre=$fetch['id_chambre'];
		$idLit=$fetch['id_lit'];
		$idRegistre=$fetch['id_registre'];
		$nomPatiente=$fetch['nom_patiente'];
		$dateEntree=$fetch['date_entree'];
		$dateSortie=$fetch['date_sortie'];
	echo $idSejour.','.$idChambre.','.$idLit.','.$idRegistre.','.$nomPatiente.','.$dateEntree.','.$dateSortie;
	}
$query->closeCursor();
?>