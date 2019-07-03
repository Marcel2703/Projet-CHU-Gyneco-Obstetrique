<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptActe.js"></script>
<div id="formActe">
	<div style="margin:10px;margin-right:10px;" id="listeActe">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Listes des actes du service</h3>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Numero</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Designation</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Mention(Ar)</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3" style='text-align:center'>Update</th>
					</tr>
				</thead>
			</table>
			<section id="tabActe">
				</tbody>
			</table>
			</section>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
		
	<div style="margin:10px;margin-right:10px;">
		<br/>
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Saisir les informations de l'acte</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<div id="traitPrim">
				<p>
		<label for="numActe">Numéro acte:</label><input type="texte" id="numActe" class="ajout"/>
			</p><br/>
			<p>
		<label for="designation">Designation:</label><input type="texte" id="designation" class="ajout"/>
			</p><br/>
			<p>
		<label for="mention">Mention:</label><input type="texte" id="mention" class="ajout"/>
			</p>
			</div>			
		</div>
		<div id="btnService">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutActe()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerActe()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerActe()" class="btnService"/>
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