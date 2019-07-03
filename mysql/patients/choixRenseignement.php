<?php 
require '../../class/database.class.php';
$db = new Database();
$idRegistre=$_GET['idRegistre'];
$nomPatiente=$_GET['nomPatiente'];
$query = $db->requete(" SELECT * FROM renseignement WHERE id_registre = '{$idRegistre}' LIMIT 1 ");
$count = $query->rowCount();
if($count == 1)
	{
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nom=$fetch['nom_patiente'];
		$prenom=$fetch['prenom_patiente'];
		$naissance=$fetch['naissance'];
		$lieu=$fetch['lieu'];
		$pere=$fetch['pere'];
		$mere=$fetch['mere'];
		$domicile=$fetch['domicile'];
		$croyance=$fetch['croyance'];
		$profession=$fetch['profession'];
		$situation=$fetch['situation'];
		$contact=$fetch['contact'];
	echo 'modify,'.$idRegistre.','.$nomPatiente.','.$nom.','.$prenom.','.$naissance.','.$lieu.','.$pere.','.$mere.','.$domicile.','.$croyance.','.$profession.','.$situation.','.$contact;
	}
	}
else
	{
	echo 'ajout,'.$idRegistre.','.$nomPatiente;
	}
$query->closeCursor();
?>