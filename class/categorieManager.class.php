<?php
class CategorieManager
{
	public function ajout(Categorie $categ)
	{
		$db = new Database();
		$query = $db->requete(" SELECT code_categorie FROM categorie WHERE code_categorie = '{$categ->code()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO categorie (code_categorie,nb_occup,prix) 
			VALUES ('{$categ->code()}','{$categ->occupation()}','{$categ->prix()}')");
		echo 'ok';

	}
	public function supprimer($codeCategorie)
	{
		$db = new Database();
		$supprChambre = $db->requete(" SELECT id_chambre FROM chambre WHERE code_categorie = '{$codeCategorie}'");
		if($supprChambre->rowCount()==0){
				$query = $db->requete(" DELETE FROM categorie WHERE code_categorie = '{$codeCategorie}' ");
		}
		else{
			while( $fetch = $supprChambre->fetch(PDO::FETCH_ASSOC) ){
				$idChambre=$fetch['id_chambre'];
				$supprLit = $db->requete(" DELETE FROM lit WHERE id_chambre = '{$idChambre}' ");
				$deleteChambre = $db->requete(" DELETE FROM chambre WHERE id_chambre = '{$idChambre}' ");
				$query = $db->requete(" DELETE FROM categorie WHERE code_categorie = '{$codeCategorie}' ");
			}
		}
		
		echo 'supprimé';
	}
	public function modifier(Categorie $categ)
	{
		$db = new Database();
		$query = $db->requete("UPDATE categorie SET code_categorie='{$categ->code()}',nb_occup='{$categ->occupation()}',prix='{$categ->prix()}' WHERE code_categorie = '{$categ->code()}'");
		echo "modifié";
		$query->closeCursor();
	}
}