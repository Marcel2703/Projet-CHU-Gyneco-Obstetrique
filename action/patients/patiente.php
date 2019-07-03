<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptPatiente.js"></script>
<div id="formPatiente">
	<div style="margin:10px;margin-right:10px;" id="listePatiente">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Liste des patientes</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="recherchePatiente" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">N° registre</th>
						<th class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Nom</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Gestité</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Parité</th>
						<th colspan='2' class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Update/Delete</th>
					</tr>
				</thead>
			</table>
			<section id="tablePatiente">
				</tbody>
			</table>
			</section>
			<section id="tableRecherchePatiente">
				</tbody>
			</table>
			</section>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	</div>
		
	<div style="margin:10px;margin-right:10px;margin-top:0px;">
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Ajouter une nouvelle patiente</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
			<p>
		<label for="idRegistre">Numero de registre:</label><input type="texte" id="idRegistre" class="ajout"/><br/><br/>
			</p>
			<p>
				<p>
		<label for="nomPatiente">Nom de la patiente:</label><input type="texte" id="nomPatiente" class="ajout"/><br/><br/>
			</p>
			<p>
		<label for="gestite">Gestité:</label><input type="texte" id="gestite" class="ajout"/><br/><br/>
			</p>
			<p>
		<label for="parite">Parité:</label><input type="texte" id="parite" class="ajout"/><br/><br/>
			</p>
			<br/>
			<p>
			</div>			
		</div>
		<div id="btnPatients">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutPatiente()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerPatiente()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerPatiente()" class="btnService"/>
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