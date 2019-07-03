<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptBebe.js"></script>
<div id="formBebe">
	<div style="margin:10px;margin-right:10px;">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> <h3 style="display:inline;">Liste des bébés</h3>
				<form onSubmit="return false" style="display:inline;position:absolute;right:50px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheBebe" placeholder="Taper N° Bébé" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success">
						<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">N°bébé</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Nom bébé</th>
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date naissance</th>
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Mère</th>						
						<th class="col-lg-1 col-md-2 col-sm-2 col-xs-2">Sexe</th>
						<th class="col-lg-1 col-md-1 col-sm-1 col-xs-1">Etat</th>
					</tr>
				</thead>
			</table>
			<section id="tableBebe">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheBebe" style="display:none">
				</tbody>
			</table>
			</section>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
	</div>
	
</div>