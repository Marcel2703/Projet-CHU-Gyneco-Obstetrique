<?php

require '../../../class/database.class.php';
require '../../../class/protocoleAccouchement.class.php';
require '../../../class/protocoleCesarienneManager.class.php';
require 'recupNomPatiente.php';

$protocoleCesarienneManager = new ProtocoleCesarienneManager();
$idOperation = htmlspecialchars($_POST['idOperation']);
$idBebe = htmlspecialchars($_POST['idBebe']);
$elmDateExtraction = htmlspecialchars($_POST['elmDateExtraction']);
$dateExtraction = htmlspecialchars($_POST['dateExtraction']);
$elmHeureExtraction = htmlspecialchars($_POST['elmHeureExtraction']);
$heureExtraction = htmlspecialchars($_POST['heureExtraction']);
$elmNomBebe = htmlspecialchars($_POST['elmNomBebe']);
$nomBebe = htmlspecialchars($_POST['nomBebe']);
$elmPrenomBebe = htmlspecialchars($_POST['elmPrenomBebe']);
$prenomBebe = htmlspecialchars($_POST['prenomBebe']);
$elmSexe = htmlspecialchars($_POST['elmSexe']);
$sexe = htmlspecialchars($_POST['sexe']);
$elmEtat = htmlspecialchars($_POST['elmEtat']);
$etat = htmlspecialchars($_POST['etat']);
$nom=$nomBebe.' '.$prenomBebe;
$arrayElm=array($elmDateExtraction,$elmHeureExtraction,$elmNomBebe,$elmPrenomBebe,$elmSexe,$elmEtat);
$arrayValeur=array($dateExtraction,$heureExtraction,$nomBebe,$prenomBebe,$sexe,$etat);
$taille=sizeof($arrayElm);
$i=0;
while($i<$taille)
{
	if( isset($idOperation) && isset($arrayElm[$i]) && isset($arrayValeur[$i]))
	{
	$protocoleCesarienne= new ProtocoleAccouchement(array('operation' => $idOperation,'bebe' => $idBebe,'element' => $arrayElm[$i],'valeur'=>$arrayValeur[$i]));
	$protocoleCesarienneManager->ajout($protocoleCesarienne);
	$i++;
	}
}
	/*$bdd= new Database();
	$ligne=$bdd->requete("SELECT nom_patiente FROM operation WHERE id_operation='{$idOperation}'");

	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  		$nomPatiente=$fetch['nom_patiente'];
  		if(isset($idOperation) && isset($nom) && isset($nomPatiente))
			{
			$bebe= new Bebe(array('operation' => $idOperation, 'nom' => $nom,'patiente' => $nomPatiente));
			$bebeManager->ajout($bebe);
			}
	}*/
?>