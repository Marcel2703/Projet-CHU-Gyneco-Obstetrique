<?php 
require '../../class/database.class.php';
$bdd= new Database();
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];
$ligne=$bdd->requete("SELECT id_bebe,id_operation, GROUP_CONCAT(valeur) AS groupement FROM protocoleA WHERE element IN('heure de délivrance','nom du bébé','Prenom du bébé','Sexe','Etat') GROUP BY id_bebe");
$total_bebe=$ligne->rowCount();
echo $total_bebe;
$ligne->closeCursor();
?>