<?PHP
include "Config.php";
class EmployeC {
	
	function afficherEmploye ($employe){
		echo "Cin: ".$employe->getCin()."<br>";
		echo "Nom: ".$employe->getNom()."<br>";
		echo "Prénom: ".$employe->getPrenom()."<br>";
		echo "tarif heure: ".$employe->getTarifHoraire()."<br>";
		echo "nb heures: ".$employe->getNbHeures()."<br>";
	}

	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}

	function ajouterEmploye(Employe $employeemploye){
		$sql="insert into employe (CIN,nom,prenom,nbH,tarif) values (:cin, :nom,:prenom,:nbH,:tarifH)";
		$db = Config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
        $cin=$employeemploye->getCin();
        $nom=$employeemploye->getNom();
        $prenom=$employeemploye->getPrenom();
        $nb=$employeemploye->getNbHeures();
        $tarif=$employeemploye->getTarifHoraire();
	
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nbH',$nb);
		$req->bindValue(':tarifH',$tarif);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherEmployes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From employe";
		$db = Config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEmploye($cin){
		$sql="DELETE FROM employe where cin= :cin";
		$db = Config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierEmploye($employe,$cin){
		$sql="UPDATE employe SET CIN=:cinn, nom=:nom,prenom=:prenom,nbH=:nbH,tarif=:tarifH WHERE cin=:cin";
		
		$db = Config::getConnexion();
    	$req=null;
				//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try{		
		        $req=$db->prepare($sql);
				$cinn=$employe->getCin();
		        $nom=$employe->getNom();
		        $prenom=$employe->getPrenom();
		        $nb=$employe->getNbHeures();
		        $tarif=$employe->getTarifHoraire();
				$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':nbH'=>$nb,':tarifH'=>$tarif);
				$req->bindValue(':cinn',$cinn);
				$req->bindValue(':cin',$cin);
				$req->bindValue(':nom',$nom);
				$req->bindValue(':prenom',$prenom);
				$req->bindValue(':nbH',$nb);
				$req->bindValue(':tarifH',$tarif);
	            $s=$req->execute();
					
		           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
			echo " Les datas : " ;
			print_r($datas);
        }

        return $req;
		
	}
	function recupererEmploye($cin){
		$sql="SELECT * from employe where cin=$cin";
		$db = Config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = Config::getConnexion();
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