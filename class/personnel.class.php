<?php
class Personnel
{
	private $_numero;
	private $_nom;
	private $_poste;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero( ) { return $this->_numero; }
	public function nom( ) { return $this->_nom; }
	public function poste( ) { return $this->_poste; }

	//set attribut
	public function setNumero( $numeroPerso)
	{
		$this->_numero = ( int) $numeroPerso;
	}
	public function setNom( $nomPerso)
	{
	if ( is_string( $nomPerso) && strlen( $nomPerso) <= 30)
		{
			$this->_nom = $nomPerso;
		}
	}
	public function setPoste($poste)
	{
	if ( is_string( $poste) && strlen( $poste) <= 15)
		{
			$this->_poste = $poste;
		}
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