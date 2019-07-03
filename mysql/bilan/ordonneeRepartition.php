<?php 
session_start();
require '../../class/database.class.php';
$bdd= new Database();
$annee=$_POST['annee'];
$tableauRepartition= array('0','0','0','0');
//fct
function pourcenter($total,$part){
	$result=$part/$total*100;
	return $result;
}
//ordonneeOperation
$ligne=$bdd->requete("SELECT * FROM operation WHERE YEAR(date_heure)='{$annee}'");
$nbOperation=$ligne->rowCount();

//ordonneeeAccouchement
$ligne1=$bdd->requete("SELECT * FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='1'");
$nbAccouchement=$ligne1->rowCount();
$partAccouchement=pourcenter($nbOperation,$nbAccouchement);

//ordonneeCesariennne
$ligne2=$bdd->requete("SELECT * FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='2'");
$nbCesarienne=$ligne2->rowCount();
$partCesarienne=pourcenter($nbOperation,$nbCesarienne);


//ordonnee avortement
$ligne3=$bdd->requete("SELECT * FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte='3'");
$nbAvortement=$ligne3->rowCount();
$partAvortement=pourcenter($nbOperation,$nbAvortement);

//autres
$ligne4=$bdd->requete("SELECT * FROM operation WHERE YEAR(date_heure)='{$annee}' AND id_acte>'3'");
$nbAutres=$ligne4->rowCount();
$partAutres=pourcenter($nbOperation,$nbAutres);

//insertion
$tableauRepartition= array($partAccouchement,$partCesarienne,$partAvortement,$partAutres);
$_SESSION['ordonneeRepartition'] = $tableauRepartition;
$_SESSION['anneeRepartition'] = $annee;
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/repartition/containRepartition.php #pourcentage');
?>