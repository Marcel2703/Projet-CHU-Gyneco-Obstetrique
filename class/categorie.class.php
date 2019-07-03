<?php
class Categorie
{
	private $_code;
	private $_occupation;
	private $_prix;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function code( ) { return $this->_code; }
	public function occupation( ) { return $this->_occupation; }
	public function prix( ) { return $this->_prix; }

	//set attribut
	public function setOccupation( $nbOccupation)
	{
		$this->_occupation = ( int) $nbOccupation;
	}
	public function setCode( $codeCategorie)
	{
	if ( is_string( $codeCategorie) && strlen( $codeCategorie) <= 8)
		{
			$this->_code = $codeCategorie;
		}
	}
	public function setPrix($prix)
	{
			$this->_prix = (int) $prix;
	}

	//hydratation
	public function hydrate( array $donnees)
	{
		 foreach ($donnees as $key => $value)
            {
                $method = 'set'.ucfirst($key);
                
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
	}
}