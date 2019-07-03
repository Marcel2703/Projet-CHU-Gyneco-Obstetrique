<?php

require '../../class/database.class.php';
require '../../class/personnelManager.class.php';

$personnelManager = new PersonnelManager();
$idPerso = htmlspecialchars($_GET['idPerso']);

if( isset($idPerso))
{
	$personnelManager->supprimer($idPerso);
}


?>