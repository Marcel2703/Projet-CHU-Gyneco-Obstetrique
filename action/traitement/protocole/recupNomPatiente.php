<?php
function get_nom_patiente($idOperation)
{
	require '../../../class/database.class.php';
	$bdd= new Database();
	$ligne=$bdd->requete("SELECT nom_patiente FROM operation WHERE id_operation='{$idOperation}'");

	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  		$nomPatiente = $fetch['nom_patiente'];
	}
	return $nomPatiente;
}