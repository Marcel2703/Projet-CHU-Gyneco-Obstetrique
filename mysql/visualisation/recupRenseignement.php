<?php 
require '../../class/database.class.php';
$db = new Database();
$idRegistre=$_COOKIE['idRegistreFiche'];
$query = $db->requete(" SELECT *,YEAR(NOW()) AS androany,YEAR(naissance) AS taona FROM renseignement WHERE id_registre = '{$idRegistre}' LIMIT 1");
$count = $query->rowCount();
if($count == 0)
	{
		echo "0";
	}
else
{
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nom=$fetch['nom_patiente'];
		$prenom=$fetch['prenom_patiente'];
		$androany=$fetch['androany'];
		$taona=$fetch['taona'];
		$age=$androany-$taona;
		$lieu=$fetch['lieu'];
		$pere=$fetch['pere'];
		$mere=$fetch['mere'];
		$domicile=$fetch['domicile'];
		$croyance=$fetch['croyance'];
		$profession=$fetch['profession'];
		$situation=$fetch['situation'];
	echo $nom.','.$prenom.','.$age.','.$lieu.','.$pere.','.$mere.','.$domicile.','.$croyance.','.$profession.','.$situation.','.$idRegistre;
	}
}
$query->closeCursor();
?>