<?PHP
include '../../../baseAdmin.php';
$reclamationC=new ReclamationC();
if (isset($_POST["id"])){
	$reclamationC->supprimerReclamation($_POST["id"]);
	header('Location: afficherReclamation.php');
}

?>