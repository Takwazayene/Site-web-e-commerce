<?php
class GarageController {
	function findGarage($id){
		$sql="SELECT * from garage where id=".$id;
		$db = Config::getConnexion();
		try{
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			if(empty($row["id"]))
				return null;
			else{
				$garage = new Garage();
				$garage->setId($row["id"]);
				$garage->setName($row["name"]);
				$garage->setAddress($row["address"]);
				$garage->setIdService($row["id_service"]);
				return $garage  ;
			}
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}
	function findGarageByName($name){
		$sql="SELECT * from garage where name like '%".$name."%'";
		$db = Config::getConnexion();
		$stmt = $db->prepare($sql);
	//	$stmt->bindValue(":name",$name);
		try{
			return $db->query($sql);
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}
	function getGarages() {
		$sql = "SElECT * From garage";
		$db  = Config::getConnexion();
		try {
			$liste = $db->query( $sql );
			return $liste;
		} catch ( Exception $e ) {
			die( 'Erreur: ' . $e->getMessage() );
		}
	}
	function updateGarage(Garage $garage){
		try {
			$sql = "UPDATE garage SET name='".$garage->getName()."', address='".$garage->getAddress()
				."', id_service='".$garage->getIdService()."' where id=".$garage->getId();
			$this->executeSql( $sql );
			return true;
		}
		catch (Exception $e){

			return $e->getMessage().' '.$sql;
		}
	}
	function addGarage(Garage $garage) {
		try {
			$sql = "insert into garage (id,name,address,id_service) values (null,:name,:addr,:ids)";
			$db = Config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':name',$garage->getName());
			$req->bindValue(':addr',$garage->getAddress());
			$req->bindValue(':ids',$garage->getIdService());
			$req->execute();
			return true;
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}
	function deleteGarage($id){
		$sql="delete from garage where id=".$id;
		$this->executeSql($sql);
		return $sql;
	}
	function executeSql($sql){
		$db = Config::getConnexion();
		$req=null;
		try{
			$req=$db->prepare($sql);
			$s=$req->execute();
		}
		catch (Exception $e){
			var_dump(" Erreur ! ".$e->getMessage());
		}
	}

	function getServices() {
		$sql = "SElECT * From service";
		$db  = Config::getConnexion();
		try {
			$liste = $db->query( $sql );
			return $liste;
		} catch ( Exception $e ) {
			die( 'Erreur: ' . $e->getMessage() );
		}
	}
	function findService($id) {
		$sql="SELECT * from service	 where id=".$id;
		$db = Config::getConnexion();
		try{
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			if(empty($row["id"]))
				return null;
			else{
				$service = new Service();
				$service->setId($row["id"]);
				$service->setName($row["name"]);
				return $service  ;
			}
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}

	function getReservationsByUser($idu) {
		$sql = "SElECT * From reservation where id_client=".$idu;
		$db  = Config::getConnexion();
		try {
			$liste = $db->query( $sql );
			return $liste;
		} catch ( Exception $e ) {
			die( 'Erreur: ' . $e->getMessage() );
		}
	}
	function getAllReservation() {
		$sql = "SElECT * From reservation ";
		$db  = Config::getConnexion();
		try {
			$liste = $db->query( $sql );
			return $liste;
		} catch ( Exception $e ) {
			die( 'Erreur: ' . $e->getMessage() );
		}
	}
	function getReservationsByTechnicien($idu) {
		$sql = "SElECT * From reservation where id_technicien=".$idu;
		$db  = Config::getConnexion();
		try {
			$liste = $db->query( $sql );
			return $liste;
		} catch ( Exception $e ) {
			die( 'Erreur: ' . $e->getMessage() );
		}
	}
	function getReservationsById($id) {
		$sql = "SElECT * From reservation where id=".$id;
		$db = Config::getConnexion();
		try{
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			if(empty($row["id"]))
				return null;
			else{
				$reservation = new Reservation();
				$reservation->setId($row['id']);
				$reservation->setDateBegin($row['date_begin']);
				$reservation->setDateEnd($row['date_end']);
				$reservation->setIdGarage($row['id_garage']);
				$reservation->setIdService($row['id_service']);
				$reservation->setIdTechnicien($row['id_technicien']);
				$reservation->setStatus($row['status']);
				$reservation->setIdClient($row["id_client"]);
				return $reservation  ;
			}
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}
	function addReservation(Reservation $reservation){
		try {
			$sql = "insert into reservation (id,status,date_begin,date_end,id_technicien,id_client,id_garage,id_service)
 			values (null,:status,:dateb,:datee,:idt,:idc,:idg,:ids)";
			$db = Config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':status',"wait");
			$req->bindValue(':dateb',$reservation->getDateBegin());
			$req->bindValue(':datee',null);
			$req->bindValue(':idt',$reservation->getIdTechnicien());
			$req->bindValue(':idc',$reservation->getIdClient());
			$req->bindValue(':idg',$reservation->getIdGarage());
			$req->bindValue(':ids',$reservation->getIdService());
			$req->execute();
			return true;
		}
		catch (Exception $e){
			return $e->getMessage().' '.$sql;
		}
	}
	function refuseReservation($id){
		$sql = "UPDATE reservation SET status='refused' where id=".$id;
		$db = Config::getConnexion();
		$req=$db->prepare($sql);
		try {
			$req->execute();
			return true;
		}
		catch (Exception $e){
			return $e->getMessage();
		}
	}

	function acceptReservation($id,$datef){
		$sql = "UPDATE reservation SET status='accepted', date_end='$datef' where id=".$id;
		$db = Config::getConnexion();
		$req=$db->prepare($sql);
		try {
			$req->execute();
			return true;
		}
		catch (Exception $e){
			return $e->getMessage();
		}
	}

}