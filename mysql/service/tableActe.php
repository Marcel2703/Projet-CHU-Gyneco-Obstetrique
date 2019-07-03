<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM acte ORDER BY id_acte');
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idActe = $fetch['id_acte'];
  	$designation = $fetch['designation'];
  	$mention = $fetch['mention'];
  	if($mention==0)
  	{
  		 echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idActe</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:15px;'>$designation</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px;'>Gratuit</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixActe.php?idActe=$idActe' onclick=\"lien=$(this).attr('href');choixActe(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
		</tr>";
  	}
  	else
  		{
  			echo " <tr>
				<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idActe</td>
				<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:15px;'>$designation</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px;'>$mention</td>
				<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixActe.php?idActe=$idActe' onclick=\"lien=$(this).attr('href');choixActe(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
		</tr>";
		}
 
}
$ligne->closeCursor();
?>