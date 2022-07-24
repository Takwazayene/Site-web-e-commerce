<?php
$currentPage="shop";
//include "../admin/core/ProduitC.php";
include '../../base.php';
$produitC=new ProduitC();
$listeproduit=$produitC->afficherProduits();
$val_search='';
if(isset($_GET['recherche']) && !empty($_GET['recherche'])){
$val_search=$_GET['recherche'];
$listeproduit=$produitC->rechercherListeProduit($val_search);
}


?>

<?php startblock("content");?>
   

    
   
    
   
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Boutique</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
	   
       
        <div class="container">
            <div class="row">
                <div class="col-md-4">
	   <div class="single-sidebar">
                        <h2 class="sidebar-title">Rechercher Produit</h2>
                       <form method="GET" class="form-search">
        <input type="text" name='recherche' class="form-control" autocomplete='off' " placeholder="Entrez catégorie à rechercher...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" type="button">rechercher!</button>
                    </span>
    </div>
	 </div>
	  </div>
	   </div>
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
			<?PHP
foreach($listeproduit as $row){
	?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
						
                            <img src="../admin/produits/images/produits/<?php echo $row['image']?>" style="width:200px;height:150px;border-radius;:500px;" alt="">
							
							
							
							
                        </div>
                        <h2><a href=""><?php echo $row['nom']?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $row['prix']?></ins>
                        </div> 


                          <div class="rating"><!--
   --><a href="#5" title="Donner 5 étoiles">☆</a><!--
   --><a href="#4" title="Donner 4 étoiles">☆</a><!--
   --><a href="#3" title="Donner 3 étoiles">☆</a><!--
   --><a href="#2" title="Donner 2 étoiles">☆</a><!--
   --><a href="#1" title="Donner 1 étoile">☆</a>
</div>


              
                         <?php $id= $row['id']?>

                             <div class="product-option-shop">
                        <a class="add_to_cart_button"   href="../panier/ajoutPanier.php?id=<?php echo $id ?>&nomProd=<?php echo $id ?>">ajouter au panier</a>
                            <a class="add_to_cart_button" href="single-product.php?id=<?php echo $id ?>">Détails</a>
                                 
                            <!-- <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a> !-->
                        </div>        
						
                       
                       
  
 
  
                    </div>

 <center><!-- Facebook -->
       <a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?id=https://C:/wamp64/www/gestion_produit/viewsClient/single-product.php" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;"><img src="plugins/iconrs/facebook_icon.png" alt="Facebook" /></a>
<!-- //Facebook -->
 
<!-- Twitter -->
        <a target="_blank" title="Twitter" href="https://twitter.com/share?url=https://bit.ly/2sI7H3v" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><img src="plugins/iconrs/twitter_icon.png" alt="Twitter" /></a>
<!-- //Twitter -->
 
<!-- Google + -->
        <a target="_blank" title="Google +" href="https://plus.google.com/share?url=https://tontonduweb.com/previews-warc/genieCivil/article1.html" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="plugins/iconrs/gplus_icon.png" alt="Google Plus" /></a>
<!-- //Google + -->
 
<!-- Linkedin -->
        <a target="_blank" title="Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://tontonduweb.com/previews-warc/genieCivil/article1.html" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;"><img src="plugins/iconrs/linkedin_icon.png" alt="Linkedin" /></a>
<!-- //Linkedin -->
 
<!-- Email -->
        <a target="_blank" title="Envoyer par mail" href="mailto:?Subject=Regarde ça c'est cool !&amp;Body=regarde%20cet%20article%20c'est%20super !%20 https://tontonduweb.com/previews-warc/genieCivil/article1.html" rel="nofollow"><img src="plugins/iconrs/email_icon.png" alt="email" /></a>
<!-- //Email -->





                </div>
				</center>
				
				
<?php } ?>
                
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>



  <?php endblock();?>

