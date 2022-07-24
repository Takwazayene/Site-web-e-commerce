<?PHP
include '../../baseAdmin.php';

if(!isset($_SESSION))
{
	session_start();
}


$livraisonL=new livraisonL();
if (isset($_POST["id"])){
	$idl=Config::getUserSession()->getId();
	//$id=$_POST["id"];
	

	$livraisonL->affecterLivraison($idl,$_POST["id"]);
	header('Location:admin/tableslivraisons.php');
	
}

?>