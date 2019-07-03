<?php 
session_start();
require '../../class/database.class.php';
$bdd= new Database();
$annee=$_POST['annee'];
$tableauNaissance= array('0','0','0','0','0','0','0','0','0','0','0','0');
$ligne=$bdd->requete("SELECT COUNT(*) AS nb_bebe,MONTH(operation.date_heure) AS mois FROM protocoleA,operation WHERE (protocoleA.element='heure de délivrance' AND protocoleA.id_operation=operation.id_operation) AND YEAR(operation.date_heure)='{$annee}' GROUP BY MONTH(operation.date_heure)");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$nbBebe = $fetch['nb_bebe'];
    $mois = $fetch['mois'];
    $index=$mois-1;
    $tableauNaissance[$index]=$nbBebe;
}
$_SESSION['ordonneeNaissance'] = $tableauNaissance;
$_SESSION['anneeNaissance'] = $annee;
$ligne->closeCursor();
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/diagramme naissance/containDiagNaissance.php #histo');
?>