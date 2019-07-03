<?php 
require '../../class/database.class.php';
$bdd= new Database();
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];

$ligne=$bdd->requete("SELECT patiente.id_registre AS id_registre,patiente.nom_patiente AS nom_patiente,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm FROM patiente,operation WHERE (operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND patiente.id_registre=operation.id_registre");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
   	$idRegistre = $fetch['id_registre'];
  	$nomPatiente = $fetch['nom_patiente'];
  	$dateForm=$fetch['dateForm'];
  	$ligne1=$bdd->requete("SELECT acte.designation AS designation FROM  operation,acte WHERE operation.id_registre='{$idRegistre}' AND operation.id_acte=acte.id_acte");
  	
  	while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
	{
		$designation = $fetch1['designation'];
  	echo "<tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPatiente</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$designation</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$dateForm</td>
		</tr>";
	}
}
?>