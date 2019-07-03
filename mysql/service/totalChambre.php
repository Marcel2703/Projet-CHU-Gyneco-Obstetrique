<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM chambre ORDER BY id_chambre');
$total_chambre=$ligne->rowCount();
echo $total_chambre;
$ligne->closeCursor();
?>