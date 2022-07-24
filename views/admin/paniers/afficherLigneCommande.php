<?PHP
//include "../entities/commande.php";
//include "../core/commandeC.php";
include '../../../baseAdmin.php';


if (isset($_GET['idCom'])){
$ligneCommande2C=new LigneCommandeC();
$ligneCommandeC=new LigneCommandeC();
$listeLigneCommandes=$ligneCommandeC->afficherLCToadmin($_GET["idCom"]);
 
}
?>

<?php startblock("main");?>
        

            <div class="row"
         

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Affichage listes<small>Ligne Des Commandes</small></h2>
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
                    <form  method="POST" >
                        <select name="s" value="" placeholder="Street address" id="billing_address_1"  class="input-text ">
                                       <option value="id">id</option>
                                       <option value="qte">quantite</option>
                                       <option value="prix">Prix</option>
                                 </select>
									  <input type="submit" name="trier" value="trier"> 

                               </form>
							   
							 <?PHP  
                                  
							 if (isset($_POST["trier"])){
						
							$listeLigneCommandes=$ligneCommande2C->trierListeCommande($_POST['s'],$_GET["idCom"]);
							//$listeCommandes=$commande1C->afficherCommandes();
							 }
							 
						 ?>
							 
							   
				
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Id </th>
                          <th>Id Commande</th>
                          <th>Id Produit</th>
                          <th>Nom Produit</th>
                          <th>Quantite</th>
                          <th>Prix</th>
              
                        </tr>
                      </thead>
                      <tbody>
                     
                                                             
<?PHP


foreach($listeLigneCommandes as $row){
   
	?>
	<tr >
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['idCom']; ?></td>
	<td><?PHP echo $row['idProd']; ?></td>
	<td><?PHP echo $row['nomProd']; ?></td>
   <td><?PHP echo $row['qte']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>


	</tr>
	<?PHP
	}
?>
                      </tbody>

                    </table>
                      </div>
                <form action="pdf/imprimer2.php">
                  <button type="submit" class="btn btn-danger" name="imprimer">Imprimer</button>   
                </form>
					
					
                  </div>

                </div>
         
         
         
<?php endblock();?>



  