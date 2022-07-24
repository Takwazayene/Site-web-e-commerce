<?PHP
class Livraison{
	private $id;
	private $nom;
	private $prenom;
	private $adresse;
	private $description;
	private $cite;
	private $codep;
	private $email;
	private $numt;
	private $idClt;
	function __construct($idClt,$nom,$prenom,$adresse,$description,$cite,$codep,$email,$numt){
		$this->idClt=$idClt;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
		$this->description=$description;
		$this->cite=$cite;
		$this->codep=$codep;
		$this->email=$email;
		$this->numt=$numt;
	}
	
	function getId(){
		return $this->id;
	}

	function getIdClt(){
		return $this->idClt;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getDescription(){
		return $this->description;
	}
	function getCite(){
		return $this->cite;
	}
	function getCodep(){
		return $this->codep;
	}
	function getEmail(){
		return $this->email;
	}
	function getNumt(){
		return $this->numt;
	}

 function setId($id){
		$this->id=$id;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	function setDescription($description){
		$this->description=$description;
	}
	function setCite($cite){
		$this->cite=$cite;
	}
	function setCodep($codep){
		$this->codep=$codep;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setNumt($numt){
		$this->numt=$numt;
	}
	function setIdClt($idClt){
		$this->idClt=$idClt;
	}
	
	
}

?>