<?php
class Visite
{
	private $_numero;
	private $_registre;
	private $_date;
	private $_demande;
	private $_resultat;
	private $_observation;

	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
    public function numero( ) { return $this->_numero; }
	public function registre( ) { return $this->_registre; }
	public function date( ) { return $this->_date; }
	public function demande( ) { return $this->_demande; }
	public function resultat( ) { return $this->_resultat; }
	public function observation( ) { return $this->_observation; }

	//set attribut
	public function setNumero( $numeroVisite)
	{
		$this->_numero = ( int) $numeroVisite;
	}
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = ( int) $numeroRegistre;
	}
	public function setDate( $dateVisite)
	{
	if ( is_string( $dateVisite) && strlen( $dateVisite) <= 15)
		{
			$this->_date = $dateVisite;
		}
	}
	public function setDemande( $visiteDemande)
	{
	if ( is_string( $visiteDemande))
		{
			$this->_demande = $visiteDemande;
		}
	}
	public function setResultat( $resultat)
	{
	if ( is_string( $resultat))
		{
			$this->_resultat = $resultat;
		}
	}
	public function setObservation( $observation)
	{
	if ( is_string( $observation))
		{
			$this->_observation = $observation;
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