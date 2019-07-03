<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptProtocole.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptProtoCesarienne.js"></script>
<script type="text/javascript">
 $( "#date_extraction1").datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth:true,
          changeYear:true,
          });
  $( "#heure_extraction1").timepicker({

          });
</script> 
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;padding-left:30px;"> <h4>Veuillez effectuer les choix parmi les données du protocole de césarienne</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underligne">Césarienne du:</label><span> </span><span id="dateActeC"></span></div>
			<div class="col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6" style="padding-left:30px;"><label style="text-decoration:underligne;">Nom de la parturiente:</label><span> </span><span id="nomPatienteC"></span></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
	
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="dateExtraction1" name="Date d'extraction">Date d'extraction:</label><input type="text" id="date_extraction1" class="form-control" style="width:200px;display:inline-block;"/>
				</div>
			</div>			
			<div class="col-lg-6 col-md-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="heureExtraction1" name="Heure d'extraction">Heure d'extraction:</label><input type="text" id="heure_extraction1" class="form-control" style="width:200px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="nomBebe1" name="Nom du bébé">Nom Nouveau né:</label><input type="text" id="nom_bebe1" class="form-control" style="width:200px;display:inline-block;padding:3px;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6" id="prenomBebe1" name="Prenom du bébé">Prenom Nouveau né:</label><input type="text" id="prenom_bebe1" class="form-control" style="width:200px;display:inline-block;padding:3px;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="sexe1" name="Sexe">Sexe:</label>
				<select name="sexe[]" id="_sexe1" class="form-group form-control input-md" style="width:200px;display:inline;">
								<option value="Masculin">Masculin</option>
								<option value="Feminin">Feminin</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="etat1" name="Etat">Sexe:</label>
				<select name="etat1[]" id="_etat1" class="form-group form-control input-md" style="width:200px;display:inline;">
								<option value="Vivant">Vivant</option>
								<option value="Mort">Mort</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="idBebeC">Enfant:</label>
				<select class="form-group form-control input-md" id="idBebe1" style="width:200px;display:inline;">
				</select>
				</div>
			</div>
			<div id="btnTraits" class="col-lg-5 col-md-5 col-sm-5" style="margin-left:10px;">
				<button type="reset" class="btnService" onclick="ajoutProtocolePrincipaleC()" id="btnAjoutC">Ajouter</button>		
				<button type="reset" value="submit" class="btnService">Annuler</button>
			</div>
		</div>
		<h3>Autres protocoles:</h3>
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5">
  				<div class="form-group">
				<input type="text" id="element1" placeholder="Saisir autres éléments du protocole" class="form-control" style="width:250px;height:40px;display:inline-block;padding:4px;"/>				
				<label style="font-size:18px;">:</label>
				</div>
			</div>		
			<div class="col-lg-4 col-md-3 col-sm-3">
  				<div class="form-group"> 					
  					<input type="texte" id="valeur1" placeholder="Saisir la valeur correspondante" class="form-control" style="width:300px;height:40px;display:inline;margin-left:-70px;"/>
				</div>
			</div>
			<div id="btnTraits" class="col-lg-3 col-md-3 col-sm-3">
				<button value="submit" name="suivant" class="btnService" onclick="ajoutAutresProtocoleC()" style="width:90px;height:40px;" id="suivantC">Suivant</button>		
				<button type="reset" value="submit" name="finish" class="btnService" onclick="terminerProtocoleC()" style="width:90px;height:40px;">Terminer</button>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
  				<div class="form-group">
				<input type="text" id="idOperationC" placeholder="N°operation" class="form-control" style="width:150px;height:40px;display:none;padding:4px;"/>
				</div>
			</div>
			<table  class="table table-bordered table-hover" style="color:black">
				<thead>
					<tr class="success">
						<th class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>N°Bebe</th>
						<th class="col-lg-3 col-md-5 col-sm-5 col-xs-5">Elements</th>
						<th class="col-lg-4 col-md-5 col-sm-5 col-xs-5">Valeur</th>						
						<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Supprimer</th>					
					</tr>
				</thead>
			</table>
			<section id="tabAutresProtoC" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
		</div>
		</form>