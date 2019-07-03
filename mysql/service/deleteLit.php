<?php

require '../../class/database.class.php';
require '../../class/litManager.class.php';

$litManager = new LitManager();
$idLit = htmlspecialchars($_GET['idLit']);

if( isset($idLit))
{
	$litManager->supprimer($idLit);
}


?>