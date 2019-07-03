<?php
class Lit
{
	private $_numero;
	private $_chambre;
	private $_occupation;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero() { return $this->_numero; }
	public function chambre() { return $this->_chambre; }
	public function occupation() { return $this->_occupation; }

	//set attribut
	public function setNumero($numeroLit)
	{
		$this->_numero = (int) $numeroLit;
	}
	public function setChambre($numeroChambre)
	{
			$this->_chambre = $numeroChambre;
	}
	public function setOccupation($occupation)
	{
	if ( is_string( $occupation) && strlen( $occupation) <= 6)
		{
			$this->_occupation = $occupation;
		}
	}

	//hydratation
	public function hydrate(array $donnees)
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