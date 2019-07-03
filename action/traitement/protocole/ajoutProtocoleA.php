<?php

require '../../../class/database.class.php';
require '../../../class/protocoleAccouchement.class.php';
require '../../../class/protocoleAccouchementManager.class.php';

$protocoleAccouchementManager = new ProtocoleAccouchementManager();
$idOperation = htmlspecialchars($_POST['idOperation']);
$idBebe = htmlspecialchars($_POST['idBebe']);
$element = htmlspecialchars($_POST['element']);
$valeur = htmlspecialchars($_POST['valeur']);

if( isset($idOperation) && isset($element) && isset($valeur))
{
	$protocoleAccouchement= new protocoleAccouchement(array('operation' => $idOperation,'bebe' => $idBebe,'element' => $element,'valeur' => $valeur));
	$protocoleAccouchementManager->ajout($protocoleAccouchement);
}


?>