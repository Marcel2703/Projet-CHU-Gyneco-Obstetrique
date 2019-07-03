<?php

require '../../class/database.class.php';
require '../../class/protocoleAccouchementManager.class.php';

$protocoleAccouchementManager = new ProtocoleAccouchementManager();
$idbebe = htmlspecialchars($_GET['idBebe']);

if(isset($idbebe))
{
	$protocoleAccouchementManager->supprimer($idbebe);
}
?>