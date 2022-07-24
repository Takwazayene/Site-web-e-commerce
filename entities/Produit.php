<?PHP
class Produit{
	private $id;
	private $nom;
	private $reference;
	private $prix;
    private $datea;
	private $qte;
	private $constructeur ;
	private $modele;
    private $image;
    private $categorie_id ;	
    private $description ;	
	
	
	function __construct($reference,$nom,$prix,$datea,$qte,$constructeur,$modele,$image,$categorie_id,$description){
		$this->reference=$reference;
		$this->nom=$nom;
	    $this->prix=$prix;
		$this->datea=$datea;
		$this->qte=$qte;
	    $this->constructeur=$constructeur;
		$this->modele=$modele;
		$this->image=$image;
		$this->categorie_id=$categorie_id;
		$this->description=$description;
	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getReference(){
		return $this->reference;
	}
	function getDatea(){
		return $this->datea;
	}
	function getPrix(){
		return $this->prix;
	}
	function getQte(){
		return $this->qte;
	}
	function getConstructeur(){
		return $this->constructeur;
	}
	function getModele(){
		return $this->modele;
	}
	function getImage(){
		return $this->image;
	}
	function getCategorie_id(){
		return $this->categorie_id;
	}
	function getDescription(){
		return $this->description;
	}
	 function setReference(){
		return $this->reference;
	}
	function setPrix(){
		return $this->prix;
	}
	function setQte(){
		return $this->qte;
	}
	function setConstructeur(){
		return $this->constructeur;
	}
	function setModele(){
		return $this->modele;
	}
	function setImage(){
		return $this->image;
	}
	function setCategorie_id(){
		return $this->categorie_id;
	}
	function setDescription(){
		return $this->description;
	}
	function setNom(){
		return $this->nom;
	}
	function setDatea(){
		return $this->datea;
	}
	
}
?>