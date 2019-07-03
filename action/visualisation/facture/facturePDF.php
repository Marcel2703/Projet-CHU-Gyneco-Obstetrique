<?php
require '../../../class/database.class.php';
require '../../../class/html2pdf/html2pdf.class.php';
ob_start();
$bdd= new Database();
$idRegistre=$_GET['idRegistre'];
if(isset($_GET['idRegistre']))
{
$idRegistre=$_GET['idRegistre'];
$ligne=$bdd->requete("SELECT * FROM sejour WHERE id_registre='{$idRegistre}'");
$count = $ligne->rowCount();
if ($count==0) 
	{
    	$nomPatiente = 'Compléter renseignement';
        $prenomPatiente = 'Compléter renseignement';
	}
else{
  $referenceSejour=$bdd->requete("SELECT id_sejour FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour");
  $totalLoyer=0;
  $categorieFinal='';
  if($ligne->rowCount()!='0'){
    while ( $fetchSejour = $referenceSejour->fetch(PDO::FETCH_ASSOC)) {
      $idSejour=$fetchSejour['id_sejour'];
      $sejour=$bdd->requete("SELECT DATEDIFF(date_sortie,date_entree) AS nbJour,id_chambre FROM sejour WHERE id_sejour='{$idSejour}'");
      while ($fetch = $sejour->fetch(PDO::FETCH_ASSOC)) {
      $nbJour = $fetch['nbJour'];
      $idChambre = $fetch['id_chambre'];
      $categ=$bdd->requete("SELECT categorie.prix AS prix,chambre.code_categorie AS categorie FROM chambre,categorie WHERE chambre.code_categorie=categorie.code_categorie AND chambre.id_chambre='{$idChambre}'");
      while ( $fetch1 = $categ->fetch(PDO::FETCH_ASSOC)) {
        $categorie = $fetch1['categorie'];
        $prix = $fetch1['prix'];
        $loyer=$nbJour*$prix;
        $avan=$bdd->requete("SELECT acte.designation AS designation,operation.operateur AS operateur,DATE_FORMAT(operation.date_heure,'%d/%m/%Y') AS dateForm, acte.mention AS mention FROM operation,acte,patiente WHERE (operation.id_acte=acte.id_acte AND patiente.id_registre='{$idRegistre}') AND operation.id_registre='{$idRegistre}'");
        while ( $fetch2 = $avan->fetch(PDO::FETCH_ASSOC)){
          $designation = $fetch2['designation'];
          $mention = $fetch2['mention'];
          $operateur = $fetch2['operateur'];
          $dateOperation = $fetch2['dateForm'];
          $term=$bdd->requete("SELECT nom_patiente,prenom_patiente FROM renseignement WHERE id_registre='{$idRegistre}'");
          if($term->rowCount()==0){
             $nomPatiente = 'Compléter renseignement';
             $prenomPatiente = 'Compléter renseignement';
          }
          else{
            while ( $fetch2 = $term->fetch(PDO::FETCH_ASSOC)) {
            $nomPatiente = $fetch2['nom_patiente'];
            $prenomPatiente = $fetch2['prenom_patiente'];
          }
          } 
        }
      }
  }
    $categorieFinal=$categorieFinal.''.$categorie;
    $totalLoyer=$totalLoyer+$loyer;
    }    	
}
}
		if ($totalLoyer==0 && $mention==0) {
			echo "<page backtop = '50mm'><h3 style='text-align:center'>Cette patiente n'a aucune charge à payer</h3></page>"; 
		}
		elseif($totalLoyer==0){ ?>
		<style type="text/css">
		#hospital{
			position: absolute;
			top: 50px;
			left: 20px;
			width: 250px;
			padding: 25px;
			padding-bottom: 75px;
			border: 1px dashed;
		}
		.libelle{
			font-weight: bold;
			position: relative;
		}
		.valeur{
			position: relative;
			left: 10px;
		}
		</style>
	<?php echo "
	<page backtop = '5%' backbottom = '5%' backleft = '5%' backright = '5%'>
			<div id='hospital'>
								<h4 style='text-align:center'>AVIS DE PAIEMENT<br/><span style='text-decoration:underline'>CHU DE FIANARANTSOA</span></h4>
								<div>
									<label class='libelle'>NOM :</label><label class='valeur'>$nomPatiente</label>
								</div>
								<div>
									<label class='libelle'>PRENOMS :</label><label class='valeur'>$prenomPatiente</label>
								</div>
								<div>
									<label class='libelle'>SERVICE :</label><label class='valeur'>Maternité</label>
								</div>
								<div>
									<label class='libelle'>ACTE :</label><label class='valeur'>$designation</label>
								</div>
								<div>
									<label class='libelle'>DATE DE L'ACTE :</label><label class='valeur'>$dateOperation</label>
								</div>
								<div>
									<label class='libelle'>OPERATEUR :</label><label class='valeur'>$operateur</label>
								</div>
								<div>
									<label class='libelle'>MENTION :</label><label class='valeur'>$mention Ariary</label>
								<br/><br/>
								</div>
								<div>
									<label style='position:relative;left:20px;'>Fianarantsoa, le</label><label></label><br/><br/>
								</div>
								<div>
									<label style='position:relative;left:50px;'>Signature</label><br/><br/>
									<label></label>
								</div>
			</div></page>";
		}
		elseif($mention==0){ ?>
		<style type="text/css">
		#tresor{
			position: absolute;
			top: 50px;
			left: 20px;
			width: 250px;
			padding: 25px;
			padding-bottom: 75px;
			border: 1px dashed;

		}
		.libelle{
			font-weight: bold;
			position: relative;
		}
		.valeur{
			position: relative;
			left: 10px;
		}
		</style>
	<?php echo "
	<page backtop = '5%' backbottom = '5%' backleft = '5%' backright = '5%'>								
			<div id='tresor'>
								<h4 style='text-align:center'>AVIS DE PAIEMENT<br/><span style='text-decoration:underline'>TRESOR</span></h4>
								<div>
									<label class='libelle'>NOM :</label><label class='valeur'>$nomPatiente</label>
								</div>
								<div>
									<label class='libelle'>PRENOMS :</label><label class='valeur'>$prenomPatiente</label>
								</div>
								<div>
									<label class='libelle'>SERVICE :</label><label class='valeur'>Maternité</label>
								</div>
								<div>
									<label class='libelle'>CATEGORIE :</label><label class='valeur'>$categorieFinal</label>
								</div>
								<div>
									<label class='libelle'>MENTION :</label><label class='valeur'>$totalLoyer Ariary</label>
									<br/><br/>
								</div>
								<div>
									<label style='position:relative;left:20px;'>Fianarantsoa, le</label><label></label><br/><br/>
								</div>
								<div>
									<label style='position:relative;left:50px;'>Signature</label>
									<label></label>
								</div>
			</div></page>";
		}
		else{ ?>
		<style type="text/css">
		#hospital{
			position: absolute;
			top: 50px;
			left: 20px;
			width: 250px;
			padding: 25px;
			padding-bottom: 75px;
			border: 1px dashed;
		}
		#tresor{
			position: absolute;
			top: 50px;
			left: 400px;
			width: 250px;
			padding: 20px;
			padding-bottom: 75px;
			border: 1px dashed;
		}
		.libelle{
			font-weight: bold;
			position: relative;
		}
		.valeur{
			position: relative;
			left: 10px;
		}
		</style>
	<?php echo "
	<page backtop = '5%' backbottom = '5%' backleft = '5%' backright = '5%'>
			<div id='hospital'>
								<h4 style='text-align:center'>AVIS DE PAIEMENT<br/><span style='text-decoration:underline'>CHU DE FIANARANTSOA</span></h4>
								<div>
									<label class='libelle'>NOM :</label><label class='valeur'>$nomPatiente</label>
								</div>
								<div>
									<label class='libelle'>PRENOMS :</label><label class='valeur'>$prenomPatiente</label>
								</div>
								<div>
									<label class='libelle'>SERVICE :</label><label class='valeur'>Maternité</label>
								</div>
								<div>
									<label class='libelle'>ACTE :</label><label class='valeur'>$designation</label>
								</div>
								<div>
									<label class='libelle'>DATE DE L'ACTE :</label><label class='valeur'>$dateOperation</label>
								</div>
								<div>
									<label class='libelle'>OPERATEUR :</label><label class='valeur'>$operateur</label>
								</div>
								<div>
									<label class='libelle'>MENTION :</label><label class='valeur'>$mention Ariary</label>
								<br/><br/>
								</div>
								<div>
									<label style='position:relative;left:20px;'>Fianarantsoa, le</label><label></label><br/><br/>
								</div>
								<div>
									<label style='position:relative;left:50px;'>Signature</label>
									<label></label>
								</div>
			</div>
								
			<div id='tresor'>
								<h4 style='text-align:center'>AVIS DE PAIEMENT<br/><span style='text-decoration:underline'>TRESOR</span></h4>
								<div>
									<label class='libelle'>NOM :</label><label class='valeur'>$nomPatiente</label>
								</div>
								<div>
									<label class='libelle'>PRENOMS :</label><label class='valeur'>$prenomPatiente</label>
								</div>
								<div>
									<label class='libelle'>SERVICE :</label><label class='valeur'>Maternité</label>
								</div>
								<div>
									<label class='libelle'>CATEGORIE :</label><label class='valeur'>$categorieFinal</label>
								</div>
								<div>
									<label class='libelle'>MENTION :</label><label class='valeur'>$totalLoyer Ariary</label>
									<br/><br/>
								</div>
								<div>
									<label style='position:relative;left:20px;'>Fianarantsoa, le</label><label></label><br/><br/>
								</div>
								<div>
									<label style='position:relative;left:50px;'>Signature</label>
									<label></label>
								</div>
			</div></page>";
		}

}
else{
	echo "<page backtop = '20%'><h3 style='text-align:center'>Vous avez fait une erreur! Veuillez reéssayer après avoir afficher une facture en mode application</h3></page>";
}

$contenu = ob_get_clean();
	
	try 
	{
		$pdf = new HTML2PDF('P','A4','fr');
		$pdf->writeHTML($contenu);
		$pdf->Output('facture.pdf');
	}
	catch (HTML2PDF_exception $e)
	{
		die($e);
	}

?>