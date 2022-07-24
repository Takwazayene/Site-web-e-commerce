<?PHP
include '../../../baseAdmin.php';
$categorieC=new CategorieC();

	$categorieC->supprimerCategorie($_POST["id"]);
	header('Location: afficherCategorie.php');

?>

