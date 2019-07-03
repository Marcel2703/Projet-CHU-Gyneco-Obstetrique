<?php
function getNom($idPatiente)
{	try
		{
 		$bdd = new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
		}
	catch(Exception $e)
		{
        die('Erreur : '.$e->getMessage());
		}
	$ligne=$bdd->prepare("SELECT * FROM patiente WHERE id_patiente=:idPatiente");
	$ligne->execute(array('idPatiente' => $idPatiente));
	$nom = $ligne->fetchAll();
	return $nom;
}
function getOperation($nomPatiente)
{
	$bdd= new Database();
	$ligne=$bdd->requete("SELECT acte.designation AS designation,operation.date_heure AS dateActe FROM operation,acte WHERE operation.id_acte=acte.id_acte AND nom_patiente='{$nomPatiente}'");
	$operation=$ligne->fetchAll();
	return $operation;
}