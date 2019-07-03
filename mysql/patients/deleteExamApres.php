<?php

require '../../class/database.class.php';
require '../../class/examenCliniqueApres.class.php';

$examenCliniqueApres = new ExamenApresManager();
$idRegistre = htmlspecialchars($_GET['idRegistre']);
$element = htmlspecialchars($_GET['element']);

if(isset($idRegistre) && isset($element))
{
	$examenCliniqueApres->supprimer($idRegistre,$element);
}


?>