<?PHP
/*include "../entities/Produit.php";
include "../core/ProduitC.php";
include "../core/CategorieC.php";
include "../core/ConstructeurC.php";
include "../core/ModeleC.php";*/

include "../../../baseAdmin.php" ;


$categorieC=new CategorieC();
$listecategorie=$categorieC->afficherCategories();
$constructeurC=new ConstructeurC();
$listeConstructeur=$constructeurC->afficherConstructeurs();
$modeleC=new ModeleC();
$listeModele=$modeleC->afficherModeles();

if (isset($_POST['reference'])){
$target_dir = "images/produits/";

$imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
$name_image=rand(1000000000,9999999999).'.'.$imageFileType;
$target_file = $target_dir . $name_image;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) ;
$produit=new Produit($_POST['reference'],$_POST['nom'],$_POST['prix'],$_POST['datea'],$_POST['qte'],$_POST['constructeur'],$_POST['modele'],$name_image,$_POST['categorie_id'],$_POST['description']);

$produitC=new ProduitC();

$produitC->ajouterProduit($produit);

header('Location: ajoutProduit.php');
}
?>


 
   <script >
	  function verif_formulaire(){

		  if(f.prix.value == "") {
   alert("Veuillez entrez le prix!");
   document.f.prix.focus();
   return false;
  }
 var chkZ = 1;
 for(i=0;i<f.qte.value.length;++i)
   if(f.prix.value.charAt(i) < "0")
     chkZ = -1;
 if(chkZ == -1) {
   alert(" Prix et Quantite doivent etre positifs!");
  f.prix.focus();
   return false;
  }
	  if(f.qte.value == "") {
   alert("Veuillez entrer votre âge!");
   document.f.qte.focus();
   return false;
  }
 var chkZ = 1;
 for(i=0;i<f.qte.value.length;++i)
   if(f.qte.value.charAt(i) < "0"
   || f.qte.value.charAt(i) > "9")
     chkZ = -1;
 if(chkZ == -1) {
   alert("Cette mention n'est pas un nombre!");
  f.qte.focus();
   return false;
  }
	
	  }
	  </script>

       
            
       <?php   startblock("main");  ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Produits <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method='POST'  name="f" onSubmit="return verif_formulaire()" action="ajoutProduit.php" enctype="multipart/form-data" novalidate>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Reference <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="reference" name="reference" value="FFF" placeholder="Entrez reference" required="required" min="8" max="8"  minlength="8" maxlength="8" size="10" autocomplete='off' data-validate-length="1,1" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Prix <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="prix" name="prix" required="required" autocomplete='off' min="0" max="10000"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">DateAjout <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="datea" name="datea" required="required"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Quantite <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="qte" name="qte" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="description" name="description" required="required" autocomplete='off' data-validate-length-range="5,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Constructeur 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="constructeur"  required="required" tabindex="-1" onchange="charger_liste_modele($(this).val());">
                            <option>Choisissez un constructeur</option>
                            <?PHP
								foreach($listeConstructeur as $row){
									?>
										<option value="<?php echo $row['id']?>"><?php echo $row['nom']?></option>
								<?php } ?>
                          </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">modele</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="modele" id="modele"  required="required" tabindex="-1">
                            <option>Choisissez un modeles</option>
                            <?PHP
								foreach($listeModele as $row){
									?>
										<option value="<?php echo $row['nom']?>" class="const_<?php echo $row['id_constructeur']?>" style="display:none;"><?php echo $row['nom']?></option>
								<?php } ?>
                          </select>
                        </div>
                      </div>
             

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="image" name="image"  width="400" height="300"  required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Categorie <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select class="select2_single form-control" tabindex="-1" id="categorie_id" name="categorie_id">
                            <option>Choisir une categorie</option>
                            <?PHP
foreach($listecategorie as $row){
	?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['libelle']?></option>
<?php } ?>
                          </select>
                        </div>
                      </div>
                       <div class="col-md-6 col-md-offset-3">
                          <input id="send" type="submit" class="btn btn-success" name="send" value='Envoyer' >
              
                          
                        </div>
                     
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
         
       
    

   
   <?php endblock();?>
	<script>
	function charger_liste_modele(id_const){
$('#modele option').each(function(){
	if($(this).hasClass('const_'+id_const)){
		$(this).show();
	}else{
		$(this).hide();
	}
});
	}
	</script> 






 
   
