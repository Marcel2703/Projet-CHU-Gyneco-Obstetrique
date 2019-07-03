<?php require '../../../class/database.class.php';
$bdd = new Database();
$idChambre=$_POST['idChambre'];
$nb=$bdd->requete("SELECT categorie.nb_occup AS nbTotal FROM chambre,categorie WHERE chambre.code_categorie=categorie.code_categorie AND id_chambre='{$idChambre}'");
while( $fetch = $nb->fetch(PDO::FETCH_ASSOC) )
	{
		$nbTotal = $fetch['nbTotal'];
		echo $nbTotal;
	}
$nb->closeCursor();
?>