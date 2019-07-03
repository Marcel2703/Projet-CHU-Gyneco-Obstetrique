<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/index.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/css/service.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/typeahead.bundle.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptIndex.js"></script>
	</head>
	<body> 
	<div class="container-fluid" id="fenLog">
		<div class="row">
			<div id="tete1">   
    			<div class="container">
    				
    			<div id="userOption">
					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<b>
						<span class="glyphicon glyphicon-user"></span>Non connecté</b>
					</button>
    			</div>
    			</div>
			</div>
			<div class="container-fluid" id="milieu" style="padding:0px;">
			<div class="col-lg-5 col-lg-offset-7 col-md-4 col-md-offset-8 col-sm-5 col-sm-offset-7 col-xs-5 col-xs-offset-7">
					<form method="post" action="http://localhost/Projet CHU-Gyneco-Obstetrique/mysql/index/connection.php" id="formLogin" role="form" class="well">
						<fieldset>
							<legend><h3 style="color:white">Requete d'authentification</h3></legend>
							<div style="height:175px;text-align:center;">
								<img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/doctor.png" height="220" style="margin-top:-25px;">
							</div>
							<div class="form-group">
								<label for="login">Nom d'utilisateur:</label><br/>
								<div class="row">
									<div class="col-lg-10">
										<input type="texte" name="login" id="login" class="form-control" autofocus required/>
									</div>
									<div class="col-lg-2">
										<span id="loginOk" style="display:none"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/loginOk.png" width="30" ></span>
										<span id="loginError" style="display:none"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/loginNon.png" width="30" ></span>
									</div>								
								</div>
							</div>
							<div class="form-group">	
								<label for="passe">Mot de passe:</label><br/>
								<div class="row">
									<div class="col-lg-10">
										<input type="password" name="passe" id="passe" class="form-control"/>
									</div>
									<div class="col-lg-2">
										<span id="passeOk" style="display:none"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/loginOk.png" width="30"></span>
										<span id="passeError" style="display:none"><img src="http://localhost/Projet CHU-Gyneco-Obstetrique/image/loginNon.png" width="30"></span>
									</div>
								</div>
							</div>
							<div align="right">
								<input type="submit" class="btnLogin" id="btnLoginConnect" value="Connecter"/>
							</div><br/>
						</fieldset>
					</form>
			</div>
			</div>	
		</div>
		<div class="row">
			<div id="pieds">   
    			<div class="container-fluid">
    				<p class="navbar-text pull-right"> © CHU Gynéco-Obstétrique - 2016 ENI Developpement</p>
    		</div>
		</div>
		</div>
		
	</div>	
	</body>
<html>