<?php

require '../../../class/database.class.php';
require '../../../class/protocoleAccouchement.class.php';
require '../../../class/protocoleAccouchementManager.class.php';

$protocoleAccouchementManager = new ProtocoleAccouchementManager();
$idOperation = htmlspecialchars($_POST['idOperation']);
$idBebe = htmlspecialchars($_POST['idBebe']);
$elmDateDelivrance = htmlspecialchars($_POST['elmDateDelivrance']);
$dateDelivrance = htmlspecialchars($_POST['dateDelivrance']);
$elmHeureDelivrance = htmlspecialchars($_POST['elmHeureDelivrance']);
$heureDelivrance = htmlspecialchars($_POST['heureDelivrance']);
$elmNomBebe = htmlspecialchars($_POST['elmNomBebe']);
$nomBebe = htmlspecialchars($_POST['nomBebe']);
$elmPrenomBebe = htmlspecialchars($_POST['elmPrenomBebe']);
$prenomBebe = htmlspecialchars($_POST['prenomBebe']);
$elmSexe = htmlspecialchars($_POST['elmSexe']);
$sexe = htmlspecialchars($_POST['sexe']);
$elmEtat = htmlspecialchars($_POST['elmEtat']);
$etat = htmlspecialchars($_POST['etat']);
$arrayElm=array($elmDateDelivrance,$elmHeureDelivrance,$elmNomBebe,$elmPrenomBebe,$elmSexe,$elmEtat);
$arrayValeur=array($dateDelivrance,$heureDelivrance,$nomBebe,$prenomBebe,$sexe,$etat);
$taille=sizeof($arrayElm);
$i=0;
while($i<$taille)
{
	if( isset($idOperation) && isset($arrayElm[$i]) && isset($arrayValeur[$i]))
	{
	$protocoleAccouchement= new ProtocoleAccouchement(array('operation' => $idOperation, 'bebe' => $idBebe, 'element' => $arrayElm[$i],'valeur'=>$arrayValeur[$i]));
	$protocoleAccouchementManager->ajout($protocoleAccouchement);
	$i++;
	}
}



?>