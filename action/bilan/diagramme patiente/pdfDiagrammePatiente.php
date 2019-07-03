<?php
require '../../../class/database.class.php';
require '../../../class/html2pdf/html2pdf.class.php';
ob_start();
$bdd= new Database();
$idRegistre='1005';
$ligne=$bdd->requete("SELECT * FROM sejour WHERE id_registre='{$idRegistre}'");
$count = $ligne->rowCount();
if ($count==0) 
	{
    $result[] = array(
                'nom'=>'compléter renseignement',
                'prenom'=>'compléter renseignement',
              );
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
    $categorieFinal=$categorieFinal.$categorie;
    $totalLoyer=$totalLoyer+$loyer;
    }    
    $result[] = array(
                'nom'=>$nomPatiente,
                'prenom'=>$prenomPatiente,
                'acte'=>$designation,
                'dateOperation'=>$dateOperation,
                'operateur'=>$operateur,
                'mention'=>$mention,
                'categorie'=>$categorieFinal,
                'loyer'=>$totalLoyer,
              );  
  }
	
}
?>
	<page backtop = "50mm" >
		<div>
								<h3>Facture de l'hopital</h3>
								<div>
									<label>NOM:</label><label><?php echo $nomPatiente?></label>
								</div>
								<div>
									<label>PRENOMS:</label><label><?php echo $prenomPatiente?></label>
								</div>
								<div>
									<label>SERVICE:</label><label>Maternité</label>
								</div>
								<div>
									<label>ACTE:</label><label><?php echo $designation?></label>
								</div>
								<div>
									<label>DATE DE L'ACTE:</label><label><?php echo $dateOperation?></label>
								</div>
								<div>
									<label>OPERATEUR:</label><label><?php echo $operateur?></label>
								</div>
								<div>
									<label>MENTION:</label><label><?php echo $mention?></label>
								</div>
								<div>
									<label>Fianarantsoa, le</label><label></label>
								</div>
								<div>
									<label>Signature</label>
									<label></label>
								</div>
			</div>
	</page>
<?php
$contenu = ob_get_clean();
	
	try 
	{
		$pdf = new HTML2PDF('P','A4','fr');
		$pdf->pdf->SetDisplayMode ('fullpage');
		$pdf->writeHTML($contenu);
		$pdf->Output('diagramme.pdf');
	}
	catch (HTML2PDF_exception $e)
	{
		die($e);
	}

?>