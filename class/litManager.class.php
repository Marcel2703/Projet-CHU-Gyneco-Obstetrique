<?php
class LitManager
{
	public function ajout(Lit $lit)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_lit FROM lit WHERE id_lit = '{$lit->numero()}' AND id_chambre = '{$lit->chambre()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'Le lit que vous avez inseré existe déjà dans cette chambre';
			exit();
		}

		$query = $db->requete(" INSERT INTO lit (id_lit,id_chambre,occupation) 
			VALUES ('{$lit->numero()}','{$lit->chambre()}','{$lit->occupation()}')");
		echo 'ok';

	}
	public function supprimer($idLit)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM lit WHERE id_lit = '{$idLit}' ");
		$query1 = $db->requete(" DELETE FROM sejour WHERE id_lit = '{$idLit}' ");
		echo 'Supprimé';
		echo $idLit;
	}
	public function modifier($idLit,Lit $lit)
	{
		$db = new Database();
		$query = $db->requete("UPDATE lit SET (id_lit,id_chambre,occupation) VALUES (('{$lit->numero()}','{$lit->chambre()}','{$lit->occupation()}') WHERE id_lit = '{$idLit}'");
		echo "ok";
		$query->closeCursor();
	}
	public function reglageOccupation(Lit $lit)
	{
		$db= new Database();
		$query = $db->requete(" SELECT id_sejour FROM sejour WHERE id_lit = '{$lit->numero()}' AND id_chambre= '{$lit->chambre()}' AND date_sortie='0000-00-00'");
		$count = $query->rowCount();
			if($count > 0)
			{				
				$modif= $db->requete("UPDATE lit SET occupation='Occupé' WHERE id_lit = '{$lit->numero()}' AND id_chambre= '{$lit->chambre()}'");
				echo 'oc';
			}
			else
			{				
				$modif= $db->requete("UPDATE lit SET occupation='Libre' WHERE id_lit = '{$lit->numero()}' AND id_chambre= '{$lit->chambre()}'");
				echo 'libre';
			}
		$query->closeCursor();
		$modif->closeCursor();
	}
}