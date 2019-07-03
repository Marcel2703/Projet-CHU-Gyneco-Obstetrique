<div>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;padding-left:30px"> <h4>Aperçu des paramètres du protocole d'une Césarienne</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underligne">Césarienne du:</label></div>
			<div class="col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6" style="padding-left:30px;"><label style="text-decoration:underligne;text-align:right">Nom de la parturiente:</label></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">INDICATION: </label>
					<div class="checkbox">
					<label><input type="checkbox" name="pure" id="pure"/>PURE</label>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Type:</label>
				<select name="type[]" id="type" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Urgence</option>
								<option value="1">Programmée</option>
								<option value="2">Provenance</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Anesthésie:</label>
				<select name="type[]" id="type" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">ALR</option>
								<option value="1">AG</option>
			</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Incision:</label>
				<select name="anesthesie[]" id="anesthesie" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">STARK</option>
								<option value="1">PLANNENSTIEL</option>
								<option value="2">LMSO</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Excision de l'ancienne:</label>
				<select name="excision[]" id="excision" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">TRANVERSE</option>
								<option value="1">LMSO</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">A l'ouverture:</label>
				<select name="ouverture[]" id="ouverture" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Epanchement</option>

			</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">SEGMENT INFERIEUR AMPLIE:</label>
				<select name="segmentInf[]" id="segmentInf" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Oui</option>
								<option value="1">Non</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Hystérotomie:</label>
				<select name="hysterotomie[]" id="hysterotomie" class="form-group form-control input-md" style="width:175px;display:inline;padding:0px;font-size:13px;">
								<option value="0">Segmentaire transversale</option>
								<option value="1">Suprasegmentaire</option>
								<option value="2">Corporeale verticale</option>
								<option value="4">Segmentocorporeale</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Extraction:</label>
				<select name="extraction[]" id="extraction" class="form-group form-control input-md" style="width:175px;display:inline;padding:1px;">
								<option value="0">Enucleation cephalique</option>
								<option value="1">Traction Podalique</option>
								<option value="2">Inguinale</option>
								<option value="4">VMI</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Heure d'extraction:</label><input type="text" id="heure_extraction" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Bébé:</label>
					<select name="bebe[]" id="bebe" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Masculin</option>
								<option value="1">Féminin</option>
					</select>
					<div class="col-lg-offset-6 col-md-offset-5 col-sm-offset-6">
						<input type="texte" id="apgar" placeholder="Apgar" class="form-control" style="width:85px;display:inline-block;"/>
						<input type="texte" id="poids" placeholder="Poids" class="form-control" style="width:85px;display:inline-block;"/>
					</div>										
				</div>
			</div>			
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Liquide amniotique:</label>
				<select name="liquideA[]" id="liquideA" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Clair</option>
								<option value="1">Méconial</option>
								<option value="2">Hémorragique</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Délivrance:</label>
				<select name="delivrance[]" id="delivrance" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Assistée</option>
								<option value="1">Manuelle</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Hystérroraphie:</label>
				<select name="hysterroraphie[]" id="hysterroraphie" class="form-group form-control input-md" style="width:175px;display:inline;padding:6px;">
								<option value="0">Surjet</option>
								<option value="1">Points séparés simple</option>
								<option value="2">Points séparés en X</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Péritonisation:</label>
				<select name="peritonisation[]" id="peritonisation" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">OUI</option>
								<option value="1">NON</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Contrôle de l'hémostase:</label>
				<select name="controleHemo[]" id="controleHemo" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Facile</option>
								<option value="1">Difficile</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Lavage péritoniale:</label>
				<select name="lavagePeri[]" id="lavagePeri" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">OUI</option>
								<option value="1">NON</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Fermeture pariétale:</label>
				<select name="fermeturePari[]" id="fermeturePari" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">OUI</option>
								<option value="1">NON</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6">Rapprochement musculaire:</label>
				<select name="rapprocheMuscu[]" id="rapprocheMuscu" class="form-group form-control input-md" style="width:150px;display:inline;">
								<option value="0">OUI</option>
								<option value="1">NON</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Fermeture de la peau:</label>
				<select name="fermeturePeau[]" id="fermeturePeau" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Surjet intradermique</option>
								<option value="1">BLAIR DONATI</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-4 col-sm-5">Autres gestes ou remarques:</label><textarea name="message" rows="4" cols="45" class="form-control" style="width:200px;display:inline;padding:2px;"></textarea>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Opérateur:</label><input type="text" id="operateur" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Aide:</label><input type="text" id="aide" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Sage Femme:</label><input type="text" id="sageFemme" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Anesthésiste:</label><input type="text" id="anesthesiste" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Infirmier:</label><input type="text" id="infirmier" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Autres:</label><input type="text" id="autres" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
		</div>
		</form>
	</div>