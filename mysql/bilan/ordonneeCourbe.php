<?php 
session_start();
require '../../class/database.class.php';
$bdd= new Database();
$annee=$_POST['annee'];
//ordonneePatiente
$ligne=$bdd->requete("SELECT count(DISTINCT id_registre) AS nb_patiente, MONTH(date_heure) AS mois FROM operation WHERE YEAR(date_heure)='{$annee}' GROUP BY MONTH(date_heure)");
$tableauPatiente= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$nbPatiente = $fetch['nb_patiente'];
	$mois = $fetch['mois'];
	$index=$mois-1;
	$tableauPatiente[$index]=$nbPatiente;
}
$_SESSION['ordonneeCourbePatiente'] = $tableauPatiente;
$_SESSION['anneeCourbe'] = $annee;
$ligne->closeCursor();
print_r($_SESSION['ordonneeCourbePatiente']) ;
//ordonneeeAccouchement
$ligne1=$bdd->requete("SELECT count(DISTINCT id_operation) AS nb_accouchement, MONTH(date_heure) AS mois FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='1' GROUP BY MONTH(date_heure)");
$tableauAccouchement= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
{
	$nbAccouchement = $fetch1['nb_accouchement'];
	$mois = $fetch1['mois'];
	$index=$mois-1;
	$tableauAccouchement[$index]=$nbAccouchement;
}
$_SESSION['ordonneeAccouchement'] = $tableauAccouchement;
$ligne1->closeCursor();
print_r($_SESSION['ordonneeAccouchement']) ;

//ordonneeCesariennne
$ligne2=$bdd->requete("SELECT count(DISTINCT id_operation) AS nb_cesarienne, MONTH(date_heure) AS mois FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='2' GROUP BY MONTH(date_heure)");
$tableauCesarienne= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch2 = $ligne2->fetch(PDO::FETCH_ASSOC) )
{
	$nbCesarienne = $fetch2['nb_cesarienne'];
	$mois = $fetch2['mois'];
	$index=$mois-1;
	$tableauCesarienne[$index]=$nbCesarienne;
}
$_SESSION['ordonneeCesarienne'] = $tableauCesarienne;
$ligne2->closeCursor();
print_r($tableauCesarienne) ;

//ordonnee avortement
$ligne3=$bdd->requete("SELECT count(DISTINCT id_operation) AS nb_avortement, MONTH(date_heure) AS mois FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='3' GROUP BY MONTH(date_heure)");
$tableauAvortement= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch3 = $ligne3->fetch(PDO::FETCH_ASSOC) )
{
	$nbAvortement = $fetch3['nb_avortement'];
	$mois = $fetch3['mois'];
	$index=$mois-1;
	$tableauAvortement[$index]=$nbAvortement;
}
$_SESSION['ordonneeAvortement'] = $tableauAvortement;
$ligne2->closeCursor();
print_r($_SESSION['ordonneeAvortement']) ;

//autres
$ligne4=$bdd->requete("SELECT count(DISTINCT id_operation) AS nb_autres, MONTH(date_heure) AS mois FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte>'3' GROUP BY MONTH(date_heure)");
$tableauAutres= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch4 = $ligne4->fetch(PDO::FETCH_ASSOC) )
{
	$nbAutres = $fetch4['nb_autres'];
	$mois = $fetch4['mois'];
	$index=$mois-1;
	$tableauAutres[$index]=$nbAutres;
}
$_SESSION['ordonneeAutres'] = $tableauAutres;
$ligne3->closeCursor();
print_r($_SESSION['ordonneeAutres']) ;
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/courbe/containCourbe.php #courbe');
?>