<div>
		<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;padding-left:30px;"> <h4>Aperçu des paramètres du protocole d'un acccouchement</h4> </div>
		<div class="row" style="font-size:16px;padding:10px;">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="text-decoration:underligne">Accouchement du:</label></div>
			<div class="col-lg-offset-6 col-md-offset-6 col-sm-offset-6 col-xs-offset-6" style="padding-left:30px;"><label style="text-decoration:underligne;">Nom de la parturiente:</label></div>			
		</div>
		<form class="form-group" onSubmit="return false" id="ajoutPerso">
		<div class="row">
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6">Age gestationnel:</label><input type="text" id="heure_extraction" class="form-control" style="width:150px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6">Heure de rupture des poches:</label><input type="text" id="heure_rupture_poche" class="form-control" style="width:150px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Risques: </label>
					<div class="checkbox">
					<label><input type="checkbox" name="surdistension" id="surdistension"/>Surdistension</label><br>
					<label><input type="checkbox" name="cicatriciel" id="cicatriciel"/>Cicatriciel</label><br>
					<label class="col-lg-offset-6 col-md-offset-5 col-sm-offset-6"><input type="checkbox" name="rpm12" id="rpm12"/>RPM-12 heures</label><br>
					<label class="col-lg-offset-6 col-md-offset-5 col-sm-offset-6"><input type="checkbox" name="hta" id="hta"/>HTA</label><br>
					<label class="col-lg-offset-6 col-md-offset-5 col-sm-offset-6"><input type="checkbox" name="fievre" id="fievre"/>Fièvre</label><br>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Degagement:</label>
				<select name="degagement[]" id="degagement" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">OS</option>
								<option value="1">OP</option>
								<option value="2">Secto Pubien</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Instrument:</label>
				<select name="instrument[]" id="type" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">RIEN</option>
								<option value="1">Forceps detaries</option>
								<option value="2">Vacuum</option>
								<option value="3">Spatules</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-4 col-sm-6">Indice d'Apgar:</label>
					<div class="col-lg-offset-6 col-md-offset-4 col-sm-offset-6">
						<input type="texte" id="m1" placeholder="M1" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="m5" placeholder="M5" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="m10" placeholder="M10" class="form-control" style="width:60px;display:inline-block;"/>
					</div>										
				</div>
			</div>	
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-4 col-sm-6">Paramètre:</label>
					<div class="col-lg-offset-6 col-md-offset-4 col-sm-offset-6">
						<input type="texte" id="poids" placeholder="Poids" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="taille" placeholder="Taille" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="po" placeholder="PO" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="pt" placeholder="PT" class="form-control" style="width:60px;display:inline-block;"/>
						<input type="texte" id="pb" placeholder="PB" class="form-control" style="width:60px;display:inline-block;"/>
					</div>										
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Sexe:</label>
				<select name="sexe[]" id="sexe" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Masculin</option>
								<option value="1">Feminin</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6">Couleur de LA:</label>
				<select name="couleurLA[]" id="couleurLA" class="form-group form-control input-md" style="width:150px;display:inline;">
								<option value="0">Clair</option>
								<option value="1">Méconial</option>
								<option value="2">Purée de pois</option>
								<option value="3">Hémorragique</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Cordon:</label>
				<select name="cordon[]" id="cordon" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Echarpe</option>
								<option value="1">Circulaire</option>
								<option value="2">2 artères et 1 veine</option>
								<option value="3">Autres</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Aspiration des VAS:</label>
				<select name="aspirationVAS[]" id="aspirationVAS" class="form-group form-control input-md" style="width:175px;display:inline;padding:1px;">
								<option value="0">Non</option>
								<optgroup label="Oui">
									<option value="1">Sécrétions muqueuses</option>
									<option value="2">La méconial</option>
								</optgroup>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Réanimation:</label>
				<select name="reanimation[]" id="reanimation" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Oui</option>
								<option value="1">Non</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Oxygénation:</label>
				<select name="oxygenation[]" id="oxygenation" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Non</option>
								<optgroup label="Oui">
									<option value="1">Au masque</option>
									<option value="2">Lunette</option>
									<option value="3">Ventilation</option>
									<option value="4">Intubation</option>
								</optgroup>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-6 col-sm-6">Malformation externe visible:</label>
				<select name="malformationExt[]" id="malformationExt" class="form-group form-control input-md" style="width:150px;display:inline;">
								<option value="0">Oui</option>
								<optgroup label="Non">
									<option value="1">Lèvre</option>
									<option value="2">Abdomen</option>
									<option value="3">Pieds</option>
								</optgroup>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Anus:</label>
				<select name="anus[]" id="anus" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Perméable</option>
								<option value="1">Non perméable</option>
				</select>
				</div>
			</div>					
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Chouanes:</label>
				<select name="chouanes[]" id="chouanes" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Perméable</option>
								<option value="1">Non perméable</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Délivrance:</label>
				<select name="delivrance[]" id="delivrance" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Normale spontanee</option>
								<option value="1">Normale naturelle</option>
								<option value="2">Dirigée</option>
								<option value="3">Manuelle</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Heure de délivrance:</label><input type="text" id="heure_delivrance" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Placenta:</label>
				<select name="placenta[]" id="placenta" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Complet</option>
								<option value="1">Incomplet</option>
								<option value="2">Autres</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Périnée:</label>
				<select name="perinee[]" id="perinee" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Intact</option>
								<option value="1">Episinomie</option>
								<optgroup label="Déchirure périnée">
									<option value="2">1er</option>
									<option value="3">2ème</option>
									<option value="4">3ème</option>
								</optgroup>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Hémorragie:</label>
				<select name="hemorragie[]" id="hemorragie" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Absente</option>
								<option value="1">Normale</option>
								<option value="2">Abondante</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Globe utérin:</label>
				<select name="lavagePeri[]" id="lavagePeri" class="form-group form-control input-md" style="width:175px;display:inline;">
								<option value="0">Bien formé</option>
								<option value="1">Hypotonique</option>
				</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">TA après délivrance:</label><input type="text" id="operateur" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-5">Médicaments reçus par le nouveau-né:</label><textarea name="medicament" rows="4" cols="45" class="form-control" style="width:175px;display:inline;padding:2px;"></textarea>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Nom Nouveau né:</label><input type="text" id="nomBebe" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Prenom Nouveau né:</label><input type="text" id="prenomBebe" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">DR:</label><input type="text" id="dr" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">SF:</label><input type="text" id="sf" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
  				<div class="form-group">
				<label class="col-lg-6 col-md-5 col-sm-6">Elève:</label><input type="text" id="eleve" class="form-control" style="width:175px;display:inline-block;"/>
				</div>
			</div>
		</div>
		</form>
</div>