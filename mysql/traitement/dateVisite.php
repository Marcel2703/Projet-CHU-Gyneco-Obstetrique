<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT DATE(NOW()) AS dateToday");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{ $date=$fetch['dateToday'];
echo $date;
}
?>