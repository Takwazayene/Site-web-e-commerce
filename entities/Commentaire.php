<?PHP
class Commentaire{
	private $id;
	private $id_produit;
	private $id_visiteur;
	private $comment;
	private $date;
	private $jaime;
	
	function __construct($id_produit,$id_visiteur,$comment,$date,$jaime){
		$this->id_produit=$id_produit;
		$this->id_visiteur=$id_visiteur;
		$this->comment=$comment;
		$this->date=$date;
		$this->jaime=$jaime;
	}
	
	function getId(){
		return $this->id;
	}
	function getId_produit(){
		return $this->id_produit;
	}
	function setId_produit(){
		return $this->id_produit;
	}	
	function getId_visiteur(){
		return $this->id_visiteur;
	}
	function setId_visiteur(){
		return $this->id_visiteur;
	}	
	function getComment(){
		return $this->comment;
	}
	function setComment(){
		return $this->comment;
	}	
	function getDate(){
		return $this->date;
	}
	function setDate(){
		return $this->date;
	}	
	function getJaime(){
		return $this->jaime;
	}
	function setJaime(){
		return $this->jaime;
	}	
}

?>