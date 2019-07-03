<?php

require '../../../class/database.class.php';
require '../../../class/renseignementManager.class.php';
require '../../../class/renseignement.class.php';

$renseignementManager = new RenseignementManager();
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$naissance = htmlspecialchars($_POST['naissance']);
$lieu = htmlspecialchars($_POST['lieu']);
$pere = htmlspecialchars($_POST['pere']);
$mere = htmlspecialchars($_POST['mere']);
$domicile = htmlspecialchars($_POST['domicile']);
$croyance = htmlspecialchars($_POST['croyance']);
$profession = htmlspecialchars($_POST['profession']);
$situation = htmlspecialchars($_POST['situation']);
$contact = htmlspecialchars($_POST['contact']);

if(isset($idRegistre) && isset($nom) && isset($prenom) && isset($naissance) && isset($lieu) && isset($pere) && isset($mere) && isset($domicile) && isset($croyance) && isset($profession) && isset($situation) && isset($contact))
{
	$renseignement= new Renseignement(array('registre' => $idRegistre,'nom' => $nom, 'prenom' => $prenom,'naissance' => $naissance, 'lieu' => $lieu,'pere' => $pere, 'mere' => $mere,'domicile' => $domicile, 'croyance' => $croyance, 'profession' => $profession, 'situation' => $situation,'contact' => $contact));
	$renseignementManager->modifier($renseignement);
}
?>