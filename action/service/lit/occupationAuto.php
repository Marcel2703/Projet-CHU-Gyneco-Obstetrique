<?php
require '../../../class/database.class.php';
require '../../../class/litManager.class.php';
require '../../../class/lit.class.php';

$litManager = new LitManager();
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM lit');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
		$idLit = $fetch['id_lit'];
  		$idChambre = $fetch['id_chambre'];
	if( isset($idLit) && isset($idChambre))
	{
	$lit= new Lit(array('numero' => $idLit,'chambre' => $idChambre));
	$litManager->reglageOccupation($lit);
	}
}
?>