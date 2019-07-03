<?php 
require '../../class/database.class.php';
$bdd= new Database();
$rechercheOperation=$_POST['rechercheOperation'];
$ligne=$bdd->requete("SELECT operation.id_operation AS id_operation,acte.designation AS designation,operation.operateur AS operateur,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm FROM operation,acte WHERE operation.id_acte=acte.id_acte");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idOperation = $fetch['id_operation'];
  	$designation = $fetch['designation'];
  	$operateur = $fetch['operateur'];
  	$dateHeure = $fetch['dateForm'];
  	$ligne1=$bdd->requete("SELECT patiente.nom_patiente AS nom_patiente FROM operation,patiente WHERE (operation.id_operation='{$idOperation}' AND operation.id_registre=patiente.id_registre) AND (patiente.id_registre LIKE '%$rechercheOperation%' OR patiente.nom_patiente LIKE '%$rechercheOperation%')");
  		while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
		{	
				$nomPatiente=$fetch1['nom_patiente'];
  		echo " <tr>					
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$nomPatiente</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$designation</td>					
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:10px;'>$operateur</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$dateHeure</td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/traitement/choixOperation.php?idOperation=$idOperation' onclick=\"lien=$(this).attr('href');choixOperation(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					</tr>";
		}
		$ligne1->closeCursor();
}
$ligne->closeCursor();
?>