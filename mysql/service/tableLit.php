<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM lit ORDER BY id_chambre');
$total_lit=$ligne->rowCount();
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idLit=$fetch['id_lit'];
	$idChambre=$fetch['id_chambre'];
	$occupation=$fetch['occupation'];
	echo "<tr>
                  <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idLit</td>
                  <td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:15px;'>$idChambre</td>
                  <td class='col-lg-3 col-md-4 col-sm-4 col-xs-4' style='padding-left:20px;'>$occupation</td>
                  <td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/service/deleteLit.php?idLit=$idLit' onclick=\"lien=$(this).attr('href');deleteLit(lien);return false;\"><button class='btn btn-danger' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
    </tr>";
}
$ligne->closeCursor();
?>