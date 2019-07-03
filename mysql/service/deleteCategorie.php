<?php

require '../../class/database.class.php';
require '../../class/categorieManager.class.php';

$categManager = new CategorieManager();
$codeCategorie = htmlspecialchars($_GET['codeCategorie']);

if( isset($codeCategorie))
{
	$categManager->supprimer($codeCategorie);
}


?>