<?PHP
class Reservation{
	protected $id;
	protected $idClient;
	protected $idTechnicien;
	protected $idGarage;
	protected $idService;
	protected $dateBegin;
	protected $dateEnd;
	protected $status;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getIdClient() {
		return $this->idClient;
	}

	/**
	 * @param mixed $idClient
	 */
	public function setIdClient( $idClient ) {
		$this->idClient = $idClient;
	}

	/**
	 * @return mixed
	 */
	public function getIdTechnicien() {
		return $this->idTechnicien;
	}

	/**
	 * @param mixed $idTechnicien
	 */
	public function setIdTechnicien( $idTechnicien ) {
		$this->idTechnicien = $idTechnicien;
	}



	/**
	 * @return mixed
	 */
	public function getIdGarage() {
		return $this->idGarage;
	}

	/**
	 * @param mixed $idGarage
	 */
	public function setIdGarage( $idGarage ) {
		$this->idGarage = $idGarage;
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

	/**
	 * @return mixed
	 */
	public function getDateBegin() {
		return $this->dateBegin;
	}

	/**
	 * @param mixed $dateBegin
	 */
	public function setDateBegin( $dateBegin ) {
		$this->dateBegin = $dateBegin;
	}

	/**
	 * @return mixed
	 */
	public function getDateEnd() {
		return $this->dateEnd;
	}

	/**
	 * @param mixed $dateEnd
	 */
	public function setDateEnd( $dateEnd ) {
		$this->dateEnd = $dateEnd;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus( $status ) {
		$this->status = $status;
	}

}

