<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.form.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptExamApres.js"></script>
<div id="formExamen" class="row">
	<div style="margin:10px;margin-right:10px;" id="liste">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une patiente dont les examens seront lui effectués</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheRegistreExam" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
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
			<section id="tabRegistre" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tabRechercheRegistre" style="background: rgb(228,228,228);display:none;">
				</tbody>
			</table>
			</section>
	</div>		
	<div style="margin:10px;margin-right:10px;">
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Ajouter les examens en cours de séjour de la patiente séléctionnée</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underline">Nom de la patiente:</label><span> </span><span id="nomPatiente"></span></div>			
		</div>
		<div class="form-group" onSubmit="return false" id="ajoutPerso">
			<div class="row">
			<form>
				<div class="col-lg-5 col-md-5 col-sm-5">
  					<div class="form-group">
					<input type="text" id="elementApres" placeholder="Saisir libellé de l'examen" class="form-control" style="width:250px;height:40px;display:inline-block;padding:4px;"/>				
					<label style="font-size:18px;">:</label>
					</div>
				</div>		
				<div class="col-lg-4 col-md-3 col-sm-3">
  					<div class="form-group"> 					
  					<input type="texte" id="valeurApres" placeholder="Saisir la valeur correspondante" class="form-control" style="width:300px;height:40px;display:inline;margin-left:-70px;"/>
  					<input type="text" id="lienImage" class="form-control" style="width:300px;height:30px;display:none">
					</div>
				</div>
				<div id="btnTraits" class="col-lg-3 col-md-3 col-sm-3">
				<button type="reset" name="suivant" class="btnService" onclick="ajoutExamen()" style="width:90px;height:40px;display:none" id="suivant">Suivant</button>		
				<button type="reset" value="submit" name="finish" class="btnService" onclick="terminerExamen()" style="width:90px;height:40px;display:none" id="terminer">Terminer</button>
				</div>
			</form>
			<div class="col-lg-offset-4 col-lg-7 col-md-offset-4 col-md-7 col-sm-offset-4 col-sm-7 col-xs-offset-4 col-xs-7">
					<form id="my_form" method="post" action="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examenApres/uploadImage.php" enctype="multipart/form-data">
    					<input type="file" name="img" accept="image/*" style="width:300px;border: 1px solid rgb(100,100,100);border-radius: 4px;padding:2px;display:inline;font-size:15px;margin-left:4px">
    					<button type="submit" id="btnDownload" style="display:inline;margin-left:55px;display:none" class="btnService">Télécharger</button>
					</form>
					<div id="progressBox">
						<div id="progress"></div>
						<div id="statustxt">0%</div>
					</div>
					<div id="info" style="margin-left: 5px;display: none">En attente de téléchargement...</div>
    				<div class="image" style="margin-left: 5px;"></div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
  					<div class="form-group">
						<input type="text" id="idRegistre" placeholder="N°Registre" class="form-control" style="width:150px;height:40px;display:none;padding:4px;"/>
					</div>
				</div>
				<div id="tableAfenina" class="row" style="display:none;margin:15px;">
					<table  class="table table-bordered table-hover" style="color:black;">
						<thead>
						<tr class="success">
							<th class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Elements</th>
							<th class="col-lg-5 col-md-5 col-sm-5 col-xs-5">Valeur</th>
							<th class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Illustration</th>						
						</tr>
						</thead>
					</table>
					<section id="tabListeExam" style="background: rgb(228,228,228);">
						</tbody>
					</table>
					</section>
				</div>
				
			</div>			
		</div>
		
	</div>	
</div>