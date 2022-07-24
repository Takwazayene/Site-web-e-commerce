<?php
include '../../../baseAdmin.php';
if (isset($_POST["id"])){
	$userController->deleteUser($_POST["id"]);
	header( 'Location: '.curPageURL().'/views/admin/user/' );
}