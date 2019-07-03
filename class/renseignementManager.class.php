<?php
class RenseignementManager
{
	public function ajout(Renseignement $renseignement)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_registre FROM renseignement WHERE id_registre = '{$renseignement->registre()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO renseignement (id_registre, nom_patiente,prenom_patiente, naissance, lieu, pere, mere, domicile, croyance, profession, situation, contact) 
			VALUES ('{$renseignement->registre()}','{$renseignement->nom()}', '{$renseignement->prenom()}', '{$renseignement->naissance()}','{$renseignement->lieu()}', '{$renseignement->pere()}', '{$renseignement->mere()}', '{$renseignement->domicile()}', '{$renseignement->croyance()}', '{$renseignement->profession()}', '{$renseignement->situation()}', '{$renseignement->contact()}')");
		echo 'ajouté';

	}
	public function supprimer($idRegistre)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM renseignement WHERE id_registre = '{$idRegistre}' ");
		echo 'ok';
	}
	public function modifier(Renseignement $renseignement)
	{
		$db = new Database();
		$query = $db->requete("UPDATE renseignement SET nom_patiente='{$renseignement->nom()}',prenom_patiente='{$renseignement->prenom()}', naissance='{$renseignement->naissance()}', lieu='{$renseignement->lieu()}', pere='{$renseignement->pere()}', mere='{$renseignement->mere()}', domicile='{$renseignement->domicile()}', croyance='{$renseignement->croyance()}', profession='{$renseignement->profession()}', situation='{$renseignement->situation()}', contact='{$renseignement->contact()}' WHERE id_registre = '{$renseignement->registre()}'");
		echo "modifié";
		$query->closeCursor();
	}
}