<?php 
require '../../class/database.class.php';
$bdd= new Database();
if(isset($_COOKIE['idRegistreFiche'])){
	$idRegistre=$_COOKIE['idRegistreFiche'];
	$ligne=$bdd->requete("SELECT * FROM examen WHERE id_registre='{$idRegistre}'");
	while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
	{
		$i=0;
  	$lienImage = $fetch['lien_image'];
  	if($lienImage==null){

  			}
  			
  	else{
  		echo "<img class='col-lg-6 col-md-4 col-sm-6' src='$lienImage' id='image$i' style='margin-bottom:5px'/>
  		<script>
		$('#image$i').mouseover(function(){
			var ide= '#image$i';
     	$('img:not(ide)').attr('class','col-lg-4 col-md-4 col-sm-6');
    })
		$('#image$i').mouseout(function(){
      $(this).attr('class','col-lg-6 col-md-4 col-sm-6');
    })
		</script>
  		";
  		$i++;
  		} 
  			
	}
	$ligne->closeCursor();
}


?>