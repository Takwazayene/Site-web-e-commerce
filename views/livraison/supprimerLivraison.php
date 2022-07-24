<?PHP
include '../../baseAdmin.php';
$livraisonL=new livraisonL();
if (isset($_POST["id"])){
	$livraisonL->supprimerLivraison($_POST["id"]);
		header('Location:admin/tableslivraisons.php');
	
}

?>