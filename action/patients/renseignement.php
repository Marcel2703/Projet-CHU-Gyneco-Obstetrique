<div id="formExamen" class="row">
	<div style="margin:10px;margin-right:10px;" id="listePatiente">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une patiente</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="recherchePatienteRenseign" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">N° Registre</th>
						<th class="col-lg-4 col-md-6 col-sm-6 col-xs-6">Nom</th>						
						<th class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align:center">Action</th>
					</tr>
				</thead>
			</table>
			<section id="tableRegistre" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheRenseignement" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
	</div>		
	<div style="margin:10px;margin-right:10px;">
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Ajouter les renseignements de la patiente choisie</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underline">Nom de la patiente:</label><span> </span><span id="nomPatiente"></span></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
			<div class="row">		
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="nom">Nom:</label><input type="text" id="nom" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="prenom" >Prenom:</label><input type="text" id="prenom" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="naissance">Date de naissance:</label><input type="text" id="naissance" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="lieu" >Lieu de naissance:</label><input type="text" id="lieu" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="pere" >Nom père:</label><input type="text" id="pere" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="mere">Nom mère:</label><input type="text" id="mere" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="domicile" >Domicile:</label><input type="text" id="domicile" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="croyance" >Croyance:</label><input type="text" id="croyance" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>		
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="profession">Profession:</label><input type="text" id="profession" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="situation">Situation matrimoniale:</label><input type="text" id="situation" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="contact">Contact:</label><input type="text" id="contact" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="idRegistre">Numero registre:</label><input type="text" id="idRegistre" class="form-control" style="width:200px;display:inline-block;"/>
					</div>
				</div>
				<div id="btnTraits" class="col-lg-5 col-md-5 col-sm-5" style="margin-left:10px;">
					<button type="reset" class="btnService" id="btnAjout" onclick="ajoutRenseignement()" style="display:none">Ajouter</button>
					<button type="reset" class="btnService" id="btnModify" onclick="modifyRenseignement()" style="display:none">Enregistrer</button>		
					<button type="reset" value="submit" id="btnAnnuler" onclick="annuler()" class="btnService" style="display:none">Annuler</button>
				</div>
			</div><br/>
			<div class="row">

           <div class="col-lg-12">

            <div class="alert alert-success" role="alert" id="successDiv" style="display:none">
              
            </div>
             
           </div>

         </div>		
		</form>
		
	</div>	
</div>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptRenseignement.js"></script>
<script type="text/javascript">
  $( "#naissance").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth:true,
          changeYear:true,
          });
</script>