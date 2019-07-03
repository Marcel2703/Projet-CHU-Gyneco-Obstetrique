<?php
require '../../class/database.class.php';
$bdd= new Database();
$nomPatiente=$_GET['nomPatiente'];
$dateActe=$_GET['dateActe'];
echo $nomPatiente,$dateActe;