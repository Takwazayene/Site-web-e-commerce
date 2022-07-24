<?PHP
//include "Config.php";
class ReclamationC {
function afficherReclamation ($reclamation){
		echo "nom: ".$reclamation->getNom()."<br>";
		echo "prenom: ".$reclamation->getPrenom()."<br>";
		echo "adresse: ".$reclamation->getAdresse()."<br>";
		echo "cp: ".$reclamation->getCp()."<br>";
		echo "ville: ".$reclamation->getVille()."<br>";
		echo "email".$reclamation->getEmail()."<br>";
		echo "phone".$reclamation->getphone()."<br>";
		echo "sujet: ".$reclamation->getSujet()."<br>";
	}

	function ajouterReclamation($reclamation){
		$sql="insert into  reclamation (nom,prenom,adresse,cp,ville,email,phone,sujet) values (:nom,:prenom,:adresse,:cp,:ville,:email,:phone,:sujet)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		 $nom=$reclamation->getNom();
		$prenom=$reclamation->getPrenom();
		$adresse=$reclamation->getAdresse();
		$cp=$reclamation->getCp();
		$ville=$reclamation->getVille();
		$email=$reclamation->getEmail();
		$phone=$reclamation->getPhone();
        $sujet=$reclamation->getSujet();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':cp',$cp);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':email',$email);
		$req->bindValue(':phone',$phone);
		$req->bindValue(':sujet',$sujet);
		
		
	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherReclamations(){
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerReclamation($id){
		$sql="DELETE FROM reclamation where id= :id";
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
	function modifierReclamation($reclamation,$id){
		$sql="UPDATE reclamation SET  nom=:nom ,prenom=:prenom, adresse=:adresse,cp=:cp,ville=:ville,email=:email ,phone=:phone ,sujet=:sujet WHERE  id=:id)";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $nom=$reclamation->getNom();
		$prenom=$reclamation->getPrenom();
		$adresse=$reclamation->getAdresse();
		$cp=$reclamation->getCp();
		$ville=$reclamation->getVille();
		$email=$reclamation->getEmail();
		$phone=$reclamation->getPhone();
        $sujet=$reclamation->getSujet();
		$datas = array(':nom'=>$nom, ':prenom'=>$prenom,':adresse'=>$adresse,':cp'=>$cp,':ville'=>$ville,':email'=>$email,':phone'=>$phone,':sujet'=>$sujet);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':cp',$cp);
		$req->bindValue(':ville',$ville);
		$req->bindValue(':email',$email);
		$req->bindValue(':phone',$phone);
		$req->bindValue(':sujet',$sujet);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererReclamation($idl){
		$sql="SELECT * from reclamation where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeReclamations($search){
		$sql="SELECT * from reclamation where  ville like '%$search%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function triReclamations($tri,$order){
		$sql="SELECT * from reclamation order by $tri $order";
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