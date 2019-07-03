<?php

class Database extends PDO
{

 protected $_instance = NULL;

 public function __construct()
 {
   if( $this->_instance == NULL )
    {
     try 
 	    {
         $db = new PDO('mysql:host=localhost;dbname=gestion_patiente', 'root', '');
         $this->_instance = $db;
 	    }

      catch (PDOException $e) 
      {
         die('Erreur : '.$e->getMessage());
 	    }
    }
 }


  public function requete($sql)
  {
  	$query = $this->_instance->prepare($sql);
  	$query->execute();
  	return $query;
  }

}


?>