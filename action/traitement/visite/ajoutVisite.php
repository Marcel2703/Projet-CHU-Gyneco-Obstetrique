<?php

require '../../../class/database.class.php';
require '../../../class/visiteManager.class.php';
require '../../../class/visite.class.php';

$visiteManager = new VisiteManager();
$idVisite = htmlspecialchars($_POST['idVisite']);
$idRegistre = htmlspecialchars($_POST['idRegistre']);
$dateVisite = htmlspecialchars($_POST['dateVisite']);
$visiteDemande = htmlspecialchars($_POST['visiteDemande']);
$resultat = htmlspecialchars($_POST['resultat']);
$observation = htmlspecialchars($_POST['observation']);
if(isset($idVisite) && isset($idRegistre) && isset($dateVisite) && isset($visiteDemande) && isset($resultat) && isset($observation))
{
	$visite= new Visite(array('numero' => $idVisite,'registre' => $idRegistre, 'date' => $dateVisite,'demande' => $visiteDemande, 'resultat' => $resultat,'observation' => $observation));
	$visiteManager->ajout($visite);
}
?>