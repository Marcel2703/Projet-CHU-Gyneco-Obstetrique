<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptCategorie.js"></script>
<div id="formCateg">
	<div style="margin:10px;margin-right:10px;" id="listeCategorie">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Catégories des chambres</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheCateg" placeholder="Rechercher catégorie" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Code</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Occupation</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Prix journalier(Ar)</th>
						<th colspan='2' class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style='texte-align:center'>Update/Delete</th>
					</tr>
				</thead>
			</table>
			<section id="tabCateg">
				</tbody>
			</table>
			</section>
			<section id="tabRechercheCateg">
				</tbody>
			</table>
			</section>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	
	</div>
		
	<div style="margin:10px;margin-right:10px;">
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Pour un nouveau catégorie de chambre</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
				<p>
		<label for="codeCategorie">Code catégorie:</label><input type="texte" id="codeCategorie" class="ajout"/>
			</p><br/>
			<p>
		<label for="nbOccupation">Occupation totale:</label><input type="texte" id="nbOccupation" class="ajout"/>
			</p><br/>
			<p>
		<label for="prix">Prix journalier:</label><input type="texte" id="prix" class="ajout"/>
			</p>
			</div>			
		</div>
		<div id="btnService">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutCateg()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerCategorie()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerCategorie()" class="btnService"/>
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