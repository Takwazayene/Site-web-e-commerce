<?PHP
include '../../../baseAdmin.php';
if (isset($_GET['id'])){
	$categorieC=new CategorieC();
    $result=$categorieC->recupererCategorie($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$libelle=$row['libelle'];
	}
}
if (isset($_POST['libelle'])){
	$categorie=new Categorie($_POST['libelle']);
	
	$categorieC=new CategorieC();
	
	$categorieC->modifierCategorie($categorie,$_POST['id']);
header('Location: afficherCategorie.php');
}
?>
    <?php startblock("main");?>

 
   

        

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Catégorie Produit <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method='POST' action="modifierCategorie.php" novalidate>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Libelle <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="libelle" name="libelle" value='<?php echo $libelle?>' placeholder="Entrez libelle" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input id="send" type="submit" class="btn btn-success" name="send" value='Envoyer'>
                          <button type="reset" class="btn btn-primary">Annuler</button>
                        </div>
                      </div>
					  <input type="hidden" name="id" value="<?PHP echo $id;?>">
                    </form>
                  </div>
                </div>
              </div>
            </div>
       
        <!-- /page content -->

        


   <?php endblock();?>