
<?PHP
//include "../../core/livraisonL.php";
$currentPage="affLivraison";
include '../../../base.php';
if(Config::getUserSession()==null) {
        header('Location: ../login.php');
    }
    $user = Config::getUserSession();
$livraison1C=new livraisonL();
$listeLivraisons=$livraison1C->recupererLivraison($_SESSION["id"]);

//var_dump($listeEmployes->fetchAll());
?>
<?php startblock( 'content' ) ?>
   
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Liste des livraisons</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
       
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                   
                    
                   
                   
                </div>
                
                <div class="col-md-8">
				  <form  method="POST" >
                                <input type="number" placeholder="id produit" name="choix" />
									  <input type="submit" name="rechercher" value="rechercher"> 
									    <!-- <input type="text" placeholder="prix total" name="ct" /> !-->
										<select name="ct" >
           <option value="date">date</option>
           <option value="quantite">quantite</option>
           <option value="total">total</option>
		       </select>
									  <input type="submit" name="trier" value="trier"> 
                               </form>
							   <?php
							    if (isset($_POST["rechercher"]) && isset($_POST["choix"]) ){
						
							   $listelivraisons=$livraison1C->rechercher($_POST["choix"]);
								}
								if (isset($_POST["trier"])) {
									$listelivraisons=$livraison1C->trierLivraisons($_POST["ct"]);
							            	}
							   ?>
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-name">date </th>
                                            <!--<th class="product-price">id client</th>-->
                                            <th class="product-quantity">nom</th>
                                            <th class="product-subtotal">prenom</th>
											 <th class="product-subtotal">cite</th>
											<th class="product-name">codep</th>
                                            <th class="product-price">tel</th>
                                            <th class="product-quantity">modifier</th>
                                         
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            
                                      
<?PHP
foreach($listeLivraisons as $row){
	?>
	<tr>
  
    <td><?PHP echo $row['datel']; ?></td>
    <td><?PHP echo $row['nom']; ?></td>
    <td><?PHP echo $row['prenom']; ?></td>
    <td><?PHP echo $row['adresse']; ?></td>
    <td><?PHP echo $row['codep']; ?></td>
    
    <td><?PHP echo $row['numt']; ?></td>
    
    
    <td><a href="modifierL.php?id=<?PHP echo $row['id']; ?>">
    Modifier</a></td>
    </tr>
	<?PHP
	}
?>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                            <div class="cart-collaterals">


                  




                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>

    <!--<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>ets<span>ZAYENE</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> End footer top area -->
    
    <!--<div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>  End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>