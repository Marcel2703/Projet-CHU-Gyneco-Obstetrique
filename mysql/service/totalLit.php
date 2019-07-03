<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete('SELECT * FROM lit ORDER BY id_chambre');
$total_lit=$ligne->rowCount();
echo $total_lit;
$ligne->closeCursor();
?>