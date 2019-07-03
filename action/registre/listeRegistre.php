<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptRegistre.js"></script>
<div id="listeRegistre">	
	<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;">
				<h4 style="display:inline;font-size:20px;font-weight:bold">Listes de tous les registres du service</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheRegistre" placeholder="Rechercher" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
	</div>
	<section id="tabRegistre">
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="success" style="font-size:15px;">
					<th class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="border-bottom: 1px solid rgb(180,180,180);">Renseignements de la patiente</th>
					<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="border-bottom: 1px solid rgb(180,180,180);">Sejour au service</th>						
					<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="border-bottom: 1px solid rgb(180,180,180);">Géstité</th>
					<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="border-bottom: 1px solid rgb(180,180,180);">Protocole</th>						
					<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="border-bottom: 1px solid rgb(180,180,180);">Information du bébé</th>
					<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="border-bottom: 1px solid rgb(180,180,180);">Examens cliniques</th>
				</tr>
			</thead>
			<tbody id="contenuRegistre">
			
			</tbody>
			<tbody id="contenuRechercheRegistre">
			
			</tbody>
	</table>
	</section>
	
</div>