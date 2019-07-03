<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM personnel ORDER BY id_perso');
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idPerso = $fetch['id_perso'];
  	$nomPerso = $fetch['nom_perso'];
  	$poste = $fetch['poste'];
  echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idPerso</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPerso</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>$poste</td>
				<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixPerso.php?idPerso=$idPerso' onclick=\"lien=$(this).attr('href');choixPerso(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
				<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/deletePersonnel.php?idPerso=$idPerso' onclick=\"lien=$(this).attr('href');deletePersonnel(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
		</tr>";
}
$ligne->closeCursor();
?>