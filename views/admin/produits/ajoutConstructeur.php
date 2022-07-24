<?PHP
include "../../../baseAdmin.php" ;

if (isset($_POST['nom'])){
	
$constructeur=new Constructeur($_POST['nom'] );

$constructeurC=new ConstructeurC();

$constructeurC->ajouterConstructeur($constructeur);
header('Location: afficherConstructeur.php');
}
?>



    <?php startblock("main");?>

        <!-- page content -->
       
            <div class="page-title">
              <div class="title_left">
                <h3>Ajouter Constructeurs</h3>
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
                    <h2>les differents Constructeurs <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method='POST' action="ajoutConstructeur.php" novalidate>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" placeholder="Entrez constructeur" required="required" autocomplete='off' class="form-control col-md-7 col-xs-12">
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

