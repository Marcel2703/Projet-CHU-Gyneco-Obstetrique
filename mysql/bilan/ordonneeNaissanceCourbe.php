<?php 
session_start();
require '../../class/database.class.php';
$bdd= new Database();
$annee=$_POST['annee'];
$tableauNaissanceVivant= array('0','0','0','0','0','0','0','0','0','0','0','0');
$ligne=$bdd->requete("SELECT COUNT(*) AS nb_bebe,MONTH(operation.date_heure) AS mois FROM protocoleA,operation WHERE (protocoleA.element='etat' AND protocoleA.id_operation=operation.id_operation) AND (YEAR(operation.date_heure)='{$annee}' AND protocoleA.valeur='Vivant') GROUP BY MONTH(operation.date_heure)");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$nbBebe = $fetch['nb_bebe'];
    $mois = $fetch['mois'];
    $index=$mois-1;
    $tableauNaissanceVivant[$index]=$nbBebe;
}
$_SESSION['ordonneeNaissanceVivant'] = $tableauNaissanceVivant;
$_SESSION['anneeNaissanceCourbe'] = $annee;
$ligne->closeCursor();
//naisssance mort

$tableauNaissanceMort= array('0','0','0','0','0','0','0','0','0','0','0','0');
$ligne1=$bdd->requete("SELECT COUNT(*) AS nb_bebe,MONTH(operation.date_heure) AS mois FROM protocoleA,operation WHERE (protocoleA.element='etat' AND protocoleA.id_operation=operation.id_operation) AND (YEAR(operation.date_heure)='{$annee}' AND protocoleA.valeur='Mort') GROUP BY MONTH(operation.date_heure)");
while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
{
  	$nbBebe = $fetch1['nb_bebe'];
    $mois = $fetch1['mois'];
    $index=$mois-1;
    $tableauNaissanceMort[$index]=$nbBebe;
}
$_SESSION['ordonneeNaissanceMort'] = $tableauNaissanceMort;
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/courbe naissance/containCourbeNaissance.php #courbe');
?>