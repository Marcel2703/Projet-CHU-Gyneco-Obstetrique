<?php

require '../../../class/database.class.php';
require '../../../class/protocoleAccouchement.class.php';
require '../../../class/protocoleCesarienneManager.class.php';

$protocoleCesarienneManager = new ProtocoleCesarienneManager();
$idOperation = htmlspecialchars($_POST['idOperation']);
$idBebe = htmlspecialchars($_POST['idBebe']);
$element = htmlspecialchars($_POST['element']);
$valeur = htmlspecialchars($_POST['valeur']);

if( isset($idOperation) && isset($element) && isset($valeur))
{
	$protocoleCesarienne= new protocoleAccouchement(array('operation' => $idOperation,'bebe' => $idBebe, 'element' => $element,'valeur' => $valeur));
	$protocoleCesarienneManager->ajout($protocoleCesarienne);
}


?>