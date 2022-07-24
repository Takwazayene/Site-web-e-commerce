<?php
include '../../../baseAdmin.php';
$modeleC=new ModeleC();
$val_search='';
if(isset($_GET['recherche']) && !empty($_GET['recherche'])){
$val_search=$_GET['recherche'];
$listecategorie=$categorieC->rechercherListeModele($val_search);
}else if(isset($_GET['tri']) && !empty($_GET['tri'])){
$listecategorie=$categorieC->triCategories($_GET['tri'],$_GET['order']);
}else{
$listemodele=$modeleC->afficherModeles();
}
?>
  
  
    
<?php startblock("main");?>
  

        <!-- page content -->
      
            <div class="page-title">
              <div class="title_left">
                <h3>Liste des Modeles <small></small></h3>
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
            </div>
					</form>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modele <small>les différents modeles</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
					<a href='afficherCategorie.php' class='btn btn-info pull-right'><span class="fa fa-refresh"></span></a>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">
							<a href='afficherModele.php?tri=libelle&order=asc' class='icone_angle'></a>
							Nom
							<a href='afficherCategorie.php?tri=libelle&order=desc' class='icone_angle'></a>
							</th>
                            <th class="column-title no-link last"><span class="nobr">Id_constructeur</span> 
							<th class="column-title no-link last"><span class="nobr">Modifier</span>
														<th class="column-title no-link last"><span class="nobr">supprimer</span>
							 <em class="fa fa-trash-o"></em></a>
                           
							
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<?PHP
foreach($listemodele as $row){
	?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=""><?PHP echo $row['nom']; ?></td>
							    <td class=""><?PHP echo $row['id_constructeur']; ?></td>
                            <td class=" last"><a href="modifierCategorie.php?id=<?PHP echo $row['id']; ?>">Modifier</a>
							<i class="fa fa-edit" style="font-size:36px"></i>
                            </td>
							<td>
							<form method="POST" action="supprimerCategorie.php">
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
          </div>
        </div>
        <!-- /page content -->

        
 
            
<?php endblock();?>

