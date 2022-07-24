<?PHP
include_once "config.php";
class CategorieC {
function afficherCategorie ($categorie){
		echo "Libelle: ".$categorie->getLibelle()."<br>";
	}
	function ajouterCategorie($categorie){
		$sql="insert into categorie (libelle) values (:libelle)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $libelle=$categorie->getLibelle();
		$req->bindValue(':libelle',$libelle);		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCategories(){
		$sql="SElECT * From categorie";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCategorie($id){
		$sql="DELETE FROM categorie where id= :id";
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
	
	function modifierCategorie($categorie,$id){
		$sql="UPDATE categorie SET libelle=:libelle WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $libelle=$categorie->getLibelle();
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':id',$id);		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recupererCategorie($id){
		$sql="SELECT * from categorie where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeCategorie($search){
		$sql="SELECT * from categorie where libelle like '%$search%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function triCategories($tri,$order){
		$sql="SELECT * from categorie order by $tri $order";
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