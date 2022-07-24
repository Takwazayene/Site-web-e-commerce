<?PHP
//include "../entities/commande.php";
//include "../core/commandeC.php";
include '../../../baseAdmin.php';

 $commandeC=new CommandeC();
if (isset($_GET['idCom'])){
  $commandeC->traiterCommande($_GET["idCom"]);
  header('Location: afficherCommande.php');
}
?>

  

