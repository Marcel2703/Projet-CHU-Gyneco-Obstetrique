<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptLit.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
<div id="formLit">
	<div style="margin:10px;margin-right:10px;">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Liste des lits</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheLit" placeholder="Rechercher place" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Numero</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Chambre</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Occupation</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style="text-align:center">Delete</th>
					</tr>
				</thead>
			</table>
			<section id="tabLit">

				</tbody>
			</table>
			</section>
			<section id="tabRechercheLit">
				</tbody>
			</table>
			</section>
			<div class="nbTotal" align="right" style="font-size:15px">
				<label for="totalLit" style='text-decoration:underline'>Nombre total</label><label> :</label><label id="totalLit" style="margin-left:10px;"></label>
			</div>			
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
		
	<div style="margin:10px;margin-right:10px;">
		<br/>
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Saisir les données du lit</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
			<p>
		<label for="idChambre">Numero chambre:</label><input type="texte" id="idChambre" class="ajout" required/>
			</p><br/>
			<p>
		<label for="idLit">Numero lit:</label>
		<select name="idLit[]" id="idLit" class="ajout">								

		</select>
			</p><br/>
			</div>			
		</div>
		<div id="btnService">
		<p><button type="reset" value="submit" onclick="ajoutLit()" class="btnService">Ajouter</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="mamafaSelect()" class="btnService"/>
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