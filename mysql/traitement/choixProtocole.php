<?php
session_start();
$idOperation=$_GET['idOperation'];
$_SESSION['idOperation'] = $idOperation;
require '../../class/database.class.php';
$bdd= new Database();
$idActe=$_GET['idActe'];
$nomPatiente=$_GET['nomPatiente'];
$dateActe=$_GET['dateActe'];
$ligne=$bdd->requete("SELECT designation FROM acte WHERE id_acte='{$idActe}'");
while($fetch=$ligne->fetch(PDO::FETCH_ASSOC))
{
	$designation=$fetch['designation'];
}
$ligne->closeCursor();
$bebe=$bdd->requete("SELECT DISTINCT id_bebe FROM protocoleA WHERE id_operation='{$idOperation}' ORDER BY id_bebe DESC LIMIT 1");
if ($bebe->rowCount()==0) 
{
	$lastBebe=$bdd->requete("SELECT DISTINCT id_bebe FROM protocoleA ORDER BY id_bebe DESC LIMIT 1");
	if($lastBebe->rowCount()==0){
		$idBebe='1';
	}
	while($fetch=$lastBebe->fetch(PDO::FETCH_ASSOC))
		{
		$idBebe=$fetch['id_bebe']+1;
		}
		$lastBebe->closeCursor();	 
}
else
{
	while($fetch=$bebe->fetch(PDO::FETCH_ASSOC))
	{
	$idBebe=$fetch['id_bebe'];
	}
}
$bebe->closeCursor();
echo $designation.",".$nomPatiente.",".$dateActe.",".$idOperation.",".$idBebe;



