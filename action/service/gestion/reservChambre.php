<?php

require '../../../class/database.class.php';
require '../../../class/sejourManager.class.php';
require '../../../class/sejour.class.php';

$sejourManager = new SejourManager();
$idChambre = htmlspecialchars($_POST['idChambre']);
$idLit = htmlspecialchars($_POST['idLit']);
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$nomPatiente = htmlspecialchars($_POST['nomPatiente']);
if(isset($idChambre) && isset($idLit) && isset($idRegistre) && isset($nomPatiente))
{
	$sejour= new Sejour(array('chambre' => $idChambre, 'lit'=>$idLit ,'registre'=>$idRegistre ,'patiente'=> $nomPatiente));
	$sejourManager->ajout($sejour);
}


?>