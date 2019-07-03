<?php 
require '../../class/database.class.php';
require '../../class/sejourManager.class.php';
$bdd= new Database();
$sejourManager = new SejourManager();
$idRegistre=$_GET['idRegistre'];
$ligne=$bdd->requete("SELECT DISTINCT sejour.id_registre AS id_registre,sejour.nom_patiente AS nom_patiente FROM sejour,operation WHERE sejour.id_registre='{$idRegistre}' AND operation.id_registre='{$idRegistre}'");
$count = $ligne->rowCount();
if ($count==0) 
	{
	echo "0";
	}
else{
	while ($fetch = $ligne->fetch(PDO::FETCH_ASSOC)) {
			$idRegistre = $fetch['id_registre'];
			$nomPatiente = $fetch['nom_patiente'];
			echo $idRegistre.','.$nomPatiente;
		}
	}
/*$sejourManager->regler($idRegistre);*/
?>
