<?PHP
class Reclamation{
	private $id;
	private $nom;
	private $prenom;
	private $adresse;
	private $cp;
	private $ville;
	private $email;
	private $phone;
        private $sujet;
	function __construct($nom,$prenom,$adresse,$cp,$ville,$email,$phone,$sujet){		
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
		$this->cp=$cp;
		$this->ville=$ville;
		$this->email=$email;
		$this->phone=$phone;
        $this->sujet=$sujet;
	}
	
	function getId(){
		return $this->id;
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
	function getCp(){
		return $this->cp;
	}
	function getEmail(){
		return $this->email;
	}
	function getPhone(){
		return $this->phone;
	}
	function getVille(){
		return $this->ville;
	}
         function getSujet(){
		return $this->sujet;
	}
	
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	function setCp($cp){
		$this->cp=$cp;
	}
        function setVille($ville){
		$this->ville=$ville;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setPhone($phone){
		$this->phone=$phone;
	}
       function setSujet($sujet){
		$this->sujet=$sujet;
	}

}

?>