<?PHP
//include "../../core/panierC.php";
include "../../base.php";
$panierC=new PanierC();
if (isset($_GET["idPanier"])){
	$panierC->supprimerPanier($_GET["idPanier"]);
	header('Location:afficherPanier.php');
} 

?>
