<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptFiche.js"></script>
<script type="text/javascript">
function pdfFiche(){
	      		var contents = $("#pdf").html();
	          	var frame1 = $('<iframe />');
	          	frame1[0].name = "frame1";
	          	frame1.css({ "position": "absolute", "top": "-1000000px" });
	          	$("body").append(frame1);
	          	var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
	          	frameDoc.document.open();
	          	//Create a new HTML document.
	          	frameDoc.document.write('<body>');
	          	//Append the external CSS file.
	          	frameDoc.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/MEFB-STAGE/assets/css/bootstrap.css" />');
	          	
	          	frameDoc.document.write(contents);
	          	frameDoc.document.write('</body>');
	          	frameDoc.document.close();
	          	setTimeout(function () {
	              window.frames["frame1"].focus();
	              window.frames["frame1"].print();
	              frame1.remove();
	              // closeme();
	          }, 500);
      	};
 function imprimerNote(){
var h = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"/><style type="text/css">body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small </style></head><body>';
	var b =  document.getElementById('pdf').innerHTML;
	var f  = '</body></html>';
	window.open('data:application/vnd.ms-excel,'+encodeURIComponent(h+b+f),'flie.xls');

}
</script>
<div id="fichePatiente">
	<div style="margin:10px;margin-right:10px;" id='liste'>		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une patiente</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheFiche" placeholder="Rechercher patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">N° Registre</th>
						<th class="col-lg-4 col-md-6 col-sm-6 col-xs-6">Nom</th>						
						<th class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="text-align:center">Action</th>
					</tr>
				</thead>
			</table>
			<section id="tabRegistreFiche" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheFiche" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
	</div>
<div id="pdf">
			<div style="margin:10px;margin-right:10px;">		
				<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:60px;padding-top:15px;"> 
					<h3 style="display:inline;">Fiche clinique</h3>
				</div>
			</div>
			<div class="row" style="font-size:17px;padding-left:10px;">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><label style="font-weight:bold">Nom de la patiente:</label>
					<label id="nomPatiente"></label>
				</div>			
			</div>
		<section class="form-group" id="ajoutPerso" style="padding:15px;font-size:15px;">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" style="text-decoration:underline;font-size:17px;padding-top:15px;margin-bottom:20px;color:white;">ETAT CIVIL</label>
					</div>
				</div>		
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="nom" style="color:white;font-size:16px;">Nom:</label>
						<label id="nom"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="prenom" style="color:white;font-size:16px;">Prenom:</label>
						<label id="prenom"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="age" style="color:white;font-size:16px;">Age:</label>
						<label id="age"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="lieu" style="color:white;font-size:16px;">Lieu de naissance:</label>
						<label id="lieu"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="pere" style="color:white;font-size:16px;">Nom père:</label>
						<label id="pere"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="mere" style="color:white;font-size:16px;">Nom mère:</label>
						<label id="mere"></label>
					</div>
				</div>
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="domicile" style="color:white;font-size:16px;">Domicile:</label>
						<label id="domicile"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="croyance" style="color:white;font-size:16px;">Croyance:</label>
						<label id="croyance"></label>
					</div>
				</div>		
				<div class="col-lg-6 col-lg-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-lg-6 col-sm-6" for="profession" style="color:white;font-size:16px;">Profession:</label>
						<label id="profession"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group">
						<label class="col-lg-6 col-md-6 col-sm-6" for="situation" style="color:white;font-size:16px;">Situation matrimoniale:</label>
						<label id="situation"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group" style="margin-top:20px;margin-bottom:20px;">
						<label class="col-lg-6 col-md-6 col-sm-6" style="text-decoration:underline;font-size:17px;color:white;">MOTIF D'ENTREE<span style="text-decoration:none;">:</span></label>
						<label id="motif"></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
  					<div class="form-group" style="margin-top:20px;margin-bottom:20px;">
						<label class="col-lg-6 col-lg-6 col-sm-6" style="text-decoration:underline;font-size:17px;color:white;">DATE D'ENTREE<span style="text-decoration:none;">:</span></label>
						<label id="entree"></label>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:20px;margin-bottom:20px;">
  					<div class="form-group">
						<label class="col-lg-5 col-md-5 col-sm-5" style="text-decoration:underline;font-size:17px;color:white;">EXAMEN CLINIQUE AVANT ENTREE<span style="text-decoration:underline;">:</span></label>
						<div class="col-lg-12 col-md-12 col-sm-12">	
							<div class="col-lg-6 col-md-5 col-sm-6" id="examAvant">	
						
							</div>
							<div class="col-lg-6 col-md-7 col-sm-6" id="illustrationAvant">	
						
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:20px;margin-bottom:20px;">
  					<div class="form-group" >
						<label class="col-lg-5 col-md-5 col-sm-5" style="text-decoration:underline;font-size:17px;color:white;">EXAMEN CLINIQUE APRES ADMISSION<span style="text-decoration:underline;">:</span></label>
						<div class="col-lg-12 col-md-12 col-sm-12">	
							<div class="col-lg-6 col-md-5 col-sm-6" id="examApres">	
						
							</div>
							<div class="col-lg-6 col-md-7 col-sm-6" id="illustration">	
						
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:20px;margin-bottom:20px;">
  					<div class="form-group" id="print">
						<label class="col-lg-5 col-lg-5 col-sm-5" style="text-decoration:underline;font-size:17px;padding-top:15px;color:white;">EXAMEN COMPLEMENTAIRE<span style="text-decoration:underline;">:</span></label>
						<div class="col-lg-12 col-lg-12 col-sm-12" id="tableAfenina" style="display:none">
							<table  class="table table-bordered table-hover" id="tableau">
								<thead>
									<tr class="success" style="font-size:15px;color:black">
										<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date</th>
										<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Examens demandés</th>
										<th class="col-lg-3 col-md-4 col-sm-4 col-xs-4">Résultats</th>						
										<th class="col-lg-2 col-md-3 col-sm-3 col-xs-3">Observation</th>
									</tr>
								</thead>
							</table>
							<section id="tabListeVisite" style="background: white;">
									</tbody>
								</table>
							</section>
						</div>
					</div>
				</div>
				<div id="btnFacture" class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-8 col-md-offset-8 col-sm-offset-8">
				<a href="" id="lienPDF" target="_blank"><button type="reset" class="btnService" style="width:100px;height:35px;display:none" class="btnService">Print</button></a>	
				<button type="reset" class="btnService" onclick="retourFiche()" style="width:100px;height:35px;display:none">OK</button>
				</div>	
</div>				
		</section>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height:20px;background:rgb(50,0,0);color:white;font-size:12px;"><label style="margin-left:10px;">CHU TAMBOHOBE</label><label style="position:absolute;right:10px;">GYNECO-OBSTETRIQUE</label></div>
</div>