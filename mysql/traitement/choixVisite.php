<?php
$idRegistre=$_GET['idRegistre'];
setcookie('idRegistreVisite',$idRegistre, time() + 365*24*3600, null, null,false, true);
$nomPatiente=$_GET['nomPatiente'];
echo $idRegistre.",".$nomPatiente;