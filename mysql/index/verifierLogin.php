<?php
 	require '../../class/database.class.php';
 	$bdd=new Database;
	$login = trim($_POST['login']);
	$ligne=$bdd->requete("SELECT * FROM admin WHERE login='{$login}' LIMIT 1");
	if($ligne->rowCount()==0){
			echo '0';
		}
	else{
		echo '1';
	}

 		?>