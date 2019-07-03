<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptFacture.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.js"> </script>
<div id="formFacture" class="row">
	<div style="margin:10px;margin-right:10px;" id="liste">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une patiente dont vous voulez en éditer la facture</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheFacture" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">N° Registre</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Nom</th>						
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Date d'entrée</th>						
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Action</th>
					</tr>
				</thead>
			</table>
			<section id="tabSejour" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheFacture" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
	</div>		
	<div>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:5px;"><h4>Edition de la facture</h4> </div>
		<div class="form-group" style="font-size:15px;" id="ajoutPerso">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<fieldset id="factureHopital">
							<legend style="border-bottom:1px solid white">
								<h3 style="color:white">Facture de l'hopital</h3>
							</legend>
								<div class="row">
									<label class="col-lg-5">NOM:</label><label id="nom" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">PRENOMS:</label><label id="prenom" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">SERVICE:</label><label id="service" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">ACTE:</label><label id="acte" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">DATE DE L'ACTE:</label><label id="dateActe" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">OPERATEUR:</label><label id="operateur" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5">MENTION:</label><label id="mentionH" class="col-lg-6"></label>
								</div>
								<div class="row">
									<label class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2">Fianarantsoa, le</label><label id="dateEdition" class="col-lg-5"></label>
								</div>
								<div class="row">
									<label class="col-lg-4 col-lg-offset-7 col-md-4 col-md-offset-7 col-sm-4 col-sm-offset-7">Signature</label>
									<label class="col-lg-12" style="height:50px;"></label>
								</div>
							
				</fieldset>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<fieldset id="factureHopital">
							<legend style="border-bottom:1px solid white">
								<h3 style="color:white">Facture du trésor</h3>
							</legend>
								<div class="row">
									<label class="col-lg-4">NOM:</label><label id="nom" class="col-lg-7"></label>
								</div>
								<div class="row">
									<label class="col-lg-4">PRENOMS:</label><label id="prenom" class="col-lg-7"></label>
								</div>
								<div class="row">
									<label class="col-lg-4">SERVICE:</label><label id="service" class="col-lg-7"></label>
								</div>
								<div class="row">
									<label class="col-lg-4">CATEGORIE:</label><label id="categorie" class="col-lg-7"></label>
								</div>
								<div class="row">
									<label class="col-lg-4">MENTION:</label><label id="mentionT" class="col-lg-7"></label>
								</div>
								<div class="row">
									<label class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2">Fianarantsoa, le</label><label id="dateEdition" class="col-lg-5"></label>
								</div>
								<div class="row">
									<label class="col-lg-4 col-lg-offset-7 col-md-4 col-md-offset-7 col-sm-4 col-sm-offset-7">Signature</label>
									<label class="col-lg-12" style="height:50px;"></label>
								</div>
							
				</fieldset>
			</div>
			<div id="btnFacture" class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-8 col-md-offset-8 col-sm-offset-8">
				<a href="" target="_blank" id="lienPDF"><button type="submit" class="btnService" style="width:90px;height:40px;display:none">Print</button></a>	
				<button type="reset" class="btnService" onclick="retourFacture()" style="width:90px;height:40px;display:none">OK</button>
			</div>
		</div>
		
	</div>		
	</div>	
</div>