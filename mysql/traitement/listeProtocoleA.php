<?php 
session_start(); 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_SESSION['idOperation'])){
	$idOperation=$_SESSION['idOperation'];
	$ligne=$bdd->requete("SELECT protocoleA.id_operation AS id_operation, protocoleA.id_bebe AS id_bebe, protocoleA.element AS element, protocoleA.valeur AS valeur FROM protocoleA,operation WHERE (protocoleA.id_operation='{$idOperation}' AND operation.id_operation='{$idOperation}') AND operation.id_acte='1'");
	echo "<table  class='table table-hover'>
				<tbody>";
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
	$idOperation = $fetch['id_operation'];
	$idBebe = $fetch['id_bebe'];
  	$element = $fetch['element'];
  	$valeur = $fetch['valeur'];
  	if ($element=='Date de délivrance' || $element=='Heure de délivrance' || $element=='Nom du bébé' || $element=='Prenom du bébé' || $element=='Sexe' || $element=='Etat')
  	{
  			echo " <tr>
  						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idBebe</td>
						<td class='col-lg-3 col-md-5 col-sm-5 col-xs-5'>$element</td>					
						<td class='col-lg-4 col-md-5 col-sm-5 col-xs-5'>$valeur</td>
						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/deletePrincipProto.php?idBebe=$idBebe' onclick=\"lien=$(this).attr('href');deletePrincipalProto(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
		</tr>"; 	
	}
	else
	{
		echo " <tr>
  						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idBebe</td>
						<td class='col-lg-3 col-md-5 col-sm-5 col-xs-5'>$element</td>					
						<td class='col-lg-4 col-md-5 col-sm-5 col-xs-5'>$valeur</td>
						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/deleteAutresProto.php?idOperation=$idOperation&idBebe=$idBebe&element=$element' onclick=\"lien=$(this).attr('href');deleteAutresProto(lien);return false;\"><button class='btn btn-warning' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
		</tr>"; 
	}
	
}
$ligne->closeCursor();
}


?>