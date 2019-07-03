<?php 
require '../../class/database.class.php';
$bdd= new Database();
$idChambre=$_POST['idChambre'];
$ligne=$bdd->requete("SELECT * FROM sejour WHERE id_chambre='{$idChambre}'");
$total_reserv=$ligne->rowCount();
echo $idChambre.','.$total_reserv;
$ligne->closeCursor();
?>