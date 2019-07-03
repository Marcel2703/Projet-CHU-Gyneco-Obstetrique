<?php
class SejourManager
{
	public function ajout(Sejour $sejour)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_sejour FROM sejour WHERE id_sejour = '{$sejour->numero()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}
		else
		{
			$verifyDoublons = $db->requete(" SELECT id_registre FROM sejour WHERE id_registre = '{$sejour->registre()}' AND date_sortie='0000-00-00' LIMIT 1 ");
			$count = $verifyDoublons->rowCount();
			if($count == 1)
			{
				$query = $db->requete("UPDATE sejour SET date_sortie = NOW() WHERE id_registre='{$sejour->registre()}' AND date_sortie='0000-00-00'");
				$query1 = $db->requete(" INSERT INTO sejour(id_sejour,id_chambre,id_lit,id_registre,nom_patiente,date_entree)
			VALUES ('{$sejour->numero()}','{$sejour->chambre()}','{$sejour->lit()}','{$sejour->registre()}', '{$sejour->patiente()}', NOW())");
				echo "Réglèment de la dernière réservation de Mme ".$sejour->patiente()." et ajout de sa nouvelle réservation réussi";
			}
			else
			{
				$query1 = $db->requete(" INSERT INTO sejour(id_sejour,id_chambre,id_lit,id_registre,nom_patiente,date_entree)
			VALUES ('{$sejour->numero()}','{$sejour->chambre()}','{$sejour->lit()}','{$sejour->registre()}', '{$sejour->patiente()}', NOW())");
				echo "Ajout de la nouvelle réservation de Mme ".$sejour->patiente()." réussi";
			}
		}
	}
	public function supprimer($idSejour)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM sejour WHERE id_sejour = '{$idSejour}' ");
		echo 'ok';
	}
	public function modifier(Sejour $sejour)
	{
		$db = new Database();
		$query = $db->requete("UPDATE sejour SET id_chambre='{$sejour->chambre()}',id_lit='{$sejour->lit()}',id_registre='{$sejour->registre()}',nom_patiente='{$sejour->patiente()}',date_entree='{$sejour->entree()}', date_sortie = '{$sejour->numero()}' WHERE id_sejour='{$sejour->numero()}'");
		echo "modifié";
		$query->closeCursor();
	}
	public function regler($idRegistre)
	{
		$db = new Database();
		$query = $db->requete("UPDATE sejour SET date_sortie=NOW() WHERE id_registre='{$idRegistre}' AND date_sortie='0000-00-00'");
		echo "reglé";
		$query->closeCursor();
	}
}