<?php 
require '../../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM acte ORDER BY id_acte');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$idActe = $fetch['id_acte'];
  	$designation = $fetch['designation'];
 	echo "<option value='$idActe'>$designation</option>";
}
$ligne->closeCursor();
?>