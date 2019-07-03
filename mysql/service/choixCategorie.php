<?php 
require '../../class/database.class.php';
$db = new Database();
$codeCategorie=$_GET['codeCategorie'];
$query = $db->requete(" SELECT * FROM categorie WHERE code_categorie = '{$codeCategorie}' LIMIT 1 ");
$count = $query->rowCount();
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nbOccup=$fetch['nb_occup'];
		$prix=$fetch['prix'];
	echo $codeCategorie.','.$nbOccup.','.$prix;
	}
$query->closeCursor();
?>