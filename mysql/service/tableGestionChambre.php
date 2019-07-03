<?php 
require '../../class/database.class.php';
$bdd= new Database();
$requeteCateg=$_POST['requeteCateg'];
$requeteEtatChambre=$_POST['requeteEtatChambre'];
	if($requeteEtatChambre=='0')
	{
		$ligne=$bdd->requete("SELECT chambre.id_chambre AS varavarana,chambre.code_categorie AS karazany,chambre.place_occup AS occupe,categorie.nb_occup AS dispoTotal ,categorie.prix AS hofany FROM chambre,categorie WHERE chambre.code_categorie='{$requeteCateg}' AND categorie.code_categorie = '{$requeteCateg}' ORDER BY varavarana");
		echo "<table  class='table table-hover'>
				<tbody>";
		while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
		{
			$idChambre = $fetch['varavarana'];
  			$codeCategorie = $fetch['karazany'];
  			$dispoTotal = $fetch['dispoTotal'];
  			$occupe = $fetch['occupe'];
  			$dispo=$dispoTotal-$occupe;
  			$prix = $fetch['hofany'];
  			if($prix!=0)
  			{
  				echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px;'>$prix</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  			else
  			{
  				echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>Gratuit</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  		
		}
		$ligne->closeCursor();
	}
	elseif($requeteEtatChambre=='1')
	{
		$ligne=$bdd->requete("SELECT chambre.id_chambre AS varavarana,chambre.code_categorie AS karazany,chambre.place_occup AS occupe,categorie.nb_occup AS dispoTotal ,categorie.prix AS hofany FROM chambre,categorie WHERE (chambre.code_categorie='{$requeteCateg}' AND categorie.code_categorie = '{$requeteCateg}' AND (categorie.nb_occup-chambre.place_occup)>0) ORDER BY varavarana");
		echo "<table  class='table table-hover'>
				<tbody>";
		while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
		{
			$idChambre = $fetch['varavarana'];
  			$codeCategorie = $fetch['karazany'];
  			$dispoTotal = $fetch['dispoTotal'];
  			$occupe = $fetch['occupe'];
  			$dispo=$dispoTotal-$occupe;
  			$prix = $fetch['hofany'];
  			if($prix!=0)
  			{
  				echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>$prix</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  			else
  			{
  				echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>Gratuit</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  		
		}
		$ligne->closeCursor();
	}
	else
	{
		$ligne=$bdd->requete("SELECT chambre.id_chambre AS varavarana,chambre.code_categorie AS karazany,chambre.place_occup AS occupe,categorie.nb_occup AS dispoTotal ,categorie.prix AS hofany FROM chambre,categorie WHERE (chambre.code_categorie='{$requeteCateg}' AND categorie.code_categorie = '{$requeteCateg}' AND (categorie.nb_occup-chambre.place_occup)=0) ORDER BY varavarana");
		echo "<table  class='table table-hover'>
				<tbody>";
		while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
		{
			$idChambre = $fetch['varavarana'];
  			$codeCategorie = $fetch['karazany'];
  			$dispoTotal = $fetch['dispoTotal'];
  			$occupe = $fetch['occupe'];
  			$dispo=$dispoTotal-$occupe;
  			$prix = $fetch['hofany'];
  			if($prix!=0)
  			{
  				echo "<tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>$prix</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  			else
  			{
  				echo " <tr>
					<td class='col-lg-1 col-md-2 col-sm-2 col-xs-2'>$idChambre</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>$codeCategorie</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='padding-left:15px;'>$dispo</td>
					<td class='col-lg-2 col-md-3 col-sm-3 col-xs-3' style='padding-left:20px'>Gratuit</td>
					<td class='col-lg-2 col-md-2 col-sm-2 col-xs-2' style='text-align:center'><a href='http://localhost/Projet CHU-Gyneco-Obstetrique/action/service/gestion/litLibre.php?idChambre=$idChambre' onclick=\"idChambre=$idChambre;lien=$(this).attr('href');reserver(idChambre,lien);return false;\" class='btnReserv'><button class='btn btn-success'><span class='glyphicon glyphicon-calendar'></span></button></a></td>
		</tr>";
  			}
  		
		}
		$ligne->closeCursor();
	}
	
?>