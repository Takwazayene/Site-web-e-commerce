<?PHP
//include_once "../../core/ProduitC.php";
//include_once "../../entities/Produit.php";
//include_once "../../base.php" ; 
include_once dirname(__FILE__) . '/../../base.php';
//include_once dirname(__FILE__) . '/../../entities/Produit.php' ;
//include_once dirname(__FILE__) .  '/../../core/ProduitC.php';

 if(config::getUserSession()==null) {
        header('Location: ../login.php');
    }
$user = config::getUserSession();
$idUser=$user->getId() ; 

$qte=1 ;
if (isset($_GET['id'])){



$panier2C=new PanierC();
$panier3C=new PanierC();
	$produitC=new ProduitC();
    $result=$produitC->recupererProduit($_GET['id']);
	foreach($result as $row){
		
		$id=$row['id'];
		$reference=$row['reference'];
		$nom=$row['nom'] ;
		$prix=$row['prix'];
		//$qte=$row['qte'];
		$description=$row['description'];
		$constructeur=$row['constructeur'];
		$modele=$row['modele'];
		$image=$row['image'];
		$categorie_id=$row['categorie_id'];
	}
	

	$nbre=$panier2C->afficherPaniersByIDandProd($idUser,$id);
	if($nbre>0)
{
  $listePaniers=$panier3C->afficherPaniers2($idUser,$id);
  foreach($listePaniers as $row){

     $idPanier=$row["idPanier"]; 
     $qtei= $row["quantite"];
  

}
 $qte= $qtei+1;
$panier3C->setStock($idPanier,$qte);
header('Location:afficherPanier.php');
}

else{

	$panier1=new panier($idUser,$id,$nom,$qte,$prix);
	//var_dump($panier1);
	$panier1C=new PanierC();
$panier1C->ajouterPanier($panier1,$id);
	
//}
header('Location:afficherPanier.php');


}


}

?>