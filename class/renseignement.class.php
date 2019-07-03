<?php
class Renseignement
{
	private $_registre;
	private $_nom;
	private $_prenom;
	private $_naissance;
	private $_lieu;
	private $_pere;
	private $_mere;
	private $_domicile;
	private $_croyance;
	private $_profession;
	private $_situation;
	private $_contact;


	//constructeur
	public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }

	//get attribut
	public function registre( ) { return $this->_registre; }
	public function nom( ) { return $this->_nom; }
	public function prenom( ) { return $this->_prenom; }
	public function naissance( ) { return $this->_naissance; }
	public function lieu( ) { return $this->_lieu; }
	public function pere( ) { return $this->_pere; }
	public function mere( ) { return $this->_mere; }
	public function domicile( ) { return $this->_domicile; }
	public function croyance( ) { return $this->_croyance; }
	public function profession( ) { return $this->_profession; }
	public function situation( ) { return $this->_situation; }
	public function contact( ) { return $this->_contact; }

	//set attribut
	public function setRegistre( $numeroRegistre)
	{
		$this->_registre = ( int) $numeroRegistre;
	}
	public function setNom( $nomPatiente)
	{
	if ( is_string( $nomPatiente) && strlen( $nomPatiente) <= 20)
		{
			$this->_nom = $nomPatiente;
		}
	}
	public function setPrenom($prenomPatiente)
	{
	if ( is_string( $prenomPatiente) && strlen( $prenomPatiente) <= 20)
		{
			$this->_prenom = $prenomPatiente;
		}
	}
	public function setNaissance($dateNaissance)
	{
	if ( is_string( $dateNaissance) && strlen( $dateNaissance) <= 15)
		{
			$this->_naissance = $dateNaissance;
		}
	}
	public function setLieu( $lieuNaissance)
	{
	if ( is_string( $lieuNaissance) && strlen( $lieuNaissance) <= 15)
		{
			$this->_lieu = $lieuNaissance;
		}
	}
	public function setPere($nomPere)
	{
	if ( is_string( $nomPere) && strlen( $nomPere) <= 25)
		{
			$this->_pere = $nomPere;
		}
	}
	public function setMere($nomMere)
	{
	if ( is_string( $nomMere) && strlen( $nomMere) <= 25)
		{
			$this->_mere = $nomMere;
		}
	}
	public function setDomicile($domicile)
	{
	if ( is_string( $domicile) && strlen( $domicile) <= 20)
		{
			$this->_domicile = $domicile;
		}
	}
	public function setCroyance( $croyance)
	{
	if ( is_string( $croyance) && strlen( $croyance) <= 15)
		{
			$this->_croyance = $croyance;
		}
	}
	public function setProfession($profession)
	{
	if ( is_string( $profession) && strlen( $profession) <= 15)
		{
			$this->_profession = $profession;
		}
	}
	public function setSituation($situationMatrimoniale)
	{
	if ( is_string( $situationMatrimoniale) && strlen( $situationMatrimoniale) <= 15)
		{
			$this->_situation = $situationMatrimoniale;
		}
	}
	public function setContact($contact)
	{
	if ( is_string( $contact) && strlen( $contact) <= 20)
		{
			$this->_contact = $contact;
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