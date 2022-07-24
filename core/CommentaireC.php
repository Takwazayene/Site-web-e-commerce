<?PHP
include_once "config.php";
class CommentaireC {
function afficherCommentaire ($commentaire){
		echo "id_produit: ".$commentaire->getId_produit()."<br>";
		echo "id_visiteur: ".$commentaire->getId_visiteur()."<br>";
		echo "date: ".$commentaire->getDate()."<br>";
		echo "commentaire: ".$commentaire->getComment()."<br>";
		echo "jaime: ".$commentaire->getJaime()."<br>";
	}
	function ajouterCommentaire($commentaire){
		$sql="insert into commentaire (id_visiteur,id_produit,date,comment,jaime) values (:id_visiteur,:id_produit,:date,:comment,:jaime)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_produit=$commentaire->getId_produit();
        $id_visiteur=$commentaire->getId_visiteur();
        $date=$commentaire->getDate();
        $comment=$commentaire->getComment();
        $jaime=$commentaire->getJaime();
		$req->bindValue(':id_produit',$id_produit);
		$req->bindValue(':id_visiteur',$id_visiteur);
		$req->bindValue(':date',$date);
		$req->bindValue(':comment',$comment);
		$req->bindValue(':jaime',$jaime);		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCommentaires(){
		$sql="SElECT * From commentaire";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function recupererAllCommentaire($id_produit,$id_visiteur){
		//$sql="SElECT * From commentaire";
		$sql="SElECT * From commentaire where id_produit= $id_produit";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id_produit',$id_produit);
		//$req->bindValue(':id_visiteur',$id_visiteur);
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerCommentaire($id_visiteur){
		$sql="DELETE FROM commentaire where id_visiteur= :id_visiteur";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_visiteur',$id_visiteur);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierCommentaire($commentaire,$id){
		$sql="UPDATE commentaire SET id_visiteur=:id_visiteur,id_produit=:id_produit,date=:date,comment=:comment,jaime=:jaime";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $id_produit=$commentaire->getId_produit();
        $id_visiteur=$commentaire->getId_visiteur();
        $date=$commentaire->getDate();
        $comment=$commentaire->getComment();
        $jaime=$commentaire->getJaime();
		$req->bindValue(':id_produit',$id_produit);
		$req->bindValue(':id_visiteur',$id_visiteur);
		$req->bindValue(':date',$date);
		$req->bindValue(':comment',$comment);
		$req->bindValue(':jaime',$jaime);	
		$req->bindValue(':id',$id);		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function ajouterLike($id){
		$sql="UPDATE commentaire SET jaime=jaime+1 where id=".$id;
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recupererCommentaire($id){
		$sql="SELECT * from commentaire where id=$id";
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