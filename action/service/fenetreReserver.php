<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptGestion.js"></script>
<form id="modalReserver" onSubmit="return false" role="form" class="well">
	<button type="button" class="close" data-dismiss="modal">x</button> 	
	<fieldset> 
	<legend><h3>Veuillez effectuer la réservation</h3></legend>
	<div class="form-group">
		<label for="numChambre">Numéro Chambre:</label><br/>
		<input type="texte" id="numChambre" class="form-control" readonly/>
	</div>
	<div class="form-group">	
	<label for="numLit">Numéro lit:</label><br/>
	<input type="text" name="modifType" id="numLit" class="form-control"/>
	</div>
	<div class="form-group">	
	<label for="nomPatiente">Nom patiente:</label><br/>
	<input type="text" id="nomPatiente" class="form-control"/>
	</div>
	<div align="center">
	<input type="reset" value="Retour" class="btn btn-success" data-dismiss="modal"/>
	<input type="reset" class="btn btn-success" data-dismiss="modal"/>
	</div><br/>
	<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal">Fermer</button>
	</div>
		</fieldset>
	</form>