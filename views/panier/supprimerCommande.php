<?PHP
//include "../../core/commandeC.php";
include "../../base.php";
$ligneCommandeC=new LigneCommandeC();
if (isset($_GET["id"])){
	$ligneCommandeC->supprimerLigneCommande($_GET["id"]);
	header('Location: afficherCommande.php');
}

?>


