<?php
class ProtocoleCesarienneManager
{
	public function ajout(ProtocoleAccouchement $protocoleCesarienne)
	{
		$db = new Database();
		$query = $db->requete(" SELECT element FROM protocoleA WHERE id_operation='{$protocoleCesarienne->operation()}' AND id_bebe='{$protocoleCesarienne->bebe()}' AND element = '{$protocoleCesarienne->element()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo "Erreur: Vous avez dûes faire une erreur dans le classement des bébés, supprimer d'abord l'opération effectuée après cette opération";
			exit();
		}

		$query = $db->requete(" INSERT INTO protocoleA (id_operation,id_bebe,element,valeur) 
			VALUES (\"{$protocoleCesarienne->operation()}\",\"{$protocoleCesarienne->bebe()}\",\"{$protocoleCesarienne->element()}\",\"{$protocoleCesarienne->valeur()}\")");
		echo 'ok';

	}
	public function supprimer($idOperation,$idBebe,$element)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM protocoleA WHERE id_operation = '{$idOperation}' AND id_bebe = '{$idBebe}' AND element = '{$element}'");
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