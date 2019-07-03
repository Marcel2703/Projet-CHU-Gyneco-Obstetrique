<?php 
session_start();
require '../../class/database.class.php';
$bdd= new Database();
$annee=$_POST['annee'];
$ligne=$bdd->requete("SELECT count(DISTINCT id_registre) AS nb_patiente, MONTH(date_entree) AS mois FROM sejour WHERE YEAR(date_entree)='{$annee}' GROUP BY MONTH(date_entree) ORDER BY date_entree");
echo "<table  class='table table-hover'>
				<tbody>";
$tableauPatiente= array('0','0','0','0','0','0','0','0','0','0','0','0');
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
	$nbPatiente = $fetch['nb_patiente'];
	$mois = $fetch['mois'];
	$index=$mois-1;
	$tableauPatiente[$index]=$nbPatiente;
}
$_SESSION['ordonneePatiente'] = $tableauPatiente;
$_SESSION['anneePatiente'] = $annee;
$ligne->closeCursor();
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/diagramme patiente/containDiagPatiente.php #histo');
?>