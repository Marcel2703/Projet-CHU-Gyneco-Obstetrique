<?php

require '../../../class/database.class.php';
require '../../../class/categorieManager.class.php';
require '../../../class/categorie.class.php';

$categManager = new CategorieManager();
$codeCategorie = htmlspecialchars($_POST['codeCateg']);
$nbOccupation = htmlspecialchars($_POST['occup']);
$prix = htmlspecialchars($_POST['prix']);

if( isset($codeCategorie) && isset($nbOccupation) && isset($prix))
{
	$categ= new Categorie(array('code' => $codeCategorie,'occupation' => $nbOccupation,'prix' => $prix));
	$categManager->ajout($categ);
}


?>