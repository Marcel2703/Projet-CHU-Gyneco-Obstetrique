<?php
class ActeManager
{
	public function ajout(Acte $acte)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_acte FROM acte WHERE id_acte = '{$acte->numero()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO acte (id_acte,designation,mention) 
			VALUES ('{$acte->numero()}','{$acte->designation()}','{$acte->mention()}')");
		echo 'ok';

	}
	public function supprimer($idActe)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM acte WHERE id_acte = '{$idActe}' ");
		echo 'ok';
	}
	public function modifier(Acte $acte)
	{
		$db = new Database();
		$query = $db->requete("UPDATE acte SET mention='{$acte->mention()}' WHERE id_acte = '{$acte->numero()}'");
		echo "modifié";
		$query->closeCursor();
	}
}