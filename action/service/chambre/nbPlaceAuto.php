<?php
require '../../../class/database.class.php';
require '../../../class/chambreManager.class.php';
require '../../../class/chambre.class.php';

$chambreManager = new ChambreManager();
$bdd= new Database();
$ligne=$bdd->requete('SELECT id_chambre FROM chambre');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
		$idChambre = $fetch['id_chambre'];
	if(isset($idChambre))
	{
	$chambre= new Chambre(array('numero' => $idChambre));
	$chambreManager->reglageNbPlace($chambre);
	}
}
?>