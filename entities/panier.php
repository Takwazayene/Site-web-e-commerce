<?PHP
class Panier{
	private $idPanier;
	private $idClient;
	private $nomProd;
	private $idProduit;
	private $quantite;
	private $prix;
	
	function __construct($idClient,$idProduit,$nomProd,$quantite,$prix)
	{
		//$this->idPanier=$idPanier;
		$this->idClient=$idClient;
		$this->idProduit=$idProduit;
		$this->nomProd=$nomProd;
		$this->quantite=$quantite;
		$this->prix=$prix;
	}
	
	function getIdPanier(){
		return $this->idPanier;
	}
	function getIdClient(){
		return $this->idClient;
	}
	function getIdProduit(){
		return $this->idProduit;
	}
	function getQuantite(){
		return $this->quantite;
	}
	function getPrix(){
		return $this->prix;
	}
		function getNomProd(){
		return $this->nomProd;
	}


	function setIdPanier($idPanier){
		$this->idPanier=$idPanier;
	}
	function setIdClient($idClient){
		$this->idClient=$idClient;
	}
	function setIdProduit($idProduit){
		$this->idProduit=$idProduit;
	}
	function setQuantite($quantite){
		$this->quantite=$quantite;
	}
	function setPrix($prix){
		$this->prix=$prix;
	}
		function setNomProd($nomProd){
		$this->nomProd=$nomProd;
	}

	
}
?>