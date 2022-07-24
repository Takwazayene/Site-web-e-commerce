<?PHP
include_once "config.php";
class ModeleC {
function afficherModele ($modele){
		echo "nom: ".$modele->getNom()."<br>";
		echo "id_constructeur: ".$modele->getIdConstructeur()."<br>";
	}
	function ajouterModele($modele){
		$sql="insert into modele (nom,id_constructeur) values (:nom, :id_constructeur)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$modele->getNom();
        $id_constructeur=$modele->getIdConstructeur();
		
		$req->bindValue(':nom',$nom);	
		$req->bindValue(':id_constructeur',$id_constructeur);	
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherModeles(){
		$sql="SElECT * From modele";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	

	function recupererModele($id){
		$sql="SELECT * from modele where id=$id";
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