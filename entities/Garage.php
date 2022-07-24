<?PHP
class Garage{
	protected $id;
	protected $name;
	protected $address;
	protected $idService;

	public function __construct( ) {
		$this->id  = 0;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param mixed $address
	 */
	public function setAddress( $address ) {
		$this->address = $address;
	}

	/**
	 * @return mixed
	 */
	public function getIdService() {
		return $this->idService;
	}

	/**
	 * @param mixed $idService
	 */
	public function setIdService( $idService ) {
		$this->idService = $idService;
	}

}

