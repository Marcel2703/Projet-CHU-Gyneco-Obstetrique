<?php
class PersonnelManager
{
	public function ajout(Personnel $perso)
	{
		$db = new Database();
		$query = $db->requete(" SELECT nom_perso FROM personnel WHERE nom_perso = '{$perso->nom()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO personnel (nom_perso,poste) 
			VALUES ('{$perso->nom()}','{$perso->poste()}')");
		echo 'ok';

	}
	public function supprimer($idPerso)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM personnel WHERE id_perso = '{$idPerso}' ");
		echo 'supprimé';
	}
	public function modifier(Personnel $perso)
	{
		$db = new Database();
		$query = $db->requete("UPDATE personnel SET id_perso='{$perso->numero()}',nom_perso='{$perso->nom()}',poste='{$perso->poste()}' WHERE id_perso = '{$perso->numero()}'");
		echo "modifié";
		$query->closeCursor();
	}
}