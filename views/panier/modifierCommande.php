<HTML>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>etsZAYENE</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                           <li><a href="#"><i class="fa fa-user"></i> Mon compte</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Avis</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> Panier</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Check-out</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Se connecter</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.html">ets<span>ZAYENE</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Panier - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../../public/index.html">Acceuil</a></li>
                        <li><a href="shop.html">Categories</a></li>
                        <li><a href="single-product.html">Produits</a></li>
                        <li><a href="cart.html">Panier</a></li>
                        <li><a href="commande.php">Commande</a></li>
						 <li class="active"><a href="afficheCommande.php">afficher Commandes</a></li>
                        <li><a href="#">Reclamation</a></li>
                        <li><a href="#">Reservation</a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Modification Commande</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?PHP
include "../../entities/commande.php";
include "../../core/commandeC.php";
if (isset($_GET['idCom'])){
	$commandeC=new CommandeC();
    $result=$commandeC->recupererCommande($_GET['idCom']);
	foreach($result as $row){
		$idCom=$row['idCom'];
		$idClt=$row['idClt'];
		$produit=$row['produit'];
		$date=$row['date'];
		$livraison=$row['livraison'];
		$quantite=$row['quantite'];
		$total=$row['total'];
		$etat=$row['etat'];
?>
  <div class="product-content-right">
         <div class="woocommerce">
<form enctype="multipart/form-data" id="login-form-wrap"  method="POST" class="checkout"  name="checkout">
  <div id="customer_details" class="col2-set">
  <div class="col-1">
   <div class="woocommerce-billing-fields">
<table>
<caption>Modifier Commande</caption>
<tr>
<td>id Commande</td>
<td><input type="number" name="idCom" value="<?PHP echo $idCom ?>"></td>
</tr>
<tr>
<td>id Client</td>
<td><input type="text" name="idClt" value="<?PHP echo $idClt ?>"></td>
</tr>
<tr>
<td>produit</td>
<td><input type="text" name="produit" value="<?PHP echo $produit ?>"></td>
</tr>
<tr>
<td>date</td>
<td><input type="date" name="date" value="<?PHP echo $date ?>"></td>
</tr>
<tr>
</tr>
<tr>
<td>livraison</td>
<td><input type="text" name="livraison" value="<?PHP echo $livraison ?>"></td>
</tr>
<tr>
</tr>
<tr>
<td>quantite</td>
<td><input type="number" name="quantite" value="<?PHP echo $quantite ?>"></td>
</tr>
<tr>
<td>total</td>
<td><input type="number" name="total" value="<?PHP echo $total ?>"></td>
</tr>
<tr>
<td>etat</td>
<td><input type="number" name="etat" value="<?PHP echo $etat ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idCom_ini" value="<?PHP echo $_GET['idCom'];?>"></td>
</tr>
</table>
</div>
</div>
</div>
</form>
</div>
</div>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$commande=new commande($_POST['idCom'],$_POST['idClt'],$_POST['produit'],$_POST['date'],$_POST['livraison'],$_POST['quantite'],$_POST['total'],$_POST['etat']);
	$commandeC->modifierCommande($commande,$_POST['idCom_ini']);
	echo $_POST['idCom_ini'];
	//header('Location: afficheCommande.php');
}
?>

    <div class="footer-top-area">
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
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</HTMl>