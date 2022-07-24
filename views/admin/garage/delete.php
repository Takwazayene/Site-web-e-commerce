<?php
include '../../../baseAdmin.php';
if (isset($_POST["id"])){
	$garageController->deleteGarage($_POST["id"]);
		header( 'Location: '.curPageURL().'/views/admin/garage/' );
}