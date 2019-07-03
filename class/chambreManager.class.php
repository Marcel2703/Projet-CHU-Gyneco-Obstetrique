<?php
class ChambreManager
{
	public function ajout(Chambre $chambre)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_chambre FROM chambre WHERE id_chambre = '{$chambre->numero()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO chambre (id_chambre,code_categorie,place_occup) 
			VALUES ('{$chambre->numero()}','{$chambre->categorie()}','{$chambre->occup()}')");
		echo 'ok';

	}
	public function supprimer($idChambre)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM chambre WHERE id_chambre = '{$idChambre}' ");
		$query2 = $db->requete(" DELETE FROM lit WHERE id_chambre = '{$idChambre}' ");
		$query3 = $db->requete(" DELETE FROM sejour WHERE id_chambre = '{$idChambre}' ");
		echo 'supprimé';
	}
	public function modifier(Chambre $chambre)
	{
		$db = new Database();
		$query = $db->requete("UPDATE chambre SET code_categorie='{$chambre->categorie()}' WHERE id_chambre = '{$chambre->numero()}'");
		echo "modifié";
		$query->closeCursor();
	}
	public function reglageNbPlace(Chambre $chambre)
	{
		$db= new Database();
		$query1 = $db->requete("SELECT id_lit FROM lit WHERE id_chambre = '{$chambre->numero()}' AND occupation='Occupé'");
		$countOccup = $query1->rowCount();
		$chambre->hydrate(array('occup'=> $countOccup));
		$query3 = $db->requete("UPDATE chambre SET place_occup = '{$chambre->occup()}' WHERE id_chambre = '{$chambre->numero()}'");
		echo $countOccup.'et'.$chambre->numero();
		$query1->closeCursor();
	}
}