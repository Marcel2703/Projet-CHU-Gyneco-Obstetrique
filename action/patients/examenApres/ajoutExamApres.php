<?php

require '../../../class/database.class.php';
require '../../../class/examen.class.php';
require '../../../class/examenCliniqueApres.class.php';

$examenApresManager = new ExamenApresManager();
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$element = htmlspecialchars($_POST['element']);
$valeur = htmlspecialchars($_POST['valeur']);
$lienImage = htmlspecialchars($_POST['lienImage']);

if( isset($idRegistre) && isset($element) && isset($valeur))
{
	$examen= new Examen(array('registre' => $idRegistre,'element' => $element,'valeur' => $valeur,'image' => $lienImage));
	$examenApresManager->ajout($examen);
}


?>