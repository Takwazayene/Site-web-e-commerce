<?PHP
class Categorie{
	private $id;
	private $libelle;
	
	function __construct($libelle){
		$this->libelle=$libelle;
	}
	
	function getId(){
		return $this->id;
	}
	function getLibelle(){
		return $this->libelle;
	}
	function setLibelle(){
		return $this->libelle;
	}	
}

?>