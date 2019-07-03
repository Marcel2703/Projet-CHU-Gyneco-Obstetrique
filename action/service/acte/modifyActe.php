<?php

require '../../../class/database.class.php';
require '../../../class/acteManager.class.php';
require '../../../class/acte.class.php';

$acteManager = new ActeManager();
$numActe = htmlspecialchars($_POST['numActe']);
$designation = htmlspecialchars($_POST['designation']);
$mention = htmlspecialchars($_POST['mention']);

if( isset($numActe) && isset($designation) && isset($mention))
{
	$acte= new Acte(array('numero' => $numActe,'designation' => $designation,'mention' => $mention));
	$acteManager->modifier($acte);
}


?>