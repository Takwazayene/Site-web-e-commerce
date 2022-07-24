 <?PHP
//include "../core/commandeC.php";
include '../../../baseAdmin.php';
$commande1C=new CommandeC();
$commande2C=new CommandeC();
$listeCommandes=$commande1C->afficherCommandes();
 
//var_dump($listeEmployes->fetchAll());
?>
  
<?php startblock("main");?>
        



            <div class="row">
         

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Affichage listes<small>Commandes</small></h2>
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
                    <form  method="GET" action="afficherCommande.php" >
                        <select name="s" id="s" value="" placeholder="Street address" id="billing_address_1"  class="input-text ">
                                       <option value=""></option>
                                       <option value="date">date</option>
                                       <option value="quantite">quantite</option>
                                       <option value="total">total</option>
                                 </select>
									  <input type="submit" name="trier" value="trier"> 
 </form>
 <?PHP  
                                  
               if (isset($_GET["s"])){
            
              $listeCommandes=$commande1C->trierCommande($_GET["s"]);
              //$listeCommandes=$commande1C->afficherCommandes();
               }
        ?>
  <form  method="POST" action="afficherCommande.php" >
                     <select name="f" value="" placeholder="Street address" id="billing_address_1"  class="input-text ">
                                        <option value=""></option>
                                       <option value="1">traité</option>
                                       <option value="0">non traité</option>
                                 </select>
                    <input type="submit" name="filtrer" value="filtrer"> 

                      </form>        
							   
							 <?PHP  
                                  
						/*	 if (isset($_GET["trier"])){
						
							$listeCommandes=$commande1C->trierCommande($_GET["s"]);
							//$listeCommandes=$commande1C->afficherCommandes();
							 }*/

                 if (isset($_POST["f"])){
            
              $listeCommandes=$commande2C->filtrerCommande($_POST['f']);
             
               }


							 
						 ?>
							
							
						
    
							 
							   
				
                    </p>
					                         <br/> <br/>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>id commande</th>
                          <th>id client</th>
                          <th>date</th>
                          <th>livraison</th>
                          <th>quantite</th>
                          <th>total</th>
                          <th>etat</th>
                          <th>Détails</th>
                          <th>supprimer</th>
                          <th>Traité--Non traité</th>
                          <th>contacter</th>
                        </tr>
                      </thead>
                      <tbody>
                     
                                                             
<?PHP
foreach($listeCommandes as $row){
    if( $row['etat']==1)
        $color = "#01DFA5";
    else if($row['etat']==0)
        $color = "#FE8C7A";
	?>
	<tr  style="background: <?php echo $color?>">
	<td><?PHP echo $row['idCom']; ?></td>
	<td><?PHP echo $row['idClt']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><?PHP echo $row['livraison']; ?></td>
   <td><?PHP echo $row['quantite']; ?></td>
	<td><?PHP echo $row['total']; ?></td>
	<td><?PHP echo $row['etat']; ?></td>
  <td><a href="afficherLigneCommande.php?idCom=<?PHP echo $row['idCom']; ?>">
  lister</a></td>
	<td><form method="POST" action="supprimerCommande.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['idCom']; ?>" name="idCom">
	</form>
	</td>
	<td><a href="traiterCommande.php?idCom=<?PHP echo $row['idCom']; ?>">
	Traiter</a></td>
  <td><a href="sms/send-sms.php?idCom=<?PHP echo $row['idCom']; ?>">
  Envoyer SMS</a></td>
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
              </div>
            </div>
         
         
<?php endblock();?>

