<?php

require '../../class/database.class.php';
require '../../class/patienteManager.class.php';

$patienteManager = new PatienteManager();
$idRegistre = htmlspecialchars($_GET['idRegistre']);

if( isset($idRegistre))
{
	$patienteManager->supprimer($idRegistre);
}


?>