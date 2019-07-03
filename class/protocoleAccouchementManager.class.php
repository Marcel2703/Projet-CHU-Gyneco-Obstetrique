<?php
class ProtocoleAccouchementManager
{
	public function ajout(ProtocoleAccouchement $protocoleAccouchement)
	{
		$db = new Database();
		$query = $db->requete(" SELECT element FROM protocoleA WHERE id_operation='{$protocoleAccouchement->operation()}' AND (id_bebe='{$protocoleAccouchement->bebe()}' AND element = '{$protocoleAccouchement->element()}')");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'non';
			exit();
		}
		else{
			$query = $db->requete("INSERT INTO protocoleA (id_operation,id_bebe,element,valeur) 
			VALUES (\"{$protocoleAccouchement->operation()}\",\"{$protocoleAccouchement->bebe()}\",\"{$protocoleAccouchement->element()}\",\"{$protocoleAccouchement->valeur()}\")");
		echo 'ok';
		}	

	}
	public function supprimerAutres($idOperation,$idBebe,$element)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM protocoleA WHERE id_operation = '{$idOperation}' AND id_bebe='{$idBebe}' AND element = '{$element}'");
		echo 'Supprimé avec succès';
	}
	public function supprimer($idBebe)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM protocoleA WHERE id_bebe='{$idBebe}'");
		echo 'Supprimé avec succès';
	}
	public function modifier($idActe,Acte $acte)
	{
		$db = new Database();
		$query = $db->requete("UPDATE acte SET (id_acte,designation,mention) VALUES (('{$acte->numero()}','{$acte->designation()}','{$acte->mention()}') WHERE id_acte = '{$idActe}'");
		echo "ok";
		$query->closeCursor();
	}
}