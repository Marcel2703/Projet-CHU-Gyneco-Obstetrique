<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptVisite.js"></script>
<div id="formVisite" class="row">
	<div style="margin:10px;margin-right:10px;" id="liste">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une patiente dont les visites lui ont été effectuées</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="rechercheVisite" class="sr-only">Recherche</label>
					<input type="search" id="rechercheVisite" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
						<tr class="success" style="font-size:15px;">
							<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2" style='padding-right:0px;'>Registre</th>
							<th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Nom</th>
							<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Acte</th>						
							<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date</th>
							<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Action</th>
						</tr>
				</thead>
				</thead>
			</table>
			<section id="tabOpVisite" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tabRechercheVisite" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
	</div>		
	<div style="margin:10px;margin-right:10px;">
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Ajouter les visites effectuées sur la patiente séléctionnée</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underline">Nom de la patiente:</label><span> </span><span id="nomPatiente"></span></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  					<div class="form-group">
  						<label style="font-size:15px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Date visite:</label>
								<input type="text" id="dateVisite" placeholder="Saisir date visite" class="form-control" style="width:250px;height:40px;display:inline-block;padding:4px;"/>				
					</div>
				</div>		
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  					<div class="form-group">
  						<label style="font-size:15px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Examen demandé:</label>
						<textarea id="visiteDemande" placeholder="Saisir examen demandé" rows="2" cols="45" class="form-control" style="display:inline;width:500px;"></textarea>				
					
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  					<div class="form-group">
  						<label style="font-size:15px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Resultats (Conclusion):</label>
						<textarea id="resultat" placeholder="Saisir les résultats" rows="2" cols="45" class="form-control" style="display:inline;width:500px;"></textarea>			
					
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  					<div class="form-group">
  						<label style="font-size:15px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Observation:</label>
						<textarea id="observation" placeholder="Saisir observation" rows="2" cols="45" class="form-control" style="display:inline;width:500px;"></textarea>				
					
					</div>
				</div>
				<div class="col-lg-4 col-md-5 col-sm-5" style="display:none">
  					<div class="form-group">
  						<label style="font-size:15px;" class="col-lg-7 col-md-4 col-sm-4 col-xs-4">Numéro visite:</label>
						<input type="text" id="idVisite" placeholder="Saisir numéro visite" class="form-control" style="width:100px;height:40px;display:none;padding:4px;"/>				
					
					</div>
				</div>
				<div class="col-lg-4 col-md-5 col-sm-5">
  					<div class="form-group" style="display:none">
  						<label style="font-size:15px;" class="col-lg-7 col-md-4 col-sm-4 col-xs-4">Numéro registre:</label>
						<input type="text" id="idRegistre" placeholder="Saisir numéro registre" class="form-control" style="width:100px;height:40px;display:none;padding:4px;" readonly/>				
					
					</div>
				</div>
				<div id="btnTraits" class="col-lg-4 col-md-3 col-sm-3">
				<button type="reset" class="btnService" style="width:100px;height:40px;display:none" onclick="ajoutVisite()" id="ajouter">Ajouter</button>		
				<button type="reset" class="btnService" style="width:100px;height:40px;display:none" onclick="terminerVisite()" id="terminer">Retour</button><br/><br/>
				</div>
				<div id="tableAfenina" class="row" style="margin:15px;display:none;">
					<table  class="table table-bordered table-hover" style="color:black;">
						<thead>
						<tr class="success">
							<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date</th>
							<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Examens demandés</th>
							<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Résultats</th>						
							<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Observation</th>					
						</tr>
						</thead>
					</table>
					<section id="tabListeVisite" style="background: rgb(228,228,228);">
						</tbody>
					</table>
					</section>
				</div>
				
			</div>			
		</form>
		
	</div>	
</div>