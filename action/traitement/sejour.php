<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptSejour.js"></script>
<div id="formSejour">
	<div style="margin:10px;margin-right:10px;" id="liste">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Séjours enregistrés</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheSejour" placeholder="Rechercher" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">N°</th>
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Chambre</th>
						<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">N°Lit</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Patiente</th>						
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Entrée</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Sortie</th>
						<th class="col-lg-0 col-md-1 col-sm-1 col-xs-1">Update</th>
					</tr>
				</thead>
			</table>
			<section id="tabSejour">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheSejour">
				</tbody>
			</table>
			</section>
	</div>	
	<div style="margin:10px;margin-right:10px;padding-bottom:2px;display:none" id="zoneModify">
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Modification des informations d'un séjour</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underline">Nom de la patiente:</label><span> </span><span id="nomPatiente"></span></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div class="row">
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="numSejour" class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Numero séjour:</label><input type="texte" id="numSejour" class="form-control" style="width:200px;" readonly/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="numChambre"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Numero chambre:</label><input type="texte" id="numChambre" class="form-control" style="width:200px;"/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="numLit"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Numero Lit:</label><input type="texte" id="numLit" class="form-control" style="width:200px;"/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="numRegistre"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Numero Registre:</label><input type="texte" id="numRegistre" class="form-control" style="width:200px;" readonly/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="nom_patiente"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Nom Patiente:</label><input type="texte" id="nom_patiente" class="form-control" style="width:200px;" readonly/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="dateEntree"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Date d'entrée:</label><input type="texte" id="dateEntree" class="form-control" style="width:200px;"/><br/>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<label for="dateSortie"  class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Date de sortie:</label><input type="texte" id="dateSortie" class="form-control" style="width:200px;"/><br/>
			</div>
		</div>
		<div id="btnTraits" class="row">
		<p class="col-lg-offset-9 col-md-offset-9 col-sm-offset-9 col-xs-offset-9"><button type="reset" onclick="enregistrerSejour()" class="btnService" id="btnModify" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="btnAnnuler" onclick="annulerSejour()" class="btnService" style="display:none"/>
		</p>
		</div>
		</form>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;" id="divStyle"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	
	</div>
</div>