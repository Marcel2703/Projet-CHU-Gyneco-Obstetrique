<?php session_start();
if (!isset($_SESSION['login']) OR !isset($_SESSION['nom_user'])) {
		header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/index.php');
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.js"> </script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/typeahead.bundle.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptHeader.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/font_awesome.css" />		

	</head>
	<body>
		<div class="container-fluid" id="logo">
			<div class="row">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-left:0px;"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/logo.jpg" width="110" style="float:left;opacity:0.8"></div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="color:white;font-size:15px;font-weight:bold;text-align:center" id="logocenter"><span id="date_heure"></span><span><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/newFond.jpg" style="opacity:0.2;margin-top:-5px;margin-left:-40px;;"></span></div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-right:0px;"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/logoGyneco.jpg" width="104" style="float:right;opacity:0.8"></div>
			</div>
		</div>

		<div class="navbar navbar-inverse" id="lien">			
    			<nav class="container-fluid" role="navigation" id="navigators">
    				<div class="row">
    				 <div class="navbar-header">   
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
              			<a class="navbar-brand" href="http://localhost/Projet CHU-Gyneco-Obstetrique/index1.php"> <span class="glyphicon glyphicon-home"></span></a>
            		</div>
    				<div class="collapse navbar-collapse">
      				<ul class="nav nav-tabs">
       	 				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/service.php" class="anim">Service</a> </li>
        				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/patients/accueilPatient.php" class="anim">Patients</a> </li>
        				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/traitement/accueilTrait.php" class="anim">Traitements</a> </li>
        				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/registre/accueilRegistre.php" class="anim">Registre</a> </li>
        				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/visualisation/accueilVue.php" class="anim">Visualisation</a> </li>
        				<li> <a href="http://localhost/Projet CHU-Gyneco-Obstetrique/action/bilan/accueilBilan.php" class="anim">Bilan final</a> </li>

      				<p class="navbar-text pull-right" style="margin-top:0px;color:white;font-size:17px;"><?php echo $_SESSION['nom_user'].' '?><a href="http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/index/deconnection.php"><button class='btn btn-default' style='text-align:center;background:rgb(0,50,0);'><span><img src='http://localhost/Projet CHU-Gyneco-Obstetrique/image/user.png' width='20'/></span></button></a></p>
      				</ul>
      				</div>
      				</div>
    			</nav>			
		</div>
	</body>
<html>