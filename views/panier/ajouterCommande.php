<?php
include '../../base.php' ;
if (isset($_POST['passerCommande']) ){
$db = config::getConnexion();
$idClt = $_POST['idClt'] ; 
$date=date("y-m-d") ;
$livraison="non";
$etat=0 ; 
$total=$_POST['total'];
$verif=0;

$panier1C=new PanierC();
$panier2C=new PanierC();
$listePaniers=$panier1C->afficherPaniersByID($idClt);


$produit1C=new ProduitC();
//$listeproduit=$produitC->afficherProduitsByID();

/*foreach ($stock as $key  ) {

	
$stock1=$key['stock']-$_POST['quantity'];
$produit->setstock($ref_prod,$stock1);
}




$employe1=new employe($_POST['cin'],$_POST['nom'],$_POST['prenom'],$_POST['nbH'],$_POST['tarifH']);


//Partie3
$employe1C=new EmployeC();
$employe1C->ajouterEmploye($employe1);*/



foreach($listePaniers as $row){
$idPanier=$row["idPanier"]; 
$idProd=$row["idProduit"]; 
$qte= $row["quantite"];
$prix= $row["prix"];
$nomProd=$row["nomProd"];
$listeProduit=$produit1C->recupererProduit($idProd);
foreach($listeProduit as $row){

if ($row['qte']<$qte)
{  
$total=$total-$prix*$qte;
   ?>
   <script type="text/javascript">

</script>
<?php
  echo '<script>alert("Vous devez vous identifiez!" )';
    echo "<script>notifyMe('".$nomProd."' )</script>";

}
else {
$stock=$row['qte']-$qte;
$produit1C->setStock($idProd,$stock);



//echo $stock ;

if($verif==0){
$commande1=new commande($idClt,$date,$livraison,$qte,$total,$etat);
$commande1C=new CommandeC();
$commande1C->ajouterCommande($commande1);

$idCom=$db->lastInsertId();
//$idCom= 9 ;
$verif=1;
}

 
$ligneCommande1=new ligneCommande($idCom,$idProd,$nomProd,$qte,$prix);
$ligneCommande1C=new LigneCommandeC();
$ligneCommande1C->ajouterLigneCommande($ligneCommande1); 
$panier1C->supprimerPanier($idPanier);

	}

}

}

header('Location: afficherPanier.php');
}

?>