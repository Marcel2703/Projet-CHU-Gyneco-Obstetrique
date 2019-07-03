<?php 
require '../../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT * FROM personnel WHERE poste='Docteur' OR poste='Sagefemme'");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$nomPerso = $fetch['nom_perso'];
  	$poste = $fetch['poste'];
  	if($poste=="Docteur"){
  		$poste='Dr';
  	}
  	else{
  		$poste='SF';
  	}
  	$operateur=$poste.' '.$nomPerso;
  		echo "<option value='$operateur'>$operateur</option>";
}
$ligne->closeCursor();
?>