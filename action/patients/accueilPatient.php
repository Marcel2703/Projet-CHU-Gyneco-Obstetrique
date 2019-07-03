<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/patient.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptPatients.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
	</head>
	<body id="bodyService">
		<?php include("../header.php");?>
<div class="container-fluid" id="static_patients">
		<div id="sous_menus" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<nav id="menu_patients" class="listeMenu">
				<div class="panel-heading" style="background:rgb(70,0,0);color:#EEE;text-align:center;height:40px;padding:2px;"><h4>MENU PATIENTS</h4></div>
				<div class="panel-body" style="background-image: url('http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondMenu3.jpg');">
				<ul class="nav nav-tabs">			
					<li class="col-lg-12 col-md-2 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/patiente.php">Patiente</a></li>
					<li class="col-lg-12 col-md-2 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/renseignement.php">Details patiente</a></li>
					<li class="col-lg-12 col-md-3 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examenClinique.php">Examen clinique avant admission</a></li>
					<li class="col-lg-12 col-md-3 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/examenCliniqueApres.php">Examen clinique après admission</a></li>
					<li class="col-lg-12 col-md-2 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/bebe.php">Bébé</a></li>			
				</ul>
				</div>
			</nav>
		</div>
		<div id="bloc_patients" class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			<div style="height:500px;" id="contenu1">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/patients1.jpg" class="img" id="img0">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/patients2.jpg" class="img" id="img1">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/patients3.jpg" class="img" id="img2">
			</div>
		</div>
</div>
			<?php include("../footer.php") ?>
	</body>
<html>