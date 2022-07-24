<?PHP
include "../../../baseAdmin.php";

$reclamationC=new ReclamationC();
$listeReclamations=$reclamationC->afficherReclamations();
 $val_search='';
if(isset($_GET['recherche']) && !empty($_GET['recherche'])){
$val_search=$_GET['recherche'];
$listeReclamations=$reclamationC->rechercherListeReclamations($val_search);
}else if(isset($_GET['tri']) && !empty($_GET['tri'])){
$listeReclamations=$reclamationC->triReclamations($_GET['tri'],$_GET['order']);
}else{
$listereclamations=$reclamationC->afficherReclamations();
}
?>

 <?php startblock("main");?>
	<style>
	.icone_angle,
	.icone_angle:hover{
		color:#ffffff;
	</style>

  
    
        

            <div class="page-title">
              <div class="title_left">
                <h3>Tableau des Reclamations <small></small></h3>
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

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reclamations <small>les differents Reclamtions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
					<a href='afficherReclamation.php' class='btn btn-info pull-right'><span class="fa fa-refresh"></span></a>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                         
							<th class="column-title">
							<a href='afficherReclamation.php?tri=nom&order=asc' class='icone_angle'><span class="fa fa-angle-up"></span></a>
						nom
							<a href='afficherReclamation.php?tri=nom&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							</th>
							  <th class="column-title">Prenom </th>
							   <th class="column-title">Adresse </th>
							    <th class="column-title">CodePostal </th>
								 <th class="column-title">Ville </th>
								  <th class="column-title">Email </th>
								   <th class="column-title">Phone </th>
		                           <th class="column-title">Sujet</th>     					
                           
							<th class="column-title no-link last"><span class="nobr">Supprimer</span>
							<th class="column-title no-link last"><span class="nobr">Mail</span>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<?PHP
foreach($listeReclamations as $row){
	?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=""><?PHP echo $row['nom']; ?></td>
							<td class=""><?PHP echo $row['prenom']; ?></td>
							<td class=""><?PHP echo $row['adresse']; ?></td>
							<td class=""><?PHP echo $row['cp']; ?></td>
							<td class=""><?PHP echo $row['ville']; ?></td>
							<td class=""><?PHP echo $row['email']; ?></td>
							<td class=""><?PHP echo $row['phone']; ?></td>
							<td class=""><?PHP echo $row['sujet']; ?></td>
                           
							<td>
							<form method="POST" action="supprimerReclamation.php">
	                       <input type="submit" name="supprimer" value="supprimer">
	                       <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	                        </form>
	                        </td>
							<TD> <button type="submit" class="btn btn-success" ><a href="mail.php?email=<?php echo $row['email'];?>">
  rependre par mail </a></button></TD>

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