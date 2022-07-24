<?PHP
//include "config1.php";
class LivreurC {
function afficherLivreur ($livreur){
		echo "id: ".$livreur->getId()."<br>";
		echo "Nom: ".$livreur->getUsername()."<br>";
		echo "E-mail: ".$livreur->getName()."<br>";
		echo "Numero: ".$Livreur->getSurname()."<br>";
		echo "Web: ".$Livreur->getEmail()."<br>";
		echo "Role: ".$Livreur->getPassword()."<br>";
		echo "Mot de passe: ".$Livreur->getRole()."<br>";
		echo "Numero de tel: ".$Livreur->getNumber()."<br>";
	}
	/*function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();*/

		function ajouterLivreur($livreur){
		
		$sql="insert into livreur (id,nom,email,numero,web,role,mdp,tel) values (:id, :nom, :email, :numero, :web, :role, :mdp, :tel)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		
        $id=$livreur->getId();
        $nom=$livreur->getNom();
        $email=$livreur->getEmail();
        $numero=$livreur->getNumero();
        $web=$livreur->getWeb();
        $role=$livreur->getRole();
        $mdp=$livreur->getMdp();
        $tel=$livreur->getTel();
        
        
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':web',$web);
		$req->bindValue(':role',$role);
		$req->bindValue(':mdp',$mdp);
		$req->bindValue(':tel',$tel);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	
	function ajouterLivreurUser($livreuruser){
		
		
			$sql = "insert into user (id,username,name,surname,email,password,role,number) values (
				:id, :username, :name, :surname, :email, :password, :role, :number)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$id=$livreuruser->getId();
        $username=$livreuruser->getUsername();
        $name=$livreuruser->getName();
        $surname=$livreuruser->getSurname();
        $email=$livreuruser->getEmail();
        $password=$livreuruser->getPassword();
        $role=$livreuruser->getRole();
        $number=$livreuruser->getNumber();
        $req->bindValue(':id',$id);
		$req->bindValue(':username',$username);
		$req->bindValue(':name',$name);
		$req->bindValue(':surname',$surname);
		$req->bindValue(':email',$email);
		$req->bindValue(':password',$password);
		$req->bindValue(':role',$role);
		$req->bindValue(':number',$number);
	 	$req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurs(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * from livreur ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivreur($id){
		$sql="DELETE FROM livreur where id= :id";
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
		$sql="UPDATE livraisons SET id=:idd, nom=:nom,prenom=:prenom,adresse=:adresse,description=:description,adresse=:adresse,cite=:cite,codep=:codep,email=:email,numt=:numt WHERE id=:id";
		
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
		$datas = array(':idd'=>$idd, ':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':adresse'=>$adresse,':description'=>$description,':cite'=>$cite,':codep'=>$codep,':email'=>$email,':numt'=>$numt);
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
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivreur($id){
		$sql="SELECT * from livreur where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function recupererLivreurNom($nom){
		/*$sql="SELECT * from livreur where nom= '".$nom."' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);

		return $liste;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }*/
        $sql="SELECT * from livreur where nom='".$nom."' LIMIT 1";
		$db = config::getConnexion();
		try{
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			if(empty($row["id"]))
				return null;
			else{
				$nb=1;
				return $nb;
			}
		}
		catch (Exception $e){
            return $e->getMessage().' '.$sql;
        }

	}
    function recupererLivreurEmail($email){
		$sql="SELECT * from livreur where email='".$email."'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererLivreurTel($tel){
		$sql="SELECT * from livreur where tel=$tel";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	/*function verifierExid($id)
{
	$sql="select * from livreur where id= :id ";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
     $i=0;
     $req->bindValue(':id',$id);
    if($req->execute())
    {while(mysqli_next_result($db))
        {$i++;}}

    if($i!=0)
        return true ;
    else
        return false;

}*/
	
}

?>