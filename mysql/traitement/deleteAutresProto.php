<?php

require '../../class/database.class.php';
require '../../class/protocoleAccouchementManager.class.php';

$protocoleAccouchementManager = new ProtocoleAccouchementManager();
$idOperation = htmlspecialchars($_GET['idOperation']);
$idbebe = htmlspecialchars($_GET['idBebe']);
$element = htmlspecialchars($_GET['element']);

if( isset($idOperation) && isset($idbebe) && isset($element))
{
	$protocoleAccouchementManager->supprimerAutres($idOperation,$idbebe,$element);
}


?>