<?php
class Operation
{
	private $_numero;
	private $_acte;
	private $_registre;
	private $_operateur;
	private $_dateTime;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero( ) { return $this->_numero; }
	public function acte( ) { return $this->_acte; }
	public function registre( ) { return $this->_registre; }
	public function operateur( ) { return $this->_operateur; }
	public function dateTime( ) { return $this->_dateTime; }

	//set attribut
	public function setNumero( $numeroOperation)
	{
		$this->_numero = (int) $numeroOperation;
	}
	public function setActe( $numeroActe)
	{
		$this->_acte = (int) $numeroActe;
	}
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = (int) $numeroRegistre;
	}
	public function setOperateur( $nomOperateur)
	{
	if ( is_string( $nomOperateur) && strlen( $nomOperateur) <= 25)
		{
			$this->_operateur = $nomOperateur;
		}
	}
	public function setDateTime($dateTime)
	{
			$this->_dateTime = $dateTime;
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