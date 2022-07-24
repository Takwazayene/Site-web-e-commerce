<?PHP
include "../../entities/livraison.php";
include "../../core/livraisonL.php";
include "../../base.php";
if(Config::getUserSession()==null) {
      header('Location: ../login.php');
    }
    $user = Config::getUserSession();
if (isset($_GET['id'])){
    $livraisonL=new livraisonL();
    $result=$livraisonL->recupererLivraison($_GET['id']);
    foreach($result as $row){
        $id=$row['id'];
        $nom=$row['nom'];
        $prenom=$row['prenom'];
        $adresse=$row['adresse'];
        $codep=$row['codep'];
        $email=$row['email'];
        $numt=$row['numt'];
        $cite=$row['cite'];
        $description=$row['description'];
?>
?>
<?php startblock( 'content' ) ?><!-- End mainmenu area -->
    <div class="product-content-right">
         <div class="woocommerce">
<form enctype="multipart/form-data" id=""  method="POST" class="checkout"  name="checkout">
  
   <table>
<caption>Modifier Livraison</caption>
<tr>
<td>CIN</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>Adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>Code postal</td>
<td><input type="text" name="description" value="<?PHP echo $description ?>"></td>
</tr>
<tr>
<td>Code postal</td>
<td><input type="text" name="cite" value="<?PHP echo $cite ?>"></td>
</tr>

<tr>
<td>Code postal</td>
<td><input type="number" name="codep" value="<?PHP echo $codep ?>"></td>
</tr>
<tr>
<td>E-mail</td>
<td><input type="text" name="email" value="<?PHP echo $email ?>"></td>
</tr>
<tr>
<td>Numero tel</td>
<td><input type="number" name="numt" value="<?PHP echo $numt ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>

<?PHP
    }
}
if (isset($_POST['modifier'])){
    $livraison=new livraison($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['description'],$_POST['cite'],$_POST['codep'],$_POST['email'],$_POST['numt']);
    $livraisonL->modifierLivraison($livraison,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: afficheLivraison.php');
}
?>


<?php endblock() ?>
    
    <!--<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
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
    </div>  End footer top area 
    
    <div class="footer-bottom-area">
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