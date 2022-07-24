<?PHP
//include "../config.php";
//include_once dirname(__FILE__) . '/../config.php';
//include "../base.php";
class CommandeC {
function afficherCommande ($commande){
		echo "id commande: ".$commande->getIdCom()."<br>";
		echo "id client: ".$commande->getIdClt()."<br>";
		echo "date: ".$commande->getDate()."<br>";
		echo "livraison: ".$commande->getLivraison()."<br>";
			echo "quantite: ".$commande->getQuantite()."<br>";
		echo "prix total: ".$commande->getTotal()."<br>";
		echo "etat: ".$commande->getEtat()."<br>";

	}
	/*function calculerSalaire($utilisateur){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	function getIDComm ($commande)
	{
		$idCom=$commande->getIdCom() ; 
          return $idCom ; 

	}
	function ajouterCommande($commande){
		$sql="insert into commande (idCom,idClt,date,livraison,quantite,total,etat) values (:idCom,:idClt,:date,:livraison,:quantite,:total,:etat)";
		 //$idComm=mysqli_insert_id($sql);
		$db = config::getConnexion();
		try{
			
			//$idComm=mysqli_insert_id ();
		 //$idComm=$sql->insert_id;
        $req=$db->prepare($sql);
		
        
        $idCom=$commande->getIdCom();
        $idClt=$commande->getIdClt();
        $date=$commande->getDate();
        $livraison=$commande->getLivraison();
	    $quantite=$commande->getQuantite();
        $total=$commande->getTotal();
        $etat=$commande->getEtat();
		
	
		$req->bindValue(':idCom',$idCom);
		$req->bindValue(':idClt',$idClt);
		$req->bindValue(':date',$date);
		$req->bindValue(':livraison',$livraison);
			$req->bindValue(':quantite',$quantite);
		$req->bindValue(':total',$total);
		$req->bindValue(':etat',$etat);
		
            $req->execute();
           // return $idComm;
            
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCommandes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCommande($idCom){
		$sql="DELETE FROM commande where idCom= :idCom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idCom',$idCom);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCommande($commande,$idCom){
		$sql="UPDATE commande SET idCom=:idComm,idClt=:idClt,date=:date,livraison=:livraison,quantite=:quantite,total=:total,etat=:etat WHERE idCom=:idCom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idComm=$commande->getIdCom();
        $idClt=$commande->getIdClt();
        $date=$commande->getDate();
        $livraison=$commande->getLivraison();
		$quantite=$commande->getQuantite();
        $total=$commande->getTotal();
        $etat=$commande->getEtat();
		$datas = array(':idComm'=>$idComm, ':idCom'=>$idCom, ':idClt'=>$idClt,':date'=>$date,':livraison'=>$livraison,':quantite'=>$quantite,':total'=>$total,':etat'=>$etat);
		$req->bindValue(':idComm',$idComm);
		$req->bindValue(':idCom',$idCom);
		$req->bindValue(':idClt',$idClt);
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
	
	
	    function rechercher($s)
    {
         $query = "select * from commande where idCom LIKE ?";
		 	$db = config::getConnexion();
         $result = $db->prepare($query);
         $result->bindValue(1, "%$s%", PDO::PARAM_STR);
         $result->execute();
           return $result->fetchAll();
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

    function maxid()
    {
       $sql="SELECT max(idCom) FROM commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $sql;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }

 function traiterCommande($idCom)
 {
 	$sql = "UPDATE commande SET etat=1  where idCom=".$idCom;
		$db = Config::getConnexion();
		$req=$db->prepare($sql);
		try {
			$req->execute();
			return true;
		}
		catch (Exception $e){
			return $e->getMessage();
		}
	}




 function filtrerCommande($f) 
 {

       $query = "select * from commande where etat LIKE ?";
		 	$db = config::getConnexion();
         $result = $db->prepare($query);
         $result->bindValue(1, "%$f%", PDO::PARAM_STR);
         $result->execute();
           return $result->fetchAll();


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