<?php
include 'ti.php';
//tous les enitées
include 'entities/Garage.php';
include 'entities/User.php';
include 'entities/Reservation.php';
include 'entities/Service.php';
include 'entities/Produit.php';
include 'entities/panier.php';
include 'entities/ligneCommande.php';
include 'entities/commande.php';
include 'entities/livreur.php';
include 'entities/livraison.php';
include 'entities/livreurUser.php';

// tous les controlleurs
include 'core/Config.php';
include 'core/UserController.php';
include 'core/GarageController.php';
include 'core/panierC.php';
include "core/ProduitC.php";
include "core/ligneCommandeC.php";
include "core/commandeC.php";
include "core/livraisonL.php";
include "core/livreurC.php";
include 'core/rating-v3/RatingController.php';
include "entities/Commentaire.php";
include "core/CommentaireC.php";
include "entities/Reclamation.php";
include "core/ReclamationC.php";


$garageController = new GarageController();
$userController = new UserController();


if(!isset($currentPage))
    $currentPage="acceuil";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
		<?php startblock( 'title' ) ?>
        default
		<?php endblock() ?>
    </title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo curPageURL() ?>/assets/front/css/bootstrap.min.css">
    <!-- Custom CSS -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo curPageURL() ?>/assets/front/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo curPageURL() ?>/assets/front/css/style2.css">
    <link rel="stylesheet" href="<?php echo curPageURL() ?>/assets/front/css/responsive.css">

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
						<?php
						if ( Config::getUserSession() == null ) {
							echo '<li><a href="' . curPageURL() . '/views/signup.php"><i class="fa fa-user"></i> Inscription</a></li>';
							echo '<li><a href="' . curPageURL() . '/views/login.php"><i class="fa fa-user"></i> Connecter</a></li>';
						} else {
							echo '<li><a href="' . curPageURL() . '/views/profile"><i class="fa fa-user"></i> Mon compte</a></li>';
							echo '<li><a href="' . curPageURL() . '/views/logout.php"><i class="fa fa-user"></i> Deconnexion</a></li>';
                            echo '<li><a href="' . curPageURL() . '/views/livraison/profile/contact.php"><i class="fa fa-user"></i> Nous-contacter</a></li>';
						}
						?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                       

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        class="key">language :</span><span class="value">English </span><b
                                        class="caret"></b></a>
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
                    <a href="<?php echo curPageURL() ?>/views/panier/afficherPanier.php">Panier - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i>
                        <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area" style="height: auto">
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
                    <li class="<?php if($currentPage == "acceuil") echo 'active' ?>"><a href="<?php echo curPageURL() ?>">Acceuil</a></li>

	                <?php
                    if(Config::getUserSession())
	                if(Config::getUserSession()->getRole() == "user"){
                    ?>
                        <li class="<?php if($currentPage == "garage") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/garage">Garages</a></li>
                        <li class="<?php if($currentPage == "reservations") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/garage/reservations.php">Mes Reservations</a></li>
                        <li class="<?php if($currentPage == "shop") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/produit/shop.php">Produit</a></li>
                      
                        <li class="<?php if($currentPage == "panier") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/panier/afficherPanier.php">Panier</a></li>
                         <li class="<?php if($currentPage == "commande") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/panier/afficherCommande.php">Commande</a></li>
                         <li class="<?php if($currentPage == "livraison") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/livraison/profile/checkout.php">Livraison</a></li>
                          <li class="<?php if($currentPage == "affLivraison") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/livraison/profile/afficheLivraison.php">Mes livraisons</a></li>
                              <li class="<?php if($currentPage == "reclamation") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/livraison/profile/reclamation.php">Contactez nous</a></li>
                           <li class="<?php if($currentPage == "reclamation2") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/produit/ajouter_reclamation.php">Réclamation</a></li>  
	                <?php





	                }
                    else if(Config::getUserSession()->getRole() == "technicien"){
                    ?>
                        <li class="<?php if($currentPage == "reservations") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/technicien/reservations.php">Gestion Reservations</a></li>
	                <?php
	                }
	                ?>
	                <?php
						if ( Config::getUserSession() == null ) {
							?>

                   
                  
                    <li class="<?php if($currentPage == "shop") echo 'active' ?>"><a href="<?php echo curPageURL() ?>/views/produit/shop.php">Produit</a></li>
                   
                    
                    <?php
                }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->

<?php startblock( 'content' ) ?>
<?php endblock() ?>

<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>Ets<span>ZAYENE</span></h2>
                    <p>Distribution de composants extérieurs Automobiles .
                    créer depuis 1997, 
                    localisé à Tunisie-Monastir-Bouhjar 1550.
                    Misfat,Valvoline,bp,Afrilub
                    <br/>
                    Appeler 70 246 320
                    m/MOKHTAR ZAYENE
                    etszayene.commercial@topnet.tn
                    categories
                    Communauté  </p>
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
                    <h2 class="footer-wid-title">Navigation Client </h2>
                    <ul>
                        <li><a href="#">Mon Compte</a></li>
                        <li><a href="#">Historique</a></li>
                        <li><a href="#">Favoris</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Acceuil</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Filtre</a></li>
                        <li><a href="#">Echappement</a></li>
                        <li><a href="#">Embrayage</a></li>
                        <li><a href="#">Accessoires</a></li>
                        <li><a href="#">Huile</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Contact</h2>
                    <p>Inscrivez-vous à notre newsletter et obtenez des offres exclusives que vous ne trouverez nulle part ailleurs directement dans votre
                         boîte de réception!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Inscrire">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2019 etsZAYENE. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a
                                href="http://wpexpand.com" target="_blank">STARK</a></p>
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
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="<?php echo curPageURL() ?>/assets/front/js/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="<?php echo curPageURL() ?>/assets/front/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="<?php echo curPageURL() ?>/assets/front/js/owl.carousel.min.js"></script>
<script src="<?php echo curPageURL() ?>/assets/front/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="<?php echo curPageURL() ?>/assets/front/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="<?php echo curPageURL() ?>/assets/front/js/main.js"></script>
 <script src="<?php echo curPageURL() ?>/assets/front/js/formulaire.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery.min.js"></script>

<?php startblock( "javascripts" ) ?> <?php endblock() ?>


</body>
</html>