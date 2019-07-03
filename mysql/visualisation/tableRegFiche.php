<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT operation.id_registre AS id_registre,patiente.nom_patiente AS nom_patiente FROM operation,patiente WHERE operation.id_registre=patiente.id_registre");
echo "<table  class='table table-hover'>
				<tbody>";

while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
   	$idRegistre = $fetch['id_registre'];
	$nomPatiente = $fetch['nom_patiente'];
  	echo "<tr>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$idRegistre</td>
				<td class='col-lg-4 col-md-6 col-sm-6 col-xs-6'>$nomPatiente</td>
				<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/choixFiche.php?idRegistre=$idRegistre&nomPatiente=$nomPatiente' onclick=\"lien=$(this).attr('href');choixFiche(lien);return false;\"><button class='btn btn-warning'><span class='glyphicon glyphicon-ok-sign'></span></button></a></td>
		</tr>";
}
?>