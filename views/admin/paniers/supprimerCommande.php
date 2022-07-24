<?PHP
//include "../core/commandeC.php";
include '../../../baseAdmin.php';
$commandeC=new CommandeC();
if (isset($_POST["idCom"])){
	$commandeC->supprimerCommande($_POST["idCom"]);
	header('Location: afficherCommande.php');
}

?>