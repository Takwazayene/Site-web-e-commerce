<?PHP
//include "../../core/livraisonL.php";
//include "../../core/UserController.php";
include '../../../baseAdmin.php';

$livraison1C=new livraisonL();
$livraison2C=new livraisonL();
$listeLivraisons=$livraison1C->afficherLivraisons();

$listeLivraisons2=$livraison2C->recupererLivraison2($_SESSION["id"]);


//var_dump($listeEmployes->fetchAll());
?>
<?php startblock( "main" ) ?>
      
      
       

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tableau de livraisons <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">




                   
                    

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">ID </th>
                            <th class="column-title">Nom </th>
                            <th class="column-title">E-mail </th>
                            <th class="column-title">Gouvernement </th>
                            <th class="column-title">Cité </th>
                            <th class="column-title">Code postal </th>
                            
                            <th class="column-title">Telephone </th>
                            <th class="column-title">date</th>
                            <th class="column-title">Affecter</th>

                            
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
<?php
foreach($listeLivraisons as $row){
  ?>
                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td><?PHP echo $row['id']; ?></td>
                            <td><?PHP echo $row['nom']; ?></td>
                            <td><?PHP echo $row['email']; ?></td>
                            <td><?PHP echo $row['adresse']; ?></td>
                            <td><?PHP echo $row['cite']; ?></td>
                            <td><?PHP echo $row['codep']; ?></td>
                          
                            <td><?PHP echo $row['numt']; ?></td>
                            <td><?PHP echo $row['datel']; ?></td>
                            <td><form method="POST" action="../affecterLivraison.php">
                            <input type="submit" name="affecter" value="affecter" class="btn btn-success">
                            <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                            </form>
                            </td>
                            
                            <!--<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><a href="#">View</a>
                            </td>-->

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
              
           <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tableau de livraisons selon livreur <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">



 

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">ID </th>
                            <th class="column-title">Nom </th>
                            <th class="column-title">E-mail </th>
                            <th class="column-title">Gouvernement </th>
                            <th class="column-title">cité </th>
                            <th class="column-title">Code postal </th>
                          
                            <th class="column-title">Telephone </th>
                            <th class="column-title">Date</th>
                            <th class="column-title">supprimer</th>

                            
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
        
        <?php
foreach($listeLivraisons2 as $row){
  ?>
                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td><?PHP echo $row['id']; ?></td>
                            <td><?PHP echo $row['nom']; ?></td>
                            <td><?PHP echo $row['email']; ?></td>
                            <td><?PHP echo $row['adresse']; ?></td>
                            <td><?PHP echo $row['cite']; ?></td>
                            <td><?PHP echo $row['codep']; ?></td>
                           
                            <td><?PHP echo $row['numt']; ?></td>
                            <td><?PHP echo $row['datel']; ?></td>
                            <td><form method="POST" action="../supprimerLivraison.php">
                            <input type="submit" name="supprimer" value="supprimer" class="btn btn-success">
                            <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                            </form>
                            </td>
                            
                            <!--<td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><a href="#">View</a>
                            </td>-->

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
<?php endblock() ?>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>