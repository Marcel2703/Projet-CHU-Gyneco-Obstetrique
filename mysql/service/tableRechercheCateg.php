<?php 
require '../../class/database.class.php';
$bdd= new Database();
$rechercheCateg=$_POST['rechercheCateg'];
$ligne=$bdd->requete("SELECT * FROM categorie WHERE code_categorie LIKE '%$rechercheCateg%' OR nb_occup LIKE '%$rechercheCateg%' ORDER BY code_categorie");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$codeCategorie = $fetch['code_categorie'];
  	$occcupation = $fetch['nb_occup'];
  	$prix = $fetch['prix'];
  	if($prix==0)
  	{
  		echo " <tr>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$codeCategorie</td>
					<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:15px;'>$occcupation</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px;'>Gratuit</td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixCategorie.php?codeCategorie=$codeCategorie' onclick=\"lien=$(this).attr('href');choixCategorie(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><button class='btn btn-danger' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/deleteCategorie.php?codeCategorie=$codeCategorie' onclick=\"lien=$(this).attr('href');deleteCategorie(lien);return false;\"><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
					</tr>";
  	}
  	else
  	{
  		echo " <tr>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$codeCategorie</td>
					<td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:15px;'>$occcupation</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px;'>$prix</td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixCategorie.php?codeCategorie=$codeCategorie' onclick=\"lien=$(this).attr('href');choixCategorie(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/deleteCategorie.php?codeCategorie=$codeCategorie' onclick=\"lien=$(this).attr('href');deleteCategorie(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
					</tr>";
  	}  
}
$ligne->closeCursor();
?>