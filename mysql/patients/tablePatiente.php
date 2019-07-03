<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM patiente ORDER BY id_registre DESC');
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$idRegistre = $fetch['id_registre'];
  	$nomPatiente = $fetch['nom_patiente'];
  	$gestite = $fetch['gestite'];
  	$parite = $fetch['parite'];
  echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
				<td class='col-lg-4 col-md-4 col-sm-4 col-xs-4' style='padding-left:5px;'>$nomPatiente</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$gestite</td>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$parite</td>
				<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/choixPatiente.php?idRegistre=$idRegistre' onclick=\"lien=$(this).attr('href');choixPatiente(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
				<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/deletePatiente.php?idRegistre=$idRegistre' onclick=\"lien=$(this).attr('href');deletePatiente(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
    </tr>";
}
$ligne->closeCursor();
?>