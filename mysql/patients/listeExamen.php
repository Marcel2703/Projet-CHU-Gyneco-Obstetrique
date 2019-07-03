<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistre'])){
	$idRegistre=$_COOKIE['idRegistre'];
	$ligne=$bdd->requete("SELECT * FROM examen WHERE id_registre='{$idRegistre}'");
	echo "<table  class='table table-hover'>
				<tbody>";
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
	$idRegistre = $fetch['id_registre'];
  	$element = $fetch['element'];
  	$valeur = $fetch['valeur'];
  	$lien = $fetch['lien_image'];
  	if($lien==''){
  		echo " <tr>
						<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$element</td>					
						<td class='col-lg-3 col-md-5 col-sm-5 col-xs-5'>$valeur</td>
						<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>Pas d'illustration</td>
						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/deleteExam.php?idRegistre=$idRegistre&element=$element' onclick=\"lien=$(this).attr('href');deleteExam(lien);return false;\"><button class='btn btn-warning' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
								</tr>"; 
  	}
  	else{
  		echo " <tr>
						<td class='col-lg-2 col-md-4 col-sm-4 col-xs-4'>$element</td>					
						<td class='col-lg-3 col-md-5 col-sm-5 col-xs-5'>$valeur</td>
						<td class='col-lg-3 col-md-3 col-sm-3 col-xs-3'><img class=\"sary\" src='$lien' width='100'/></td>
						<td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/patients/deleteExam.php?idRegistre=$idRegistre&element=$element' onclick=\"lien=$(this).attr('href');deleteExam(lien);return false;\"><button class='btn btn-warning' style='text-align:center'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/suppr.png' width='15'/></span></button></a></td>
						<script>
						$('.sary').mouseover(function(){
      ($(this).attr('width','175'))
    })
		$('.sary').mouseout(function(){
      ($(this).attr('width','100'))
    })
		</script>
								</tr>"; 	
	}
  	}
  			
	$ligne->closeCursor();
}


?>