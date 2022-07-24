<?PHP
class ligneCommande{
	private $id;
	private $idCom;
	private $idProd;
	private $nomProd;
	private $qte;
	private $prix;
	
	function __construct($idCom,$idProd,$nomProd,$qte,$prix){
		$this->idProd=$idProd;
		$this->nomProd=$nomProd;
		$this->idCom=$idCom;
		$this->qte=$qte;
		$this->prix=$prix;
	
	}

	function getId()
	{
		return $this->id;
	}
	function setId($id)
	{
		$this->id=$id;
	}
	

	function getIdCom()
	{
		return $this->idCom;
	}
	function setIdCom($idCom)
	{
		$this->idCom=$idCom;
	}

	function getIdProd()
	{
		return $this->idProd;
	}
    function setIdProd($idProd)
    {
		$this->idProd=$idProd;
	}

	function getNomProd()
	{
		return $this->nomProd;
	}
	function setNomProd($nomProd)
	{
		$this->nomProd;
	}

    function getQte()
	{
		return $this->qte;
	}
	function setQte($qte)
	{
		$this->qte;
	}
	   function getPrix()
	{
		return $this->prix;
	}
	function setPrix($prix)
	{
		$this->prix;
	}

	



	
}

?>