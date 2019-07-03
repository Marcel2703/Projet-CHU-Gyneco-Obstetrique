<?php
	session_start();
 	require '../../class/database.class.php';
 	$bdd=new Database;
	$login = trim($_POST['login']);
	$motPasse = trim($_POST['passe']);
	$ligne=$bdd->requete("SELECT * FROM admin WHERE login='{$login}' AND password='{$motPasse}' LIMIT 1");
	if($ligne->rowCount()==0){
			echo "non";
			header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/index.php');
		}
	else{
		while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
		{
			$_SESSION['idUser']=$fetch['id_use'];
			$_SESSION['login']=$fetch['login'];
			$_SESSION['passe']=$fetch['password'];
			$_SESSION['nom_user']=$fetch['nom'];
		}
		header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/index1.php');
	}

 		?>