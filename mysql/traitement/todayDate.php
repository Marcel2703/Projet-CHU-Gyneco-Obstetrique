<?php 
require '../../class/database.class.php';
$bdd= new Database();
$ligne=$bdd->requete("SELECT DATE_FORMAT(NOW(), '%d/%m/%Y') AS dateToday");
while( $fetch = $ligne->fetch(PDO::FETCH_ASSOC) )
{ $date=$fetch['dateToday'];
echo $date;
}
?>