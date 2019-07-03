<?php
require '../../class/database.class.php';
$db = new Database();
$operation=$db->requete("SELECT id_operation FROM operation ORDER BY id_operation DESC LIMIT 1");
if ($operation->rowCount()==0) 
{
	$idOperation=1;
}
else
{
	while($fetch=$operation->fetch(PDO::FETCH_ASSOC))
	{
	$idOperation=$fetch['id_operation']+1;
	}
}
echo $idOperation;
?>