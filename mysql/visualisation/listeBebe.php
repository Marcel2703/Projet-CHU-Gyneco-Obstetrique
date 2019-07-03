<?php 
require '../../class/database.class.php';
$dateInitiale=$_POST['dateInitiale'];
$dateFinale=$_POST['dateFinale'];
$bdd= new Database();
$ligne=$bdd->requete("SELECT id_bebe,id_operation, GROUP_CONCAT(valeur ORDER BY element) AS groupement FROM protocoleA WHERE element IN('date de délivrance','date d\'extraction','nom du bébé','Prenom du bébé','Sexe','Etat') GROUP BY id_bebe");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$idBebe = $fetch['id_bebe'];
  	$idOperation = $fetch['id_operation'];
  	$groupement = $fetch['groupement'];
  	$tableau=explode(',', $groupement);
  	$taille=sizeof($tableau);
  	$nom=$tableau['2'].' '.$tableau['3'];
  	$sexe=$tableau['4'];
  	$etat=$tableau['1'];
  	$naissance=$tableau['0'];
  	$extraireDate=explode('-', $naissance);
  	$annee=$extraireDate['0'];
  	$mois=$extraireDate['1'];
  	$vraimois=$mois-1;
  	$jour=$extraireDate['2'];
  	$tabMois = array ('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
  	$dateAffichable=$jour.' '.$tabMois[$vraimois].' '.$annee;
    if($naissance>=$dateInitiale && $naissance<=$dateFinale)
  {
      $ligne1=$bdd->requete("SELECT patiente.nom_patiente AS nom_patiente FROM operation,patiente WHERE operation.id_operation='{$idOperation}' AND operation.id_registre=patiente.id_registre");
      while( $fetch1 = $ligne1->fetch(PDO::FETCH_ASSOC) )
    { 
    $nomPatiente = $fetch1['nom_patiente'];
      echo " <tr>
          <td class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>$idBebe</td>          
          <td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$nom</td>
          <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'style='padding-left:15px'>$dateAffichable</td>
          <td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:25px'>$nomPatiente</td>           
          <td class='col-lg-1 col-md-2 col-sm-2 col-xs-2' style='padding-left:35px'>$sexe</td>
          <td class='col-lg-1 col-md-1 col-sm-1 col-xs-1' style='padding-left:15px'>$etat</td>
          </tr>";
    }
  }
	
}
$ligne->closeCursor();
?>