<?php 
require '../../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT id_registre,nom_patiente FROM patiente');
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$idRegistre = $fetch['id_registre'];
  	$nomPatiente = $fetch['nom_patiente'];
  	$ligne1=$bdd->requete("SELECT id_registre FROM operation WHERE id_registre='{$idRegistre}'");
  	if($ligne1->rowCount()==0){
  		echo "<option value='$idRegistre'>$nomPatiente</option>";
  	}

}
$ligne->closeCursor();
?>