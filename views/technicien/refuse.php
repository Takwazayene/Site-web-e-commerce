<?php
$currentPage="reservations";
include '../../base.php';
if(isset($_GET["id"])){
    $garageController->refuseReservation($_GET["id"]);
	$reservation = $garageController->getReservationsById($_GET["id"]);
	$garage = $garageController->findGarage($reservation->getIdGarage());
	$user = $userController->findUserById($reservation->getIdClient());
	$mail =$user->getEmail();
    $service = $garageController->findService($reservation->getIdService());
	$message = "Votre réservation  ".$_POST["idReservation"]." du garage ".$garage->getName()." de service ".$service->getName()." a été refusée";
	//UserController::sendEmail("Reservation Refusee",$message,$mail);
	//header( 'Location: '.curPageURL().'/views/technicien/reservations.php' );

	        $to='zayenetakwa@gmail.com';
			$sujet='Reservation service rapide !';
			$texte=$message;
			$header='From : test@gmail.com';
			mail($to,$sujet,$texte,$header);
	
			header( 'Location: '.curPageURL().'/views/technicien/reservations.php' );
}
?>
