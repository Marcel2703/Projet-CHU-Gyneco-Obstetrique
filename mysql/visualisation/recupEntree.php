<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistreFiche'])){
	$idRegistre=$_COOKIE['idRegistreFiche'];
	$ligne=$bdd->requete("SELECT DATE_FORMAT(date_entree, '%W %e %m %Y') AS dateFormEntree FROM sejour WHERE id_registre = '{$idRegistre}' ORDER BY id_sejour LIMIT 1");
		while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
		{
  			$dateFormEntree = $fetch['dateFormEntree'];
  			$tabDate=explode(' ', $dateFormEntree);
  			$jour=$tabDate['0'];
  			$i=0;
  			switch ($jour)
			{ 
    			case 'Monday':
        		$i=0;
    			break;
    
    			case 'Tuesday':
        		$i=1;
    			break;
    
    			case 'Wednesday':
        		$i=2;
    			break;
    
    			case 'Thursday':
        		$i=3;
    			break;
    
    			case 'Friday':
        		$i=4;
    			break;
    			case 'Saturday':
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
  			echo $dateAffichable;
		}
$ligne->closeCursor();
}

?>