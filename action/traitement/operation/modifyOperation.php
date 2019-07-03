<?php

require '../../../class/database.class.php';
require '../../../class/operationManager.class.php';
require '../../../class/operation.class.php';

$operationManager = new OperationManager();
$idOperation = htmlspecialchars($_POST['numOperation']);
$idActe = htmlspecialchars($_POST['typeActe']);
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$operateur = htmlspecialchars($_POST['operateur']);
$dateHeure = htmlspecialchars($_POST['dateOperation']);

if( isset($idOperation) && isset($idActe) && isset($idRegistre) && isset($operateur))
{
	$operation= new Operation(array('numero' => $idOperation,'acte' => $idActe, 'registre'=>$idRegistre ,'operateur'=> $operateur,'dateTime'=> $dateHeure));
	$operationManager->modifier($operation);
}


?>