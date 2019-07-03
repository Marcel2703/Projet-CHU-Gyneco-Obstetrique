<?php
class VisiteManager
{
	public function ajout(Visite $visite)
	{
		$db = new Database();
		$query = $db->requete(" SELECT * FROM visite WHERE id_visite='{$visite->numero()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO visite (id_visite,id_registre,date_visite,demande_visite,resultat,observation) VALUES ('{$visite->numero()}','{$visite->registre()}','{$visite->date()}',\"{$visite->demande()}\",\"{$visite->resultat()}\",\"{$visite->observation()}\")");
		echo 'ok';

	}
	public function supprimer($idViste)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM visite WHERE id_visite = '{$idViste}'");
		echo 'ok';
	}
	public function modifier($idActe,Acte $acte)
	{
		$db = new Database();
		$query = $db->requete("UPDATE acte SET (id_acte,designation,mention) VALUES (('{$acte->numero()}','{$acte->designation()}','{$acte->mention()}') WHERE id_acte = '{$idActe}'");
		echo "ok";
		$query->closeCursor();
	}
}