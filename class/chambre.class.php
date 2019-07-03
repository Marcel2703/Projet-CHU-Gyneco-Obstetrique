<?php
class Chambre
{
	private $_numero;
	private $_categorie;
	private $_occup;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero( ) { return $this->_numero; }
	public function categorie( ) { return $this->_categorie; }
	public function occup( ) { return $this->_occup; }

	//set attribut
	public function setNumero( $numeroChambre)
	{
		$this->_numero = (int) $numeroChambre;
	}
	public function setCategorie( $categorie)
	{
	if ( is_string( $categorie) && strlen( $categorie) <= 8)
		{
			$this->_categorie = $categorie;
		}
	}
	public function setOccup($occup)
	{
			$this->_occup = $occup;
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