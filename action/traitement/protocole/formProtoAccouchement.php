<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui-timepicker-addon.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui.css">
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptProtocole.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptProtoAccouchement.js"></script>
<script type="text/javascript">
  $( "#date_delivranceA").datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth:true,
          changeYear:true
          });
  $( "#heure_delivranceA").timepicker({

          });
</script>

		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;padding-left:30px;"> <h4>Veuillez effectuer les choix parmi les données du protocole d'accouchement</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underligne">Accouchement du:</label><span> </span><span id="dateActeA"></span></div>
			<div class="col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6" style="padding-left:30px;"><label style="text-decoration:underligne;">Nom de la parturiente:</label><span> </span><span id="nomPatienteA"></span></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
	
		<div class="row">			
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="dateDelivrance" name="Date de délivrance">Date de délivrance:</label><input type="text" id="date_delivranceA" class="form-control" style="width:200px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="heureDelivrance" name="Heure de délivrance">Heure de délivrance:</label><input type="text" id="heure_delivranceA" class="form-control" style="width:200px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="nomBebeA" name="Nom du bébé">Nom Nouveau né:</label><input type="text" id="nom_bebeA" class="form-control" style="width:200px;display:inline-block;padding:3px;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6" id="prenomBebeA" name="Prenom du bébé">Prenom Nouveau né:</label><input type="text" id="prenom_bebeA" class="form-control" style="width:200px;display:inline-block;padding:3px;"/>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="sexeA" name="Sexe">Sexe:</label>
				<select name="sexe[]" id="_sexeA" class="form-group form-control input-md" style="width:200px;display:inline;">
								<option value="Masculin">Masculin</option>
								<option value="Feminin">Feminin</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6" id="etatA" name="Etat">Etat:</label>
				<select name="etat[]" id="_etatA" class="form-group form-control input-md" style="width:200px;display:inline;">
								<option value="Vivant">Vivant</option>
								<option value="Mort">Mort</option>
				</select>
				</div>
			</div>			
			<div class="col-lg-6 col-lg-6 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-lg-6 col-sm-6">Numéro enfant:</label>
				<select class="form-group form-control input-md" id="idBebeA" style="width:200px;display:inline;">
				</select>
				</div>
			</div>
			<div id="btnTraits" class="col-lg-5 col-md-5 col-sm-5" style="margin-left:10px;">
				<button value="reset" class="btnService" onclick="ajoutProtocolePrincipaleA()" id="btnAjoutA">Ajouter</button>		
				<button type="reset" value="submit" class="btnService">Annuler</button>
			</div>
		</div>
		<h3>Autres protocoles:</h3>
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5">
  				<div class="form-group">
				<input type="text" id="element" placeholder="Saisir autres éléments du protocole" class="form-control" style="width:250px;height:40px;display:inline-block;padding:4px;"/>				
				<label style="font-size:18px;">:</label>
				</div>
			</div>		
			<div class="col-lg-4 col-md-3 col-sm-3">
  				<div class="form-group"> 					
  					<input type="texte" id="valeur" placeholder="Saisir la valeur correspondante" class="form-control" style="width:300px;height:40px;display:inline;margin-left:-70px;"/>
				</div>
			</div>
			<div id="btnTraits" class="col-lg-3 col-md-3 col-sm-3">
				<button value="reset" name="suivant" class="btnService" onclick="ajoutAutresProtocoleA()" style="width:90px;height:40px;" id="suivantA">Suivant</button>		
				<button type="reset" value="submit" name="finish" class="btnService" onclick="terminerProtocoleA()" style="width:90px;height:40px;">Terminer</button>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
  				<div class="form-group">
				<input type="text" id="idOperationA" placeholder="N°operation" class="form-control" style="width:150px;height:40px;display:none;padding:4px;"/>
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
			<section id="tabAutresProtoA" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
		</div>
		</form>