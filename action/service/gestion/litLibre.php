<?php 
require '../../../class/database.class.php';
$bdd = new Database();
$idChambre=$_GET['idChambre'];
$ligne=$bdd->requete("SELECT id_lit FROM lit WHERE id_chambre='{$idChambre}' AND occupation='Libre'");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idLit = $fetch['id_lit'];
	echo "<option value='$idLit'>Lit N°$idLit</option>";
				 
}
$ligne->closeCursor();