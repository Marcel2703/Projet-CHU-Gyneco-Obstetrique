<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT DATE_FORMAT(NOW(),'%H:%i') AS dateToday");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{ $heure=$fetch['dateToday'];
echo $heure;
}
?>