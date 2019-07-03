<?php

require '../../../class/database.class.php';
require '../../../class/personnelManager.class.php';
require '../../../class/personnel.class.php';

$persoManager = new PersonnelManager();
$numPerso = htmlspecialchars($_POST['idPerso']);
$nomPerso = htmlspecialchars($_POST['nomPerso']);
$poste = htmlspecialchars($_POST['poste']);

if( isset($numPerso) && isset($nomPerso) && isset($poste))
{
	$perso= new Personnel(array('numero' => $numPerso,'nom' => $nomPerso,'poste' => $poste));
	$persoManager->ajout($perso);
}


?>