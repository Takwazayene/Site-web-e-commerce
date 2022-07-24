<?PHP
//include "config1.php";
class LivraisonL {
function afficherLivraison ($livraison){
		echo "id: ".$livraison->getId()."<br>";
		echo "Nom: ".$livrasion->getNom()."<br>";
		echo "Prénom: ".$livrasion->getPrenom()."<br>";
		echo "Adresse: ".$Livrasion->getAdresse()."<br>";
		echo "Description: ".$Livrasion->getDescription()."<br>";
		echo "Cité: ".$Livrasion->getCite()."<br>";
		echo "Code postal: ".$Livrasion->getCodep()."<br>";
		echo "E-mail: ".$Livrasion->getEmail()."<br>";
		echo "Numero de telephone: ".$Livrasion->getNumt()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();*/
	
	function ajouterLivraison($livraison){
		
		$sql="insert into livraisons (id,idClt,nom,prenom,adresse,description,cite,codep,email,numt,datel) values (:id,:idClt, :nom, :prenom, :adresse, :description, :cite, :codep, :email, :numt, :datel)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$datel = date('Y-m-d H:i:s');
        $id=$livraison->getId();
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $adresse=$livraison->getAdresse();
        $description=$livraison->getDescription();
        $cite=$livraison->getCite();
        $codep=$livraison->getCodep();
        $email=$livraison->getEmail();
        $numt=$livraison->getNumt();
        $idClt=$livraison->getIdClt();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':description',$description);
		$req->bindValue(':cite',$cite);
		$req->bindValue(':codep',$codep);
		$req->bindValue(':email',$email);
		$req->bindValue(':numt',$numt);
		$req->bindValue(':datel',$datel);
		$req->bindValue(':idClt',$idClt);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function affecterLivraison($idl,$id){
		
		$sql=$sql="UPDATE livraisons SET idl=:idl WHERE id=:id";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		
		$req->bindValue(':idl',$idl);
		$req->bindValue(':id',$id);

		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivraisons(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * from livraisons";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function supprimerLivraison($id){
		$sql="DELETE FROM livraisons where id= :id";
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
	function modifierLivraison($livraison,$id){
		$sql="UPDATE livraisons SET id=:idd,idClt=:idClt, nom=:nom,prenom=:prenom,adresse=:adresse,description=:description,adresse=:adresse,cite=:cite,codep=:codep,email=:email,numt=:numt WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{	
		$req=$db->prepare($sql);
        $idd=$livraison->getId();
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $adresse=$livraison->getAdresse();
        $description=$livraison->getDescription();
        $cite=$livraison->getCite();
        $codep=$livraison->getCodep();
        $email=$livraison->getEmail();
        $numt=$livraison->getNumt();
           $idClt=$livraison->getIdClt();
		$datas = array(':idd'=>$idd, ':id'=>$id,':idClt'=>$idClt, ':nom'=>$nom,':prenom'=>$prenom,':adresse'=>$adresse,':description'=>$description,':cite'=>$cite,':codep'=>$codep,':email'=>$email,':numt'=>$numt);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':description',$description);
		$req->bindValue(':cite',$cite);
		$req->bindValue(':codep',$codep);
		$req->bindValue(':email',$email);
		$req->bindValue(':numt',$numt);
		$req->bindValue(':idClt',$idClt);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivraison($id){
		$sql="SELECT * from livraisons where idClt=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererLivraison2($id){
		$sql="SELECT * from livraisons where idl=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
		function recupererLivraison3($id){
		$sql="SELECT * from livraisons where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($nom){
		$sql="SELECT * from livraisons where nom=$nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
}

?>