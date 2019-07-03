<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptPersonnel.js"></script>
<div id="formPerso">
	<div style="margin:10px;margin-right:10px;" id="listePerso">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Liste des personnels</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="recherchePerso" placeholder="Rechercher personnel" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Numero</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Nom</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Poste</th>
						<th colspan='2' class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Update/Delete</th>
					</tr>
				</thead>
			</table>
			<section id="tableau1">
				</tbody>
			</table>
			</section>
			<section id="tableRecherchePerso">
				</tbody>
			</table>
			</section>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	</div>
		
	<div style="margin:10px;margin-right:10px;">
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Saisir les informations du nouveau personnel</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
				<p style="display:none">
		<label for="numPerso">Numero du personnel:</label><input type="texte" id="numPerso" class="ajout label-control" />
			</p>
			<p>
		<label for="nomPerso">Nom:</label><input type="texte" id="nomPerso" class="ajout label-control"/>
			</p><br/>
			<p>
		<label for="poste">Assignation poste:</label>
		<select name="poste[]" id="poste" class="ajout form-group form-control input-md" style="width:300px;display:inline;">								
								<option value="Docteur">Docteur</option>
								<option value="Sagefemme">Sagefemme</option>
								<option value="Infirmier">Infirmier</option>
								<option value="Assistant">Assistant</option>
			</select>
			</p>
			</div>			
		</div>
		<div id="btnService">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutPerso()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerPerso()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerPerso()" class="btnService"/>
		</p><br/>
		</div>
		<div class="row">

           <div class="col-lg-12">

            <div class="alert alert-success" role="alert" id="successDiv" style="display:none">
              
            </div>
             
           </div>

         </div>
	</form>
	</div>
</div>