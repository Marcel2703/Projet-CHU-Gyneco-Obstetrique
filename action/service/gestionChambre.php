<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptGestion.js"></script>
<div id="gestionChambre">
	<div id="choixGest" class="row">
		<section id="rechercheMobile">
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Recherches optimales</h4> </div><br/>
		<form onSubmit="return false" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="requeteCateg">Choix catégorie:</label>
			<select name="requeteCateg[]" id="requeteCateg" class="form-group form-control input-md" style="width:200px;display:inline;">
			</select>
			<select name="requeteEtatChambre[]" id="requeteEtatChambre" class="form-group form-control input-md" style="width:200px;display:inline;">								
								<option value="1">Chambres disponibles</option>
								<option value="2">Chambres occupées</option>
								<option value="0">Toutes les chambres</option>
			</select>
			<button type="submit" onclick="requeteCategorie();" class="btnGest" style="position:relative;right:-10px;">Valider</button><br/><br/>
		</form>
	</section>		
		<form onSubmit="return false" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="reservAfenina" style="display:none">
			<fieldset> 
				<legend class="row" style="color:white;height:50px;">
					<div class="panel-heading" style="background:rgb(0,50,0);height:40px;border-radius:5px;">
						<h4 style="margin-top:-0px;">Veuillez effectuer la réservation</h4>
					</div>
				</legend>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">						
						<div class="form-group">
							<label class="col-lg-5 col-md-5 col-sm-5" for="idChambre">N°Chambre:</label>
							<input type="texte" id="idChambre" class="form-control" style="width:225px;display:inline;" readonly/>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">	
							<label class="col-lg-5 col-md-5 col-sm-5" for="idLit">Lit:</label>
							<select name="idLit[]" id="idLit" class="form-group form-control input-md" style="width:200px;display:inline;">								
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label class="col-lg-5 col-md-5 col-sm-5" for="idRegistre">N°Registre:</label>
							<input type="text" id="idRegistre" class="form-control" style="width:225px;display:inline;"/>
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
							<label class="col-lg-5 col-md-5 col-sm-5" for="nom_patiente">Nom patiente:</label>
							<input type="text" id="nom_patiente" class="form-control" style="width:225px;display:inline;"/>
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
							<button type="reset" class="btnService" onclick="ajoutSejour();hialaReservation()">Réserver</button>		
							<button type="reset" onclick="hialaReservation()" class="btnService">Annuler</button>
						</div>						
					</div>
				</div>
				<legend class="row">
				</legend>				
			</fieldset>		
		</form>
	</div>
	<div style="margin:10px;margin-right:10px;">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Réservation des chambres</h3>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">N° Porte</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Categorie</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Disponibilité(Lit)</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Prix journée(Ar)</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style='text-align:center'>Réserver</th>
					</tr>
				</thead>
			</table>
			<section id="tabGestion">
				</tbody>
			</table>
			</section>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
</div>