<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/visualisation.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptBilan.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
	</head>
	<body id="bodyService">
		<?php include("../../header.php");?>
<div class="container-fluid" id="static_vue">
		<div id="sous_menus" class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			<nav id="menu_vue" class="listeMenu">
				<div class="panel-heading" style="background:rgb(70,0,0);color:#EEE;text-align:center;height:40px;padding:2px;"><h4>MENU VISUALISATION</h4></div>
				<div class="panel-body" style="background-image: url('http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondMenu3.jpg');">
				<ul class="nav nav-tabs">			
					<li class="col-lg-12 col-md-3 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/diagramme patiente/containDiagPatiente.php #formCourbe">Diagramme des patientes</a></li>
					<li class="col-lg-12 col-md-3 col-sm-3 col-xs-3"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/diagramme naissance/containDiagNaissance.php #formCourbe">Diagramme des naissances</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/courbe/containCourbe.php #formCourbe1">Courbe des activités</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/courbe naissance/containCourbeNaissance.php #formCourbe1">Courbe des naissances</a></li>
					<li class="col-lg-12 col-md-2 col-sm-2 col-xs-2"><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/repartition/containRepartition.php #formCourbe">Pourcentage des activités</a></li>		
				</ul>
				</div>
			</nav>
		</div>
		<div id="bloc_vue" class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
		<div id="formCourbe">
			<div style="margin:10px;margin-right:10px;">
				<div id="choixDate" class="row">
					<section id="rechercheMobile">
						<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Recherches optimales</h4> </div><br/>
						<form method="POST" action="http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/bilan/ordonneePatiente.php" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label>Année:</label>
							<input type="texte" name="annee" id="annee" class="form-group form-control input-md" style="width:200px;display:inline;"/>						
							<button type="submit" class="btnGest">Afficher</button><br/><br/>
						</form>
					</section>		
				</div>
				<div class="row" style="background: url('http://localhost/Projet CHU-Gyneco-Obstetrique/image/fondAjout.jpg');margin:10px;" id="histo">		
					<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:50px;padding-top:5px;"> <h4>Histogramme des patientes</h4> </div><br/>
      				<div class="col-lg-12 col-md-12 col-sm-12">
         				<img src="diagPatiente.php" alt="histogramme" style="margin:10px;margin-top:0px;margin-bottom:20px;">
     	 			</div>
     	 			<a href="pdfDiagrammePatiente.php"  target="_blank"><button type="submit" class="btnService" style="width:90px;height:40px;float:right;margin-right:15px;margin-bottom:15px;">Imprimer</button></a>
				</div>
			</div>
		</div>
		</div>
</div>
			<?php include("../../footer.php") ?>
	</body>
<html>