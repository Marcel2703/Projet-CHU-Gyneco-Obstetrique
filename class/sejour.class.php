<?php
class Sejour
{
	private $_numero;
	private $_chambre;
	private $_lit;
	private $_numPatiente;
	private $_patiente;
	private $_entree;
	private $_sortie;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero( ) { return $this->_numero; }
	public function chambre( ) { return $this->_chambre; }
	public function lit( ) { return $this->_lit; }
	public function registre( ) { return $this->_registre; }
	public function patiente( ) { return $this->_patiente; }
	public function entree( ) { return $this->_entree; }
	public function sortie( ) { return $this->_sortie; }

	//set attribut
	public function setNumero( $numeroSejour)
	{
		$this->_numero = (int) $numeroSejour;
	}
	public function setChambre( $numeroChambre)
	{
		$this->_chambre = (int) $numeroChambre;
	}
	public function setLit( $numeroLit)
	{
		$this->_lit = (int) $numeroLit;
	}
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = (int) $numeroRegistre;
	}
	public function setPatiente( $nomPatiente)
	{
	if ( is_string( $nomPatiente) && strlen( $nomPatiente) <= 25)
		{
			$this->_patiente = $nomPatiente;
		}
	}
	public function setEntree($dateEntree)
	{
			$this->_entree = $dateEntree;
	}
	public function setSortie($dateSortie)
	{
			$this->_sortie = $dateSortie;
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