<?PHP
class Constructeur{
	private $id;
	private $nom;
	function __construct($nom){
		$this->nom=$nom;
	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function setNom(){
		return $this->nom;
	}	
}

?>