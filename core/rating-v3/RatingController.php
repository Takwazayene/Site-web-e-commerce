<?php

class RatingController{

	public static function isRated($idu,$idg){
		// opreparation d'une requete
		$query = "select * from rating where user_id = $idu and garage_id = $idg";
		/// execution d'une reqquete sql
		$db  = config::getConnexion();
		$list = $db->query( $query );
		if($list->rowCount()>0)
			return true;
		else
			return false;

	}

	public static function getRating($idg){
		// opreparation d'une requete
		$query = "select avg(rating) as total from rating where garage_id =$idg Group by (garage_id)";
		/// execution d'une reqquete sql
		$db  = config::getConnexion();
		$list = $db->query( $query );
		$r = $list->fetch();
		return $r["total"];
	}


}