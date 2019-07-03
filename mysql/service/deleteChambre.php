<?php

require '../../class/database.class.php';
require '../../class/chambreManager.class.php';

$chambreManager = new ChambreManager();
$idChambre = htmlspecialchars($_GET['idChambre']);

if( isset($idChambre))
{
	$chambreManager->supprimer($idChambre);
}


?>