<?php 
require '../../class/database.class.php';
$bdd= new Database();
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];
$ligne=$bdd->requete("SELECT patiente.id_registre AS id_registre,patiente.nom_patiente AS nom_patiente,DATE_FORMAT(operation.date_heure, '%d/%m/%Y à %Hh%imin') AS dateForm FROM patiente,operation WHERE (operation.date_heure BETWEEN '{$dateInitiale}' AND '{$dateFinale}') AND patiente.id_registre=operation.id_registre");
$total_patiente=$ligne->rowCount();
echo $total_patiente;
$ligne->closeCursor();
?>