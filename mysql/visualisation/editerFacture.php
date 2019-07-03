<?php 
require '../../class/database.class.php';
require '../../class/sejourManager.class.php';
$bdd= new Database();
$sejourManager = new SejourManager();
$idRegistre=$_GET['idRegistre'];
$sejourManager->regler($idRegistre);
?>