<?php

require '../../../class/database.class.php';
require '../../../class/sejourManager.class.php';
require '../../../class/sejour.class.php';

$sejourManager = new SejourManager();
$idSejour = htmlspecialchars($_POST['idSejour']);
$idChambre = htmlspecialchars($_POST['idChambre']);
$idLit = htmlspecialchars($_POST['idLit']);
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$nomPatiente = htmlspecialchars($_POST['nomPatiente']);
$dateEntree = htmlspecialchars($_POST['dateEntree']);
$dateSortie = htmlspecialchars($_POST['dateSortie']);
if( isset($idSejour) && isset($idChambre) && isset($idLit) && isset($idRegistre) && isset($nomPatiente))
{
	$sejour= new Sejour(array('numero' => $idSejour,'chambre' => $idChambre, 'lit'=>$idLit ,'registre'=>$idRegistre ,'patiente'=> $nomPatiente,'entree'=>$dateEntree ,'sortie'=> $dateSortie));
	$sejourManager->modifier($sejour);
}


?>