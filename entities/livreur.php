<?PHP
class Livreur{
	private $nom;
	private $id;
	private $email;
	private $numero;
	private $web;
	private $role;
	private $mdp;
	private $tel;
	function __construct($nom,$id,$email,$numero,$web,$role,$mdp,$tel){
		$this->nom=$nom;
		$this->id=$id;
		$this->email=$email;
		$this->numero=$numero;
		$this->web=$web;
		$this->role=$role;
		$this->mdp=$mdp;
		$this->tel=$tel;
	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getEmail(){
		return $this->email;
	}
	function getNumero(){
		return $this->numero;
	}
	function getWeb(){
		return $this->web;
	}
	function getRole(){
		return $this->role;
	}
	function getMdp(){
		return $this->mdp;
	}
	function getTel(){
		return $this->tel;
	}




	function setNom($nom){
		$this->nom=$nom;
	}
	function setEmail($email){
		$this->email;
	}
	function setNumero($numero){
		$this->numero=$numero;
	}
	function setWeb($web){
		$this->web=$web;
	}
	function setRole($role){
		$this->role=$role;
	}
	function setMdp($mdp){
		$this->mdp=$mdp;
	}
	function setTel($tel){
		$this->email=$email;
	}
	
}

?>