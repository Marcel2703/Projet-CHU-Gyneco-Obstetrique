<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/service.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/typeahead.bundle.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptService.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptGestion.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
	</head>
	<body id="bodyService">
		<?php include("../header.php");?>
<div class="container-fluid" id="static_service">
		<div id="sous_menus" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<nav id="menu_service" class="listeMenu">
				<div class="panel-heading" style="background:rgb(70,0,0);color:#EEE;text-align:center;height:40px;padding:2px;"><h4>MENU SERVICE</h4></div>
				<div class="panel-body" style="background-image: url('http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondMenu3.jpg');">
				<ul class="nav nav-tabs">			
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/personnel.php">Personnel</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/categorie.php #formCateg">Catégories</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/chambre.php #formCateg">Chambres</a></li>
					<li class="col-lg-12 col-md-1 col-sm-1 col-xs-1"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/lit.php #formLit">Lit</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/acte.php #formActe">Acte</a></li>
					<li class="col-lg-12 col-md-3 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestionChambre.php">Gestion des chambres</a></li>				
				</ul>
				</div>
			</nav>
		</div>
		<div id="bloc_service" class="col-lg-9 col-md-12 col-sm-12 col-xs-12" >
			<div style="height:500px;margin-top:20px;" id="contenu1">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/service1.jpeg" class="img" id="img0">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/service2.jpg" class="img" id="img1">
				<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/service3.jpg" class="img" id="img2">
			</div>
		</div>
</div>
			<?php include("../footer.php") ?>
	</body>
<html>