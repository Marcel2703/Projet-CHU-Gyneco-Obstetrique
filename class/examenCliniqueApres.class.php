<?php
class ExamenApresManager
{
	public function ajout(Examen $examen)
	{
		$db = new Database();
		$query = $db->requete(" SELECT * FROM examenApres WHERE id_registre='{$examen->registre()}' AND element = '{$examen->element()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO examenApres (id_registre,element,valeur,lien_image) VALUES ('{$examen->registre()}',\"{$examen->element()}\",\"{$examen->valeur()}\",\"{$examen->image()}\")");
		echo $examen->image();

	}
	public function supprimer($idRegistre,$element)
	{
		$db = new Database();

		$query = $db->requete(" DELETE FROM examenApres WHERE id_registre = '{$idRegistre}' AND element = '{$element}'");
		echo 'Suppression avec succès';
	}
	public function modifier($idActe,Acte $acte)
	{
		$db = new Database();
		$query = $db->requete("UPDATE acte SET (id_acte,designation,mention) VALUES (('{$acte->numero()}','{$acte->designation()}','{$acte->mention()}') WHERE id_acte = '{$idActe}'");
		echo "ok";
		$query->closeCursor();
	}
}