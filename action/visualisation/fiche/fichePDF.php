<?php
require '../../../class/database.class.php';
require '../../../class/html2pdf/html2pdf.class.php';
ob_start();
$bdd= new Database();
$idRegistre=$_GET['idRegistre'];
$query = $bdd->requete(" SELECT *,YEAR(NOW()) AS androany,YEAR(naissance) AS taona FROM renseignement WHERE id_registre = '{$idRegistre}' LIMIT 1");
$count = $query->rowCount();
if($count == 0)
	{
		echo "0";
	}
else
{
	while( $fetch = $query->fetch(PDO::FETCH_ASSOC) ){
		$nom=$fetch['nom_patiente'];
		$prenom=$fetch['prenom_patiente'];
		$androany=$fetch['androany'];
		$taona=$fetch['taona'];
		$age=$androany-$taona;
		$lieu=$fetch['lieu'];
		$pere=$fetch['pere'];
		$mere=$fetch['mere'];
		$domicile=$fetch['domicile'];
		$croyance=$fetch['croyance'];
		$profession=$fetch['profession'];
		$situation=$fetch['situation'];

		$referenceSejour=$bdd->requete("SELECT * FROM sejour WHERE id_registre='{$idRegistre}' ORDER BY id_sejour DESC");
		$chambreFinale='';
		$litFinal='';
		while ( $fetchSejour = $referenceSejour->fetch(PDO::FETCH_ASSOC)) {
      		$idChambre=$fetchSejour['id_chambre'];
      		$idLit=$fetchSejour['id_lit'];
      		$chambreFinale.='n°'.$idChambre.' ';
      		$litFinal.='n°'.$idLit.' ';
      	}
	echo "
	<page backtop='0%' backleft='2%'>
	<style>
		.rens{
			font-weight:bold
		}
	</style>
					<div style='border:1px;position:absolute;top:15px;left:-3px;padding:10px;width:103px;font-size:13px;'>
						<label>N° ATU : </label><br/><br/>
						<label>Dossier n°$idRegistre </label>
					</div>
					<div style='text-align:center;' align='center'>
						<h4 style='margin-bottom:7px;'>MINISTERE DE LA SANTE ET DU PLANNING FAMILIAL</h4>
						<h4 style='margin-top:0px;margin-bottom:7px;'>CENTRE HOSPITALIER UNIVERSITAIRE DE FIANARANTSOA</h4>
						<h4 style='margin-top:0px;'>USFR: <b>Maternité</b></h4>
					</div>
					<div style='border:1px;position:absolute;top:15px;right:10px;padding:10px 5px 10px 5px;width:110px;right:7px;'>
						<label style='font-size:12px;padding-bottom:5px;'>Chambre </label><label style='font-size:12px;'>$chambreFinale</label><br/><br/>
						<label>Lit </label><label style='font-size:12px;'>$litFinal</label>
					</div>
					<h4 style='text-decoration:underline'>ETAT CIVIL</h4>
  					<div style='display:inline;width:400px;'>
						<label class='rens'>Nom :</label>
						<label>$nom</label>
					</div>
  					<div>
						<label class='rens'>Prenom :</label>
						<label>$prenom</label>
					</div>
  					<div  style='display:inline;width:400px;'>
						<label class='rens'>Age :</label>
						<label>$age ans</label>
					</div>
  					<div>
						<label class='rens'>Lieu de naissance :</label>
						<label>$lieu</label>
					</div>
  					<div style='display:inline;width:400px;'>
						<label class='rens'>Nom père :</label>
						<label>$pere</label>
					</div>
  					<div>
						<label class='rens'>Nom mère :</label>
						<label>$mere</label>
					</div>
  					<div style='display:inline;width:400px;'>
						<label class='rens'>Domicile :</label>
						<label>$domicile</label>
					</div>
  					<div>
						<label class='rens'>Croyance :</label>
						<label>$croyance</label>
					</div>		
  					<div style='display:inline;width:400px;'>
						<label class='rens'>Profession :</label>
						<label>$profession</label>
					</div>
  					<div>
						<label class='rens'>Situation matrimoniale :</label>
						<label>$situation</label>
					</div>
	</page>";
	}
}
$ligne=$bdd->requete("SELECT acte.designation AS designation FROM operation,acte WHERE operation.id_registre = '{$idRegistre}' AND operation.id_acte=acte.id_acte ORDER BY operation.id_operation DESC LIMIT 1");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{
  	$designation = $fetch['designation'];
  	echo "<div>
						<h4 style='text-decoration:underline;display:inline;margin-bottom:0px;'>MOTIF D'ENTREE<span style='text-decoration:none;'> : </span><label style='font-size:14px;font-weight:normal;text-decoration:none'>$designation</label></h4>
						
					</div>";
}
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
  			echo "<div>
						<h4 style='text-decoration:underline;display:inline;margin-bottom:0px;'>DATE D'ENTREE<span style='text-decoration:none;'> : </span><label style='font-size:14px;font-weight:normal;text-decoration:none'>$dateAffichable</label></h4>
						
					</div>";
		}
	echo "
					<div style='margin-bottom:75px;'>
						<h4 style='text-decoration:underline;margin-bottom:0px;'>ANTECEDENTS<span style='text-decoration:none;'>:</span></h4>
					</div>
					<div>
						<h4 style='text-decoration:underline;margin-bottom:7px;'>EXAMEN CLINIQUE<span style='text-decoration:none;'> : </span></h4>
					</div>";

$ligne=$bdd->requete("SELECT * FROM examen WHERE id_registre='{$idRegistre}'");
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  	$element = $fetch['element'];
  	$valeur = $fetch['valeur'];
  	$lienImage = $fetch['lien_image'];
  			echo "	<div>
						<label class='rens'>$element : </label>
						<label>$valeur</label>
					</div>"; 	
	}

echo "<div>
			<h4 style='text-decoration:underline;margin-bottom:7px;'>EXAMEN CLINIQUE<span style='text-decoration:none;'> : </span></h4>
		</div>";
$ligne=$bdd->requete("SELECT * FROM examenApres WHERE id_registre='{$idRegistre}'");
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  	$element = $fetch['element'];
  	$valeur = $fetch['valeur'];
  	$lienImage = $fetch['lien_image'];
  			echo "	<div>
						<label class='rens'>$element : </label>
						<label>$valeur</label>
					</div>"; 	
	}
echo "
					<div>
						<h4 style='text-decoration:underline;margin-bottom:50px;'>HYPOTHESES DIAGNOSTIQUES<span style='text-decoration:none;'> : </span></h4>
					</div>
					<div>
			<h4 style='text-decoration:underline;margin-bottom:7px;'>EXAMEN COMPLEMENTAIRE<span style='text-decoration:none;'> : </span></h4>
		</div>";

$ligne=$bdd->requete("SELECT *,DATE_FORMAT(date_visite, '%d/%m/%Y') AS dateForm FROM visite WHERE id_registre='{$idRegistre}' ORDER BY id_visite");
?><style>

	table {
		border-collapse: collapse;
		width: 100%;
		color: rgb(50,50,50);
		font-family: helvetica;
		line-height: 20mm;
		vertical-align: top;
	}
	table td {
		border : 1px solid rgb(79,79,79);
		padding: 3mm 1mm;
		margin-right: 10px;
	}

	table th {
		border : 1px solid rgb(79,79,79);
		padding: 3mm 1mm;
	}
</style>
<div>
<table>
								<thead>
									<tr>
										<th>Date</th>
										<th style="width:175px;">Examens demandés</th>
										<th style="width:250px;">Résultats</th>						
										<th style="width:170px;">Observation</th>
									</tr>
								</thead>
				<tbody>
					<?php
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
  		$dateForm = $fetch['dateForm'];
  		$demandeVisite = $fetch['demande_visite'];
  		$resultat = $fetch['resultat'];
  		$observation = $fetch['observation'];
  ?><tr>
				<td><?php echo $dateForm ?></td>
				<td><?php echo $demandeVisite ?></td>
				<td><?php echo $resultat ?></td>
				<td><?php echo $observation ?></td>
		</tr><?php
	}
	?>
		</tbody>
	</table>
</div>
<?php
echo "
					<div>
			<h4 style='text-decoration:underline;margin-bottom:7px;'>EVOLUTION<span style='text-decoration:none;'> : </span></h4>
		</div>";
?>
<style>

	table {
		border-collapse: collapse;
		width: 100%;
		color: rgb(50,50,50);
		font-family: helvetica;
		line-height: 20mm;
		vertical-align: top;
	}
	#evolution td {
		border : 1px solid rgb(79,79,79);
		padding: 3mm 1mm;
		margin-right: 10px;
		padding-bottom: 100px
	}

	table th {
		border : 1px solid rgb(79,79,79);
		padding: 3mm 1mm;
	}
</style>
	<table id="evolution">
				<thead>
					<tr>
						<th style="width:57px;">Date</th>
						<th style="width:363px;">Evolution</th>
						<th style="width:250px;">CAT</th>						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
		</tbody>
	</table>
<?php
$contenu = ob_get_clean();
	
	try 
	{
		$pdf = new HTML2PDF('P','A4','fr');
		$pdf->writeHTML($contenu);
		$pdf->Output('fiche.pdf');
	}
	catch (HTML2PDF_exception $e)
	{
		die($e);
	}