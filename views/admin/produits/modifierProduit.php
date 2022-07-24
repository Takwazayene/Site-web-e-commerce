<?PHP
/*include "../entities/Produit.php";
include "../core/ProduitC.php";
include "../core/CategorieC.php";
include"../core/ConstructeurC.php";
include"../core/ModeleC.php";*/
include "../../../baseAdmin.php" ;

$categorieC=new CategorieC();
$listecategorie=$categorieC->afficherCategories();
$constructeurC=new ConstructeurC();
$listeconstructeur=$constructeurC->afficherConstructeurs();
$modeleC=new ModeleC();
$listemodele=$modeleC->afficherModeles();

if (isset($_GET['id'])){
	$produitC=new ProduitC();
    $result=$produitC->recupererProduit($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$reference=$row['reference'];
		$nom=$row['nom'];
		$prix=$row['prix'];
		$datea=$row['datea'];
		$qte=$row['qte'];
		$description=$row['description'];
		$constructeur=$row['constructeur'];
		$modele=$row['modele'];
		$image=$row['image'];
		$categorie_id=$row['categorie_id'];
	}
}
if (isset($_POST['reference'])){
	$name_image=$_POST['act_image'];

	if(isset($_FILES["image"]['name']) && !empty($_FILES["image"]['name'])){
$target_dir = "images/produits/";
	if(file_exists($target_dir.$name_image)){
		unlink($target_dir.$name_image);
	}
$imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
$name_image=rand(1000000000,9999999999).'.'.$imageFileType;
$target_file = $target_dir . $name_image;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) ;
	}
$produit=new Produit($_POST['reference'],$_POST['nom'],$_POST['prix'],$_POST['datea'],$_POST['qte'],$_POST['constructeur'],$_POST['modele'],$name_image,$_POST['categorie_id'],$_POST['description']);

$produitC=new ProduitC();

$produitC->modifierProduit($produit,$_POST['id']);

header('Location: afficherProduit.php');
}
?>

  

  
    

       <?php startblock("main");?>


           
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Categorie Produit <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method='POST' action="modifierProduit.php" enctype="multipart/form-data" novalidate>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Reference <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reference" name="reference" placeholder="Entrez reference" value="<?php echo $reference?>" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" value="<?php echo $nom?>"  required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Prix <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="prix" name="prix" value="<?php echo $prix?>" required="required" autocomplete='off' min="0" max="10000"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">DateAjout <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="datea" name="datea" required="required"   value="<?php echo $datea?>" dclass="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Quantite <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="qte" name="qte" required="required" autocomplete='off' value="<?php echo $qte?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" required="required" value="<?php echo $description?>" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Constructeur 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
					   
						  <select class="country_to_state country_select" id="constructeur" name="constructeur" value="<?php echo $constructeur?>">
						  <option>Modifier le constructeur</option><?PHP
foreach($listeconstructeur as $row){
	$select="";
	if($row['id']==$constructeur)
		$select="selected";
	?>
                            <option value="<?php echo $row['id']?>" <?php echo $select?>><?php echo $row['nom']?></option>
<?php } ?>
                                                    
                         </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">modele</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="modele" value="modele"  value="<?php echo $modele?>">
                           <option>Modifier le modele</option><?PHP
foreach($listemodele as $row){
	$select="";
	if($row['id']==$modele)
		$select="selected";
	?>
                            <option value="<?php echo $row['id']?>" <?php echo $select?>><?php echo $row['nom']?></option>
<?php } ?>
                            
                          </select>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="image" name="image"  value="<?php echo $image?>" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Categorie_id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select class="select2_single form-control" tabindex="-1" id="categorie_id" name="categorie_id">
                            <option>Choisir une categorie</option><?PHP
foreach($listecategorie as $row){
	$select="";
	if($row['id']==$categorie_id)
		$select="selected";
	?>
                            <option value="<?php echo $row['id']?>" <?php echo $select?>><?php echo $row['libelle']?></option>
<?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input id="send" type="submit" class="btn btn-success" name="send" value='Envoyer'>
                         
                        </div>
                      </div>
					  <input type="hidden" name="id" value="<?PHP echo $id;?>">
					  <input type="hidden" name="act_image" value="<?PHP echo $image;?>">
                    </form>
                  </div>
                </div>
              </div>
            </div>
  
        <!-- /page content -->



   
<?php endblock();?>

