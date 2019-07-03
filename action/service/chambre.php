<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptChambre.js"></script>
<div id="formChambre">
	<div style="margin:10px;margin-right:10px;" id="listeChambre">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Liste des chambres</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="rechercheChambre" class="sr-only">Recherche</label>
					<input type="search" id="rechercheChambre" placeholder="Rechercher chambre" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Numero</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Catégorie</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Place disponible</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Place occupée</th>
						<th colspan='2' class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Update/Delete</th>
					</tr>
				</thead>
			</table>
			<section id="tabChambre">
				</tbody>
			</table>
			</section>
			<section id="tabRechercheChambre">
				</tbody>
			</table>
			</section>
			<div class="nbTotal" align="right" style="font-size:15px">
				<label for="totalChambre" style='text-decoration:underline'>Nombre total</label><label> :</label><label id="totalChambre" style="margin-left:10px;"></label>
			</div>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	</div>		
	<div style="margin:10px;margin-right:10px;">
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Compléter les informations pour une nouvelle chambre</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
			<p>
		<label for="numcategorie">Catégorie:</label>
		<select name="numCategorie[]" id="numCategorie" class="ajout">								

		</select>
			</p><br/>
				<p>
		<label for="numChambre">Numero porte:</label><input type="texte" id="numChambre" class="ajout"/>
			</p><br/>
			</div>			
		</div>
		<div id="btnService">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutChambre()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerChambre()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerChambre()" class="btnService"/>
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