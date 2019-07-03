<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT chambre.id_chambre AS id_chambre,chambre.code_categorie AS code_categorie,categorie.nb_occup AS dispo_total,chambre.place_occup AS place_occup FROM chambre,categorie WHERE chambre.code_categorie=categorie.code_categorie ORDER BY id_chambre');
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idChambre = $fetch['id_chambre'];
  	$codeCategorie = $fetch['code_categorie'];
  	$dispo_total = $fetch['dispo_total'];
  	$occup = $fetch['place_occup'];
  	$dispo=$dispo_total-$occup;
  echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$dispo</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:20px;'>$occup</td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/choixChambre.php?idChambre=$idChambre' onclick=\"lien=$(this).attr('href');choixChambre(lien);return false;\"><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
					<td class='col-lg-1 col-md-3 col-sm-3 col-xs-3' stle='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/deleteChambre.php?idChambre=$idChambre' onclick=\"lien=$(this).attr('href');deleteChambre(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
		</tr>";
}
$ligne->closeCursor();
?>