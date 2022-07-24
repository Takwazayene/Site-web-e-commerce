<?php
 $currentPage="commande";
include '../../base.php' ;


 startblock('content') ;


 if(config::getUserSession()==null) {
        header('Location: ../login/login.php');
    }
 $user = config::getUserSession();
$id=$user->getId() ; 
$ligneCommande1C=new LigneCommandeC();
//$panier1C=new PanierC();
$listeCommandes=$ligneCommande1C->afficherCommandesByID($id);
$total = 0;

//var_dump($listeEmployes->fetchAll());
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Historique des Commandes</h2>
                </div>
            </div>
        </div>
    </div>
</div>
   
    

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    
               
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Articles récents</h2>
                        <ul>
                            <li><a href="#">Filtre - 2019</a></li>
                            <li><a href="#">Articles récents - 2019</a></li>
                            <li><a href="#">Butée de commande d'embrayage - 2019</a></li>
                            <li><a href="#">Filtre de ventilation du carter moteur - 2019</a></li>
                            <li><a href="#">Filtre à huile - 2019</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                           <form method="POST" action="ajouterCommande.php" >
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
										  
											 <!--<th class="product-name">id Panier</th> !-->
                                       
                                            <th class="product-thumbnail">nom Produit</th>
									       <th class="product-quantity">Quantite</th>
                                            <th class="product-price">Prix</th>
                                         
                                            <th class="product-subtotal">Total</th>
								
                                            <th class="product-remove">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            
<?PHP
foreach($listeCommandes as $row){

	?>
   
	<tr>
	<!--<td><?PHP //echo $row['idPanier']; ?></td> !-->
	<td><?PHP echo $row['nomProd']; ?></td>
	<td><?PHP echo $row['qte']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
	<td>$ <?php echo number_format($row["qte"] * $row["prix"], 2);?></td>
	

    <td><a href="supprimerCommande.php?id=<?PHP echo $row['id']; ?>">
    Supprimer</a></td>
    </tr>
    </tr>
    <!-- <td><form method="POST" action="supprimerPanier.php">
    <input type="submit" name="supprimer" value="supprimer">
    <input type="hidden" value="<?PHP //echo $row['idPanier']; ?>" name="idPanier">
     </form>
    </td> !-->
    <?php
                $total = $total + ($row["qte"] * $row["prix"]);
                        
                    ?>
                
  <input type="hidden" name="idProduit" value="<?php echo $row['idProd']; ?>" />
  <input type="hidden" name="idClt" value="<?php echo $id ; ?>" />
    <input type="hidden" name="qte" value="<?php echo $row['qte']; ?>" />
    <input type="hidden" name="prix" value="<?php echo  $row['prix'] ;?>" />                  
    <input type="hidden" name="etat" value="<?php echo 0 ?>" /> 

	
	
	
    
  
	<?PHP
}
?>
	<tr>
	<td colspan="3" align="right">Total</td>
    <td align="right">$ <?php echo number_format($total, 2); ?></td>
	<td></td>
					</tr>
                                           
											

                            
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">


                          <!--  <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>

                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>
                                </ul>
                            </div>  !-->


                          

                            <form method="post" action="#" class="shipping_calculator">
                               <!-- <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2> !-->

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide">
                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                    <option value="">Select a country…</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                          
                                </select>
                                </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="State / county" value="" class="input-text"> </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / Zip" value="" class="input-text"></p>


                                <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                </section>
                            </form>


                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

<?php endblock() ?>

    
   
