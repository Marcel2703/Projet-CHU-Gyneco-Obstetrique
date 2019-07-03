<?php
class OperationManager
{
	public function ajout(Operation $operation)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_operation FROM operation WHERE id_operation = '{$operation->numero()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO operation(id_operation,id_acte,id_registre,operateur,date_heure)
			VALUES ('{$operation->numero()}','{$operation->acte()}', '{$operation->registre()}', '{$operation->operateur()}', '{$operation->dateTime()}')");
		echo 'ok';

	}
	public function supprimer($idOperation)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM sejour WHERE id_operation = '{$idOperation}' ");
		echo 'ok';
	}
	public function modifier(Operation $operation)
	{
		$db = new Database();
		$query = $db->requete("UPDATE operation SET id_acte='{$operation->acte()}',operateur='{$operation->operateur()}',date_heure='{$operation->dateTime()}' WHERE id_operation = '{$operation->numero()}'");
		echo "modifié";
		$query->closeCursor();
	}
}