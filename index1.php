<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/service.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/typeahead.bundle.js"></script>

	</head>
	<body>
		<?php include("action/header.php") ?>
		<div class="container-fluid" id="fondAccueil">
		<div class="row" style="background: url('http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondAjout.jpg');opacity:0.8;">
			<section class="col-lg-8 col-md-8 col-sm-8 col-xs-8" >
				<div id="carousel" class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#carousel" data-slide-to="0" class="active"></li>
					<li data-target="#carousel" data-slide-to="1"></li>
					<li data-target="#carousel" data-slide-to="2"></li>
				</ol>
  					<div class="carousel-inner">
  						<div class="item active"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondAccueil.gif"></div> 
  						<div class="item"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/accueil1.jpg"></div>
  						<div class="item"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/accueil2.jpg"></div>   		     		  		
  					</div>
  				<div>
  				<a class="left carousel-control" href="#carousel" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				</div>
				<div>
					<a class="right carousel-control" href="#carousel" data-slide="next">
						<span class="icon-next"></span>
					</a>
				</div>
				</div>
		</section>
		<section class="col-lg-4 col-md-4 col-sm-4">
			<div class="col-lg-12">
				<h4 style="font-size:25px;color:#ecab1f;display:inline-block" >Service</h4>
        		<figure class="img-indent" class="col-lg-6 col-md-6 col-sm-6">
          			<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/service.gif" alt="" width="150" height="150"></figure>
          			          			<p class="p2" style="color:#EEE" class="col-lg-6 col-md-6 col-sm-6">Gerant dynamiquement les données permanentes du service.</p>
          			          			<a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/service.php" style="display:inline">Voir Plus >></a>
  			</div>
 			 <div class="col-lg-12">
 			 	<h4 style="font-size:25px;color:#ecab1f;">Patientes</h4>
       			 <figure class="img-indent"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/patients.jpg" alt="" width="150" height="150"></figure>
         			<p class="p2" style="color:#EEE">Gérant dynamiquement les données des patientes.</p>
         			 <a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/accueilPatient.php">Voir Plus >></a>
  			</div>
		</section>
		<section class="col-lg-12 col-md-12 col-sm-12">
  			<div class="col-lg-3 col-md-3 col-sm-3">
  				<h4 style="font-size:25px;color:#ecab1f;">Traitement</h4>
        		<figure class="img-indent"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/traitement.jpg" alt="" width="175" height="150"></figure>
          			<p class="p2" style="color:#EEE">Gerant dynamiquement les données temporaires du service.</p>
          			<a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/accueilTrait.php">Voir Plus >></a>
 	 		</div>
 	 		<div class="col-lg-3 col-md-3 col-sm-3">
 	 			<h4 style="font-size:25px;color:#ecab1f;">Registre</h4>
        		<figure class="img-indent"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/registre.jpeg" alt="" width="175" height="150"></figure>
          			<p class="p2" style="color:#EEE">Affichage de livre du registre du service.</p>
          			<a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/registre/accueilRegistre.php">Voir Plus >></a>
 	 		</div>
 	 		<div class="col-lg-3 col-md-3 col-sm-3">
 	 			<h4 style="font-size:25px;color:#ecab1f;">Visualisation</h4>
        		<figure class="img-indent"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/visualisation.jpg" alt="" width="175" height="150"></figure>
          			<p class="p2" style="color:#EEE">Edition des factures et consultation globale dans la base de donnnée.</p>
          			<a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/visualisation/accueilVue.php">Voir Plus >></a>
 	 		</div>
 	 		<div class="col-lg-3 col-md-3 col-sm-3">
 	 			<h4 style="font-size:25px;color:#ecab1f;">Bilan</h4>
        		<figure class="img-indent"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/bilan.jpg" alt="" width="175" height="150"></figure>
          			<p class="p2" style="color:#EEE">Affichage des différentes graphes et courbes résumant le contenu de la base de donnée.</p>
          			<a class="btn btn-success btn-md" href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/accueilBilan.php">Voir Plus >></a>
 	 		</div>
		</section>
		</div>
		</div>
		<section id="avant_pieds">
			<?php include("action/footer.php") ?>
	</body>
<html>