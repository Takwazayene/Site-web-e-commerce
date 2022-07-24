<?PHP
include '../../../baseAdmin.php';
$constructeurC=new ConstructeurC();

	$constructeurC->supprimerConstructeur($_POST["id"]);
	header('Location: afficherConstructeur.php');

?>

