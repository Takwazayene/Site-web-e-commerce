<?PHP
class Commande{
	
	private $idCom;
	private $idClt;
	//private $produit;
	private $date;
	private $livraison;
	private $quantite;
	private $total;	
    private $etat;	

	function __construct($idClt,$date,$livraison,$quantite,$total,$etat){
		//$this->idCom=$idCom;
		$this->idClt=$idClt;
		//$this->produit=$produit;
		$this->date=$date;
		$this->livraison=$livraison;
		$this->quantite=$quantite;
		$this->total=$total;
		$this->etat=$etat;
		
	}
	


	

	function getIdCom()
	{
		return $this->idCom;
	}
	function setIdCom($idCom)
	{
		$this->idCom=$idCom;
	}

	function getIdClt()
	{
		return $this->idClt;
	}
    function setIdClt($idClt)
    {
		$this->idClt=$idClt;
	}

	

    function getDate()
	{
		return $this->date;
	}
	function setDate($date)
	{
		$this->date;
	}

	function getLivraison()
	{
		return $this->livraison;
	}
	function setLivraison($livraison)
	{
		$this->livraison;
	}

	function getQuantite()
	{
		return $this->quantite;
	}
	function setQuantite($quantite)
	{
		$this->quantite;
	}

	function getTotal()
	{
		return $this->total;
	}
	function setTotal($total)
	{
		$this->total;
	}


function getEtat()
	{
		return $this->etat;
	}
	function setEtat($etat)
	{
		$this->etat;
	}

	
}

?>