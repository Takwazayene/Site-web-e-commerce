<?PHP
//include "../core/livreurC.php";
include '../../baseAdmin.php';
$livreurC=new livreurC();
if (isset($_POST["id"])){
	$livreurC->supprimerLivreur($_POST["id"]);
	header('Location:admin/tables.php');
}

?>