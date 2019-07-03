<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.css">
<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptPatienteEntreDate.js"></script>
<div id="listePatienteEntreDate">
	<div id="choixDate" class="row">
		<section id="rechercheMobile">
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Recherches optimales</h4> </div><br/>
				<form onSubmit="return false" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label style="margin-right:20px;">Période:</label>
							<input type="texte" placeholder="saisir date initiale" id="dateInitialPat" class="form-group form-control input-md" style="width:200px;display:inline;"/>
							<label style="margin-right:5px;margin-left:5px;">-</label>
							<input type="texte" placeholder="saisir date finale" id="dateFinalPat" class="form-group form-control input-md" style="width:200px;display:inline;margin-right:20px;"/>								
					<button type="reset" onclick="remplirListePatiente();recupTotalPatiente()" class="btnGest">Valider</button><br/><br/>
				</form>
		</section>		
	</div>
	<div style="margin:10px;margin-right:10px;">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Listes des patientes</h3>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">N° Registre</th>
						<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Nom patiente</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Motif</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Date</th>
					</tr>
				</thead>
			</table>
			<section id="tabListePatiente">
			</tbody>
			</section>
			<div class="nbTotal" align="right" style="font-size:16px">
				<label for="totalPatiente" style='text-decoration:underline'>Nombre total</label><label> :</label><label id="totalPatiente" style="margin-left:10px;"></label>
			</div>	
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
</div>