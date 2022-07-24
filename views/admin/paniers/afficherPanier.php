<?PHP
//include "../core/commandeC.php";
include '../../../baseAdmin.php';
$panier1C=new PanierC();
$panier2C=new PanierC();
$listePaniers=$panier1C->afficherPaniers();

//var_dump($listeEmployes->fetchAll());
?>
  
<?php startblock("main");?>
        

            <div class="row"
         

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Affichage listes<small>Paniers</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                  <!--  <form  method="POST" action="afficherPanier.php" >
                      

                   <input type="text" name="nomProd"  placeholder="nom produit" id="nomProd"  class="input-text ">
                    <input type="submit" name="filtrer" value="filtrer"> 

                               </form> !-->
							   
							 <?PHP  

                 /*  if (isset($_POST["filtrer"])){
            
              $listePaniers=$panier2C->filtrerPanier($_POST['nomProd']);
             
               } */


							 
						 ?>
							
							
						
    
							 
							   
				
                    </p>
					                         <br/> <br/>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>id Panier</th>
                          <th>id Client</th>
                          <th>nom Produit</th>
                          <th>id Produit</th>
                          <th>Quantite</th>
                          <th>prix</th>
                
                        </tr>
                      </thead>
                      <tbody>
                     
                                                             
<?PHP
foreach($listePaniers as $row){
   
	?>
	<tr>
	<td><?PHP echo $row['idPanier']; ?></td>
	<td><?PHP echo $row['idClient']; ?></td>
	<td><?PHP echo $row['nomProd']; ?></td>
	<td><?PHP echo $row['idProduit']; ?></td>
   <td><?PHP echo $row['quantite']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
	
	</tr>
	<?PHP
	}
?>
                      </tbody>

                    </table>
                      </div>
               
					
                  </div>

                </div>
         
         
         
<?php endblock();?>

