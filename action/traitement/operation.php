<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptOperation.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui-timepicker-addon.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.css">
<div id="formOperation">
	<div style="margin:10px;margin-right:10px;" id="listeOperation">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Opérations enregistrées</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheOperation" placeholder="Rechercher opération" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Patient</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Acte</th>						
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Opérateur</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date et heure</th>
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Update</th>
					</tr>
				</thead>
			</table>
			<section id="tabOperation">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheOperation">
				</tbody>
			</table>
			</section>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>

	</div>		
	<div style="margin:10px;margin-right:10px;">
		<br/>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Ajouter une nouvelle opération</h4> </div>
	<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div>
			<p>
		<label for="numOperation">Numero opération:</label><input type="texte" id="modifIdOperation" class="form-control" style="display:none" readonly/>
		<input type="texte" id="numOperation" class="ajout"/>
			</p><br/>
			<p>
		<label for="typeActe">Type acte:</label><input type="texte" id="modifActe" class="form-control" style="display:none" readonly/>
		<select name="typeActe[]" id="typeActe" class="ajout">								
		</select>
			</p><br/>
			<p>
		<label for="idRegistre">Patiente:</label><input type="texte" id="modifRegistre" class="form-control" style="display:none" readonly/>
		<select name="idRegistre[]" id="idRegistre" class="ajout">								
		</select>
			</p><br/>
			<p>
		<label for="operateur">Opérateur:</label>
		<select name="operateur[]" id="operateur" class="ajout">								
		</select>
			</p><br/>
			<p>
		<label for="dateOperation">Date opération:</label><input type="texte" id="dateOperation" class="ajout"/>
			</p><br/>
		</div>
		<div id="btnTraits">
		<p><button type="reset" value="submit" class="btnService" id="btnAjouter" onclick="ajoutOperation()">Ajouter</button>
		<button type="reset" value="submit" class="btnService" id="btnModify" onclick="enregistrerOperation()" style="display:none">Enregistrer</button>		
		<input type="reset" value="Annuler" id="annuler" onclick="annulerOperation()" class="btnService"/>
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
<script type="text/javascript">
  $( "#dateOperation").datetimepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth:true,
          changeYear:true,
          });
</script>