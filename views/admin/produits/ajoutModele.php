<?PHP
include "../../../baseAdmin.php" ;

$constructeurC=new ConstructeurC();
$listeconstructeur=$constructeurC->afficherConstructeurs();
if (isset($_POST['nom']) && isset($_POST['id_constructeur'])){
$id=$_POST['id_constructeur'] ;
$nom=$_POST['nom'] ;
$modele=new modele($_POST['nom'],$id);

$ModeleC=new ModeleC();

$ModeleC->ajouterModele($modele);

//exit();

header('Location:ajoutModele.php');
}
?>


 
      <?php startblock("main");?>

        

       
            <div class="page-title">
              <div class="title_left">
                <h3>Ajouter Modele</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

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

                    <form class="form-horizontal form-label-left" method='POST' action="ajoutModele.php" novalidate>
					

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" placeholder="Entrez modele" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">id_constructeur <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select class="select2_single form-control" tabindex="-1" id="id_constructeur" name="id_constructeur">
                            <option>Choisir un constructeur</option><?PHP
foreach($listeconstructeur as $row){
	?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nom']?></option>
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
                    </form>
                  </div>
                </div>
              </div>
            </div>
         
        <!-- /page content -->

               
<?php endblock();?>