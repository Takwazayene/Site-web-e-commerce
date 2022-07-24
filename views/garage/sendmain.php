<?php
$currentPage="garage";
include '../../base.php';
$var = UserController::sendEmail();
echo  $var;
//header( 'Location: '.curPageURL().'/views/garage/reservations.php' );

?>