<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptReservChambre.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui-1/jquery-ui.css">
<div id="listeReservation">
	<div id="choixDate" class="row">
		<section id="rechercheMobile">
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Recherches optimales</h4> </div><br/>
				<form onSubmit="return false" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label>Numero chambre:</label>
							<input type="texte" name="idChambre" id="idChambre" class="form-group form-control input-md" style="width:200px;display:inline;"/>							
					<button type="submit" onclick="remplirListeReservation();recupTotal();" class="btnGest">Valider</button><br/><br/>
				</form>
		</section>		
	</div>
	<div style="margin:10px;margin-right:10px;">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Listes des réservations</h3>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">N°Sejour</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Nom patiente</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Date d'entrée</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Date de sortie</th>
					</tr>
				</thead>
			</table>
			<section id="tabListeReservEntreDate">
			</section>
			<div style="padding:10px;">
				<div class="nbTotal" align="left" style="font-size:16px;display:inline-block">
					<label for="idPorte" style='text-decoration:underline'>Porte N°</label><label> :</label><label id="idPorte" style="margin-left:10px;"></label>
				</div>	
				<div class="nbTotal" style="font-size:16px;display:inline-block;position:absolute;right:100px">
					<label for="totalReserv" style='text-decoration:underline'>Nombre total</label><label> :</label><label id="totalReserv" style="margin-left:10px;"></label>
				</div>
			</div>
				
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
</div>