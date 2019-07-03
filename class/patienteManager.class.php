<?php
class PatienteManager
{
	public function ajout(Patiente $patiente)
	{
		$db = new Database();
		$query = $db->requete(" SELECT id_registre FROM patiente WHERE id_registre = '{$patiente->registre()}' LIMIT 1 ");
		$count = $query->rowCount();
		if($count == 1)
		{
			echo 'no';
			exit();
		}

		$query = $db->requete(" INSERT INTO patiente (id_registre, nom_patiente,gestite, parite) 
			VALUES ('{$patiente->registre()}','{$patiente->nom()}', '{$patiente->gestite()}', '{$patiente->parite()}')");
		echo 'ok';

	}
	public function supprimer($idRegistre)
	{
		$db = new Database();
		$recupOperation = $db->requete(" SELECT id_operation FROM operation WHERE id_registre = '{$idRegistre}'");
		if($recupOperation->rowCount()==0){
				$query = $db->requete(" DELETE FROM patiente WHERE id_registre = '{$idRegistre}' ");
				$query1 = $db->requete(" DELETE FROM sejour WHERE id_registre = '{$idRegistre}' ");
		}
		else{
			while( $fetch = $recupOperation->fetch(PDO::FETCH_ASSOC) ){
				$idOperation=$fetch['id_operation'];
				$supprProtocole = $db->requete(" DELETE FROM protocoleA WHERE id_operation = '{$idOperation}' ");
			}
			$query = $db->requete(" DELETE FROM patiente WHERE id_registre = '{$idRegistre}' ");
			$query1 = $db->requete(" DELETE FROM sejour WHERE id_registre = '{$idRegistre}' ");
			$query2 = $db->requete(" DELETE FROM operation WHERE id_registre = '{$idRegistre}' ");
		}

		$query = $db->requete(" DELETE FROM patiente WHERE id_registre = '{$idRegistre}' ");
		$query1 = $db->requete(" DELETE FROM operation WHERE id_registre = '{$idRegistre}' ");
		echo 'ok';
	}
	public function modifier(Patiente $patiente)
	{
		$db = new Database();
		$query = $db->requete("UPDATE patiente SET gestite='{$patiente->gestite()}',parite='{$patiente->parite()}' WHERE id_registre = '{$patiente->registre()}'");
		echo "modifié";
		$query->closeCursor();
	}
}