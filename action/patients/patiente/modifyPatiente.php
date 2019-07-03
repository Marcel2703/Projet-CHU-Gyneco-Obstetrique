<?php

require '../../../class/database.class.php';
require '../../../class/patienteManager.class.php';
require '../../../class/patiente.class.php';

$patienteManager = new PatienteManager();
$registrePatiente = htmlspecialchars($_POST['idRegistre']);
$nomPatiente = htmlspecialchars($_POST['nomPatiente']);
$gestite = htmlspecialchars($_POST['gestite']);
$parite = htmlspecialchars($_POST['parite']);

if(isset($registrePatiente) && isset($nomPatiente) && isset($gestite) && isset($parite))
{
	$patiente= new Patiente(array('registre' => $registrePatiente,'nom' => $nomPatiente, 'gestite' => $gestite,'parite' => $parite));
	$patienteManager->modifier($patiente);
}


?>