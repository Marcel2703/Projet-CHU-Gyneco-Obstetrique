<?php

require '../../class/database.class.php';
require '../../class/examenManager.class.php';

$examenManager = new ExamenManager();
$idRegistre = htmlspecialchars($_GET['idRegistre']);
$element = htmlspecialchars($_GET['element']);

if(isset($idRegistre) && isset($element))
{
	$examenManager->supprimer($idRegistre,$element);
}


?>