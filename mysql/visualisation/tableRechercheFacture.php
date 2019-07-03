<?php 
require '../../class/database.class.php';
$bdd= new Database();
$rechercheFacture=$_POST['rechercheFacture'];
$ligne=$bdd->requete("SELECT DISTINCT id_registre,nom_patiente FROM sejour WHERE id_registre LIKE '%$rechercheFacture%' OR nom_patiente LIKE '%$rechercheFacture%' ORDER BY id_sejour DESC");
echo "<table  class='table table-hover'>
				<tbody>";
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
    $idRegistre = $fetch['id_registre'];
    $nomPatiente = $fetch['nom_patiente'];
    $ligne1=$bdd->requete("SELECT date_sortie,DATE_FORMAT(date_entree, '%W %e %M %Y') AS dateFormEntree FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour DESC LIMIT 1");
    while( $fetch = $ligne1->fetch(PDO::FETCH_ASSOC) ){
    $dateHeure = $fetch['dateFormEntree'];
    $dateFormEntree = $fetch['dateFormEntree'];
        $tabDate=explode(' ', $dateHeure);
        $jour=$tabDate['0'];
        $i=0;
        switch ($jour)
      { 
          case 'Monday':
            $i=0;
          break;
    
          case 'Tuesday': // dans le cas où $note vaut 5
            $i=1;
          break;
    
          case 'Wednesday': // dans le cas où $note vaut 7
            $i=2;
          break;
    
          case 'Thursday': // etc. etc.
            $i=3;
          break;
    
          case 'Friday':
            $i=4;
          break;
          case 'Saturday': // etc. etc.
            $i=5;
          break;
    
          case 'Sunday':
            $i=6;
          break;
          default:
            $i=7;
      }
      $numJour=$tabDate['1'];
      $vraimois=$tabDate['2']-0;
      $annee=$tabDate['3'];
        $tabJour = array ('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche','');
        $tabMois = array ('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $dateAffichable=$tabJour[$i].' '.$numJour.' '.$tabMois[$vraimois].' '.$annee;
    $dateSortie=$fetch['date_sortie'];
    if($dateSortie!='0000-00-00')
    {
      echo " <tr>
        <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
        <td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPatiente</td>           
        <td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$dateAffichable</td>
        <td class='col-lg-1 col-md-2 col-sm-1 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/afficherFacture.php?idRegistre=$idRegistre' onclick=\"lien=$(this).attr('href');afficherFacture(lien);return false;\"><button class='btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span></button></a></td>
    </tr>";
    }
    else{
      echo " <tr>
        <td class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>$idRegistre</td>
        <td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$nomPatiente</td>           
        <td class='col-lg-3 col-md-4 col-sm-4 col-xs-4'>$dateAffichable</td>
        <td class='col-lg-1 col-md-2 col-sm-1 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/visualisation/verificationFacture.php?idRegistre=$idRegistre' onclick=\"lien=$(this).attr('href');editerFacture(lien);return false;\"><button class='btn btn-danger'><span class='glyphicon glyphicon-pencil'></span></button></a></td>
    </tr>";
    }
    }
    
  
}
$ligne->closeCursor();
?>