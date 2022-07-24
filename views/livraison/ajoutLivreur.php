<?PHP
//include "../entities/livreur.php";
//include "../entities/livreurUser.php";
//include "../core/livreurC.php";
include "../../baseAdmin.php";



if (isset($_POST['name']) and isset($_POST['id']) and isset($_POST['number']) and isset($_POST['email']) and isset($_POST['website'])and isset($_POST['occupation'])and isset($_POST['password'])and isset($_POST['phone'])){
$livreur1=new Livreur($_POST['name'],$_POST['id'],$_POST['email'],$_POST['number'],$_POST['website'],$_POST['occupation'],$_POST['password'],$_POST['phone']);
$livreuruser1=new LivreurUser($_POST['id'],$_POST['username'],$_POST['name'],$_POST['surname'],$_POST['email'],$_POST['password'],$_POST['occupation'],$_POST['phone']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$livreur1C=new LivreurC();

//$test=$livreur1C->recupererLivreur($_POST['id']);
$testn=$livreur1C->recupererLivreurNom($_POST['name']);
//$testt=$livreur1C->recupererLivreurTel($_POST['phone']);
//$teste=$livreur1C->recupererLivreurEmail($_POST['email']);


//if ($test){
	//echo "
	//<script>
	//alert('id existe deja');
	//</script>
	//";
	//}
if ($testn){
	echo "
	<script>
	alert('nom existe deja');
	</script>
	";
	}
/*if ($testt){
	echo "
	<script>
	alert('numero de telephone existe deja');
	</script>
	";
	}
if ($teste){
	echo "
	<script>
	alert('adresse email existe deja');
	</script>
	";
	}*/
	else{
			$livreur1C->ajouterLivreur($livreur1);
			$livreur1C->ajouterLivreurUser($livreuruser1);

				header('Location: admin/tables.php');

	
		}	
		}	
		else{
				echo "vérifier les champs";
		}

//*/

?>