<?PHP
include_once "config.php";
class ConstructeurC {
function afficherConstructeur ($constructeur){
		echo "nom: ".$constructeur->getNom()."<br>";
	}
	function ajouterConstructeur($constructeur){
		$sql="insert into constructeur (nom) values (:nom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$constructeur->getNom();
		
		$req->bindValue(':nom',$nom);	
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherConstructeurs(){
		$sql="SElECT * From constructeur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerConstructeur($id){
		$sql="DELETE FROM constructeur where id= :id";
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
	
	

	function recupererConstructeur($id){
		$sql="SELECT * from constructeur where id=$id";
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