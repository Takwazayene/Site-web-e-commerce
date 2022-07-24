<?php

include "../../../baseAdmin.php" ;
$constructeurC=new ConstructeurC();
$listeconstructeur=$constructeurC->afficherConstructeurs();

$val_search='';
if(isset($_GET['recherche']) && !empty($_GET['recherche'])){
$val_search=$_GET['recherche'];
$listeconstructeur=$constructeurC->rechercherListeConstructeur($val_search);
}else if(isset($_GET['tri']) && !empty($_GET['tri'])){
$listeconstructeur=$constructeurC->triConstructeurs($_GET['tri'],$_GET['order']);
}else{
$listeconstructeur=$constructeurC->afficherConstructeurs();
}
?>

   <?php startblock("main");?>
        <!-- page content -->
        <div>
        <div>
            <div class="page-title">
              <div class="title_left">
                <h3>Liste Constructeurs <small></small></h3>
              </div>

				  <form method='get'>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" name='recherche' class="form-control" autocomplete='off' value="<?php echo $val_search?>" placeholder="Rechercher...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
                  </form>
            </div>
			

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Constructeur <small>les différents constructeurs</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
					<a href='afficherConstructeur.php' class='btn btn-info pull-right'><span class="fa fa-refresh"></span></a>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">
							<a href='afficherConstructeur.php?tri=libelle&order=asc' class='icone_angle'><span class="fa fa-angle-up"></span></a>
							constructeur 
							<a href='afficherConstructeur.php?tri=libelle&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							</th>
	
                            
							<th class="column-title no-link last"><span class="nobr">Supprimer</span>
							 <em class="fa fa-trash-o"></em></a>
                           
							
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<?PHP
foreach($listeconstructeur as $row){
	?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=""><?PHP echo $row['nom']; ?></td>
					
                           
							<td>
							<form method="POST" action="supprimerConstructeur.php">
	                       <input type="submit" name="supprimer" value="supprimer">
						    <em class="fa fa-trash-o"></em></a>
                           
	                       <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	                        </form>
	                        </td>
                          </tr>
                          <?PHP
}
	?>
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>
               <!-- /page content -->

          <?php endblock();?>