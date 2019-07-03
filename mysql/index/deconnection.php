<?php session_start();
unset($_SESSION);
session_destroy();
header('Location:http://localhost/Projet CHU-Gyneco-Obstetrique/index.php');
?>
