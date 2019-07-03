<!DOCTYPE html>
<html>
	<head>
		<title>CHU-Gynéco-Obstétrique</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery/jquery.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/js/bootstrap.min.js"></script>		
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/bootstrap/css/bootstrap.css">		
		<script type="text/javascript" src="jquery.form.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/script.js"></script>
		<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/Projet CHU-Gyneco-Obstetrique/jquery-ui/jquery-ui.css">
	</head>
	<body>
		<style type="text/css">
		#progressBox {
border: 1px solid #0099CC;
padding: 1px;
padding-right: 9px;
position:relative;
width:400px;
border-radius: 3px;
margin: 10px;
text-align:left;
}
#progress {
height:20px;
border-radius: 3px;
background-color: #003333;
width:1%;
}
#statustxt {
top:3px;
left:50%;
position:absolute;
display:inline-block;
color: #000000;
}

		</style>
		<!--<script type="text/javascript">
    $('#my_form').on('submit', function (e) {
        // On empêche le navigateur de soumettre le formulaire
        e.preventDefault();
 
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
 
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            dataType: 'json', // selon le retour attendu
            data: data,
            success: function (response) {
                // La réponse du serveur
            }
        });
    });
	</script>-->
		<form id="my_form" method="post" action="upload.php" enctype="multipart/form-data">
    		<input type="text" name="title">
    		<input type="file" name="img" accept="image/*" style="border: 1px solid #ccc;padding:3px;display:inline">
    		<button type="submit" style="display:inline">Télécharger</button>
		</form>

		<!--<div class="progress progress-striped active">
			<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
				<span class="sr-only">0% Complete</span>
			</div>
		</div>-->
	<div id="progressBox">
		<div id="progress"></div>
		<div id="statustxt">0%</div>
	</div>
	<div id="info">En attente de téléchargement...</div>
    	<div class="image"></div>
	</body>
<html>