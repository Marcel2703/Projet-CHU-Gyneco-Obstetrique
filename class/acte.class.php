<?php
class Acte
{
	private $_numero;
	private $_designation;
	private $_mention;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function numero( ) { return $this->_numero; }
	public function designation( ) { return $this->_designation; }
	public function mention( ) { return $this->_mention; }

	//set attribut
	public function setNumero( $numeroActe)
	{
		$this->_numero = ( int) $numeroActe;
	}
	public function setDesignation( $designation)
	{
	if ( is_string( $designation) && strlen( $designation) <= 15)
		{
			$this->_designation = $designation;
		}
	}
	public function setMention($mention)
	{
			$this->_mention = $mention;
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