<?PHP
//include_once "config.php";
//include_once dirname(__FILE__) . '/../config.php';
class PanierC {
function afficherPanier ($Panier)
    {
		echo "IdPanier: ".$Panier->getIdPanier()."<br>";
		echo "IdClient: ".$Panier->getIdClient()."<br>";
		echo "NomProd: ".$Panier->getNomProd()."<br>";
		echo "IdArticle: ".$Panier->getIdProduit()."<br>";
		echo "Quantite: ".$Panier->getQuantite()."<br>";
		echo "Prix: ".$Panier->getPrix()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/

	function ajouterPanier($Panier,$id)
	{   
		
		$sql="insert into panier (idPanier,idClient,nomProd,idProduit,quantite,prix) values (:idPanier,:idClient,:nomProd,:idProduit,:quantite,:prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idPanier=$Panier->getIdPanier();
        $idClient=$Panier->getIdClient();
        $nomProd=$Panier->getNomProd();
        $idProduit=$Panier->getIdProduit();
        $quantite=$Panier->getQuantite();
        $prix=$Panier->getPrix();
		$req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':nomProd',$nomProd);
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':prix',$prix);
		
		
            $req->execute();



           
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
            
        }
    }
    
    
    
		
	
	
	/*	function ajouterPanier2()
	{
		
		$sql="insert into panier (idPanier,idClient,idProduit,quantite,prix) values (:idPanier,:idClient,:idProduit,:quantite,:prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idPanier=$Panier->getIdPanier();
        $idClient=$Panier->getIdClient();
        $idProduit=$Panier->getIdProduit();
        $quantite=$Panier->getQuantite();
        $prix=$Panier->getPrix();
		$req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':prix',$prix);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}*/
	
	function afficherPaniers()
	{
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
		function supprimerPanier($idPanier)
	{
		$sql="DELETE FROM panier where idPanier= :idPanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idPanier',$idPanier);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function modifierPanier($panier,$idPanier){
		$sql="UPDATE panier SET idPanier=:iddPanier,idClient=:idClient,nomProd=:nomProd,idProduit=:idProduit,quantite=:quantite,prix=:prix WHERE idPanier=:idPanier";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$iddPanier=$panier->getIdPanier();
        $idProduit=$panier->getIdProduit();
        $nomProd=$panier->getNomProd();
        $quantite=$panier->getQuantite();
        $prix=$panier->getPrix();
        $idClient=$panier->getIdClient();
		$datas = array(':iddPanier'=>$iddPanier, ':idPanier'=>$idPanier,':idClient'=>$idClient, ':idProduit'=>$idProduit,':nomProd'=>$nomProd,
			':quantite'=>$quantite,':prix'=>$prix);
		$req->bindValue(':iddPanier',$iddPanier);
		$req->bindValue(':idPanier',$idPanier);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':nomProd',$nomProd);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':prix',$prix);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}

function recupererPanier($idPanier){
		$sql="SELECT * from panier where idPanier=$idPanier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
function rechercherPanier($idClient){
		$sql="SELECT * from panier where idClient=$idClient";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function afficherPaniersByID($id) {

	$sql="SElECT * from panier where idClient=$id";
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }


}

 function afficherPaniersByIDandProd($id,$idProd)
 {
  $sql="SElECT count(*) from panier where idClient=$id AND idProduit=$idProd";
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		$result = $liste->fetch();
        $count = $result[0];
		return $count;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
     /*$num_of_rows = $liste->rowCount() ;
     return $num_of_rows ;*/


 }

 function afficherPaniers2($idUser,$id)
 {

  $sql="SElECT * from panier where idClient=$idUser AND idProduit=$id";
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

 }


		function supprimerAllPanier($idPanier)
	{
		$sql="DELETE FROM panier where idPanier= :idPanier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idPanier',$idPanier);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}



			function setStock($idPanier,$qte){
		$sql="UPDATE Panier SET quantite=$qte WHERE idPanier=$idPanier";
		
		$db = config::getConnexion();
		
try{		
        $req=$db->prepare($sql);
	   
		$req->bindValue(':qte',$qte);
		
            $s=$req->execute();
			
       
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  //print_r($datas);
        }
		
	}




 	function filtrerPanier($nomProd)

	{ $sql="SElECT * from panier where nomProd=$nomProd ";
		
		$db = config::getConnexion();
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}



	
	
}

?>