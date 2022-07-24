<?PHP
//require "config.php";
//include_once dirname(__FILE__) . '/../config.php';

class ProduitC {
function afficherProduit ($produit){
		echo "Reference: ".$produit->getReference()."<br>";
		echo "Nom: ".$produit->getNom()."<br>";
        echo "Prix: ".$produit->getPrix()."<br>";
		echo "Datea: ".$produit->getDatea()."<br>";
		echo "Qte: ".$produit->getQte()."<br>";
		echo "Constructeur: ".$produit->getConstructeur()."<br>";
		echo "Modele: ".$produit->getModele()."<br>";
		echo "Image: ".$produit->getImage()."<br>";
		echo "Categorie_id: ".$produit->getCategorie_id()."<br>";
		echo "Dexcription: ".$produit->getDescriprion()."<br>";
	}
	function ajouterProduit($produit){
		$sql="insert into produit (reference,nom,prix,datea,qte,constructeur,modele,image,categorie_id,description) values (:reference,:nom,:prix,:datea,:qte,:constructeur,:modele,:image,:categorie_id,:description)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $reference=$produit->getReference();
		$nom=$produit->getnom();
		$prix=$produit->getPrix();
		$datea=$produit->getDatea();
		$qte=$produit->getQte();
		$constructeur=$produit->getConstructeur();
		$modele=$produit->getModele();
		$image=$produit->getImage();
		$categorie_id=$produit->getCategorie_id();
		$description=$produit->getDescription();
		$req->bindValue(':description',$description);	
		$req->bindValue(':reference',$reference);	
		 $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
		 $req->bindValue(':datea',$datea);
		$req->bindValue(':qte',$qte);
		$req->bindValue(':constructeur',$constructeur);
		$req->bindValue(':modele',$modele);
		$req->bindValue(':image',$image);
		$req->bindValue(':categorie_id',$categorie_id);

				
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	
	function afficherProduits(){
		$sql="SElECT * From produit";
		$db=config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerProduit($id){
		$sql="DELETE FROM produit where id= :id";
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
	function modifierProduit($produit,$id){
		$sql="UPDATE produit SET reference=:reference,nom=:nom, prix=:prix,datea=:datea,qte=:qte,constructeur=:constructeur,description=:description,	modele=:modele ,categorie_id=:categorie_id , image=:image WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $reference=$produit->getReference();
		$nom=$produit->getNom();
		$prix=$produit->getPrix();
		$datea=$produit->getDatea();
		$qte=$produit->getQte();
		$constructeur=$produit->getConstructeur();
		$modele=$produit->getModele();
		$image=$produit->getImage();
		$categorie_id=$produit->getCategorie_id();
		$description=$produit->getDescription();
		$req->bindValue(':description',$description);	
		$req->bindValue(':id',$id);	
		$req->bindValue(':reference',$reference);	
		 $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
		 $req->bindValue(':datea',$datea);
		$req->bindValue(':qte',$qte);
		$req->bindValue(':constructeur',$constructeur);
		$req->bindValue(':modele',$modele);
		$req->bindValue(':image',$image);
		$req->bindValue(':categorie_id',$categorie_id);	
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recupererProduit($id){
		$sql="SELECT * from produit where id=$id";
		$db =config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeProduits($search){
		$sql="SELECT * from produit p,categorie c where c.id=p.categorie_id and ( p.reference like '%$search%' or p.description like '%$search%' or p.constructeur like '%$search%' or p.modele like '%$search%' or p.prix = '$search' or c.libelle like '%$search%')";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

		function rechercherListeProduit($search){
		$sql="SELECT * from produit p,categorie c where c.id=p.categorie_id  and(c.libelle like '%$search%' )";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function triProduits($tri,$order){
		$sql="SELECT * from produit order by $tri $order";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

function triNProduits($datea,$order){
		$sql="SELECT * from produit order by $datea $order";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}



	

		function setStock($idProd,$qte){
		$sql="UPDATE produit SET qte=$qte WHERE id=$idProd";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
	   // $qte=$produit->getQte();
       
		$req->bindValue(':qte',$qte);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  //print_r($datas);
        }
		
	}






}

?>