<?PHP
class Modele{
	private $id;
	private $nom;
	private $id_constructeur;
	
	function __construct($nom,$id_constructeur){
		$this->nom=$nom;
		$this->id_constructeur=$id_constructeur;
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
	function getIdConstructeur(){
		return $this->id_constructeur;
	}
	function setIdConstructeur(){
		return $this->id_constructeur;
	}	
}

?>