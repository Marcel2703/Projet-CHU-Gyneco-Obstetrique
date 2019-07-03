<?php require '../../../class/database.class.php';
$bdd = new Database();
$ligne=$bdd->requete('SELECT code_categorie FROM categorie ORDER BY code_categorie');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
		$codeCategorie = $fetch['code_categorie'];
		echo "<option value='$codeCategorie'>$codeCategorie</option>";
	}
$ligne->closeCursor();
?>