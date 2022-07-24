<?PHP
//include "../entities/livraison.php";
//include "../core/livraisonL.php";
//include '../ti.php';
//include '../core/UserController.php';
//include_once '../core/Config.php';
//include '../entities/User.php';
include '../../base.php';


if(!isset($_SESSION))
{
	session_start();
}

if ( Config::getUserSession() == null ) {
	header( 'Location: ../login.php' );
} elseif ( Config::getUserSession()->getRole() != "user") {
	header( 'Location: ../profile/index.php' );
}


if (/*isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['idd']) and */isset($_POST['adresse']) and isset($_POST['description'])and isset($_POST['cite'])and isset($_POST['codep'])/*and isset($_POST['email'])and isset($_POST['numt'])*/){
	$idc=Config::getUserSession()->getId();
	$name=Config::getUserSession()->getName();
	$surname=Config::getUserSession()->getSurname();
	$number=Config::getUserSession()->getNumber();
	$email=Config::getUserSession()->getEmail();
$livraison1=new Livraison($idc,$name,$surname,$_POST['adresse'],$_POST['description'],$_POST['cite'],$_POST['codep'],$email,$number);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$livraison1L=new LivraisonL();
//$idc=Config::getUserSession()->getId();
$livraison1L->ajouterLivraison($livraison1);

header('Location: profile/afficheLivraison.php');

	//echo"saved";
}else{
	echo "vérifier les champs";
}
//*/

?>