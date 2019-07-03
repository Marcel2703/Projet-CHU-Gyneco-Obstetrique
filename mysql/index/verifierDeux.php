<?php
 	require '../../class/database.class.php';
 	$bdd=new Database;
	$login = trim($_POST['login']);
	$motPasse = trim($_POST['passe']);
	$ligne=$bdd->requete("SELECT * FROM admin WHERE login='{$login}' AND password='{$motPasse}' LIMIT 1");
	if($ligne->rowCount()==0){
		echo '0';
		}
	else{
		echo '1';
	}

 		?>