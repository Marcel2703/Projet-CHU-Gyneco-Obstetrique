<?php

require '../../../class/database.class.php';
require '../../../class/chambreManager.class.php';
require '../../../class/chambre.class.php';

$chambreManager = new ChambreManager();
$idChambre = htmlspecialchars($_POST['idChambre']);
$codeCategorie = htmlspecialchars($_POST['codeCategorie']);
if( isset($idChambre) && isset($codeCategorie))
{
	$chambre= new Chambre(array('numero' => $idChambre,'categorie' => $codeCategorie));
	$chambreManager->ajout($chambre);
}


?>