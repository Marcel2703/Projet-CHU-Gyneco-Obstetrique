<script type="text/javascript" src="http://localhost/Projet CHU-Gyneco-Obstetrique/javascript/scriptProtocole.js"></script>
<div id="formProtocole" class="row">
	<div style="margin:10px;margin-right:10px;" id="liste">		
			<div class="panel-heading" style="background:rgb(0,50,0);color:#EEE;height:45px;padding-top:10px;">
				<h4 style="display:inline;font-size:19px;">Veuillez choisir une opération dont le protocole est à rédiger</h4>
				<form onSubmit="return false" style="display:inline;position:absolute;right:30px;margin-top:-3px;">
					<label for="recherchePerso" class="sr-only">Recherche</label>
					<input type="search" id="rechercheOpProtocole" placeholder="Rechercher nom patiente" class="form-control" style="width:250px;display:inline-block;"/>
				</form>
			</div>
			<table  class="table table-bordered table-hover" id="tableau">
				<thead>
					<tr class="success" style="font-size:15px;">
						<th class="col-lg-2 col-md-1 col-sm-1 col-xs-1">N° Opération</th>
						<th class="col-lg-3 col-md-2 col-sm-2 col-xs-2">Nom</th>						
						<th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Date acte</th>
						<th class="col-lg-2 col-md-1 col-sm-1 col-xs-1" style='text-align:center'>Action</th>
					</tr>
				</thead>
			</table>
			<section id="tabOpProtocole" style="background: rgb(228,228,228);">
				</tbody>
			</table>
			</section>
			<section id="tableRechercheOpProtocole">
				</tbody>
			</table>
			</section>
	</div>
		<div id="carousel" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
				<li data-target="#carousel" data-slide-to="3"></li>
			</ol>
  		<div class="carousel-inner">
  			<div class="item active"><?php include("protocole/protoAccouchement.php");?></div>
  			<div class="item"><?php include("protocole/protoCesarienne.php");?></div>   		  
  			<div class="item"><?php include("protocole/formProtoAccouchement.php");?></div>
  			<div class="item"><?php include("protocole/formProtoCesarienne.php");?></div>
    		  		
  		</div>
  		<div style="position:absolute;top:21px;left:15px;">
  		<a class="left carousel-control" href="#carousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		</div>
		<div style="position:absolute;top:21px;right:15px;">
		<a class="right carousel-control" href="#carousel" data-slide="next">
			<span class="icon-next"></span>
		</a>
		</div>
	
		</div>		
</div>