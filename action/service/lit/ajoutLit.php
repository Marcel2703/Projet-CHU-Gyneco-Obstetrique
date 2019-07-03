<?php

require '../../../class/database.class.php';
require '../../../class/litManager.class.php';
require '../../../class/lit.class.php';

$litManager = new LitManager();
$idLit = htmlspecialchars($_POST['idLit']);
$idChambre = htmlspecialchars($_POST['idChambre']);

if( isset($idLit) && isset($idChambre))
{
	$lit= new Lit(array('numero' => $idLit,'chambre' => $idChambre));
	$litManager->ajout($lit);
}
?>