<?PHP
//include "../config.php";
//include_once dirname(__FILE__) . '/../config.php';
class LigneCommandeC {
function afficherCommande ($commande){
		echo "id commande: ".$commande->getIdCom()."<br>";
		echo "id client: ".$commande->getIdClt()."<br>";
		echo "id produit: ".$commande->getProduit()."<br>";
		echo "date: ".$commande->getDate()."<br>";
		echo "livraison: ".$commande->getLivraison()."<br>";
			echo "quantite: ".$commande->getQuantite()."<br>";
		echo "prix total: ".$commande->getTotal()."<br>";
		echo "etat: ".$commande->getEtat()."<br>";
	}
	/*function calculerSalaire($utilisateur){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	function ajouterLigneCommande($ligneCommande){
		$sql="insert into lignecommande (id,idCom,idProd,nomProd,qte,prix) values (:id,:idCom,:idProd,:nomProd,:qte,:prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

		$id=$ligneCommande->getId();
        $idCom=$ligneCommande->getIdCom();
        $idProd=$ligneCommande->getIdProd();
        $nomProd=$ligneCommande->getNomProd();
        $qte=$ligneCommande->getQte();
        $prix=$ligneCommande->getPrix();

		$req->bindValue(':id',$id);
		$req->bindValue(':idCom',$idCom);
		$req->bindValue(':idProd',$idProd);
		$req->bindValue(':nomProd',$nomProd);
		$req->bindValue(':qte',$qte);
		$req->bindValue(':prix',$prix);

			
            $req->execute();
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande";
		// $sql='SELECT * FROM commande  ORDER BY total';
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLigneCommande($id){
		$sql="DELETE FROM lignecommande where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCommande($commande,$idCom){
		$sql="UPDATE commande SET idCom=:idComm,idClt=:idClt,produit=:produit,date=:date,livraison=:livraison,quantite=:quantite,total=:total,etat=:etat WHERE idCom=:idCom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idComm=$commande->getIdCom();
        $idClt=$commande->getIdClt();
        $produit=$commande->getProduit();
        $date=$commande->getDate();
        $livraison=$commande->getLivraison();
		$quantite=$commande->getQuantite();
        $total=$commande->getTotal();
        $etat=$commande->getEtat();
		$datas = array(':idComm'=>$idComm, ':idCom'=>$idCom, ':idClt'=>$idClt,':produit'=>$produit,':date'=>$date,':livraison'=>$livraison,':quantite'=>$quantite,':total'=>$total,':etat'=>$etat);
		$req->bindValue(':idComm',$idComm);
		$req->bindValue(':idCom',$idCom);
		$req->bindValue(':idClt',$idClt);
		$req->bindValue(':produit',$produit);
		$req->bindValue(':date',$date);
		$req->bindValue(':livraison',$livraison);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':total',$total);
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererCommande($idCom){
		$sql="SELECT * from commande where (idCom='$idCom')";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
 function trierCommande($s)
    {
         	
		if ($s == "date") $sql = "SELECT * from commande order by date desc";
      else if ($s == "quantite") $sql = "SELECT * from commande order by quantite desc";
      else if ($s== "total") $sql = "SELECT * from commande order by total desc";
	  
	  $db = config::getConnexion();
	         // $req=$db->prepare($sql);
		/*try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	*/
		
		 /*$result = $db->prepare($sql);
         $result->execute();
           return $result->fetchAll();*/
		    $result = $db->prepare($sql);
         $result->bindValue(1, "%$s%", PDO::PARAM_STR);
         $result->execute();
           return $result->fetchAll();
        
		    
    }



    function afficherCommandesByID($id) {

	$sql="SElECT * from ligneCommande l inner join commande c  on l.idCom= c.idCom where c.idClt=$id ";

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




    function afficherLCToadmin($id) {

	$sql="SElECT * from lignecommande where idCom=$id ";

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


  function trierListeCommande($s,$id)
    {
         	
		if ($s == "id") $sql = "SELECT * from lignecommande where idCom=$id order by id desc  ";
      else if ($s == "qte") $sql = "SELECT * from lignecommande   where idCom=$id order by qte desc ";
      else if ($s== "prix") $sql = "SELECT * from lignecommande where idCom=$id order by prix desc  ";
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





	
	/*function rechercherListeUtilisateurs($tarif){
		$sql="SELECT * from utilisateurs where id=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}


?>