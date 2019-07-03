<?php
class Patiente
{
	private $_registre;
	private $_nom;
	private $_gestite;
	private $_parite;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function registre( ) { return $this->_registre; }
	public function nom( ) { return $this->_nom; }
	public function gestite( ) { return $this->_gestite; }
	public function parite( ) { return $this->_parite; }

	//set attribut
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = ( int) $numeroRegistre;
	}
	public function setNom( $nomPatiente)
	{
	if ( is_string( $nomPatiente) && strlen( $nomPatiente) <= 30)
		{
			$this->_nom = $nomPatiente;
		}
	}
	public function setGestite($gestite)
	{
	if ( is_string( $gestite) && strlen( $gestite) <= 10)
		{
			$this->_gestite = $gestite;
		}
	}
	public function setParite($parite)
	{
	if ( is_string( $parite) && strlen( $parite) <= 10)
		{
			$this->_parite = $parite;
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