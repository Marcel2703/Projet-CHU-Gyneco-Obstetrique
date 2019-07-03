<?php
require '../../class/database.class.php';
$db = new Database();
$registre=$db->requete("SELECT id_registre FROM patiente ORDER BY id_registre DESC LIMIT 1");
if ($registre->rowCount()==0) 
{
	$idRegistre=1;
}
else
{
	while($fetch=$registre->fetch(PDO::FETCH_ASSOC))
	{
	$idRegistre=$fetch['id_registre']+1;
	}
}
echo $idRegistre;
?>