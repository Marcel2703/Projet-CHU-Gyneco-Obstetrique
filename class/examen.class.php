<?php
class Examen
{
	private $_registre;
	private $_element;
	private $_valeur;
	private $_image;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function registre( ) { return $this->_registre; }
	public function element( ) { return $this->_element; }
	public function valeur( ) { return $this->_valeur; }
	public function image( ) { return $this->_image; }

	//set attribut
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = ( int) $numeroRegistre;
	}
	public function setElement( $element)
	{
	if ( is_string( $element) && strlen( $element) <= 40)
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
	public function setImage( $lienImage)
	{
	if ( is_string( $lienImage) && strlen( $lienImage) <= 200)
		{
			$this->_image = $lienImage;
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