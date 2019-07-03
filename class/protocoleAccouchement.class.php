<?php
class ProtocoleAccouchement
{
	private $_operation;
	private $_bebe;
	private $_element;
	private $_valeur;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function operation( ) { return $this->_operation; }
	public function bebe( ) { return $this->_bebe; }
	public function element( ) { return $this->_element; }
	public function valeur( ) { return $this->_valeur; }

	//set attribut
	public function setOperation( $numeroOperation)
	{
		$this->_operation = ( int) $numeroOperation;
	}
	public function setBebe( $numeroBebe)
	{
		$this->_bebe = ( int) $numeroBebe;
	}
	public function setElement( $element)
	{
	if ( is_string( $element) && strlen( $element) <= 80)
		{
			$this->_element = $element;
		}
	}
	public function setValeur( $valeur)
	{
	if ( is_string( $valeur) && strlen( $valeur) <= 80)
		{
			$this->_valeur = $valeur;
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