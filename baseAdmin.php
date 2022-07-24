<?php
include 'ti.php';
include 'entities/Garage.php';
include 'entities/User.php';
include 'core/Config.php';
include 'core/UserController.php';
include 'core/GarageController.php';
include "entities/Reclamation.php";
include "core/ReclamationC.php";
include "core/commandeC.php";
include 'entities/ligneCommande.php';
include "core/ligneCommandeC.php";
include "core/panierC.php";
include 'entities/panier.php';
include "core/livraisonL.php";
include "core/livreurC.php";
include 'entities/livreur.php';
include 'entities/livraison.php';
include 'entities/livreurUser.php';
include 'entities/Service.php';
include "entities/Produit.php";
include "core/CategorieC.php";
include "core/ConstructeurC.php";
include "core/ModeleC.php";

include "core/ProduitC.php";
include "entities/Constructeur.php";
include "entities/Modele.php";

include "entities/Categorie.php";

//include "views/admin/paniers/pdf/imprimer2.php" ;

$garageController = new GarageController();
$userController = new UserController();
if(!isset($_SESSION))
{
	session_start();
}

if ( Config::getUserSession() == null ) {
	header( 'Location: '.curPageURL().'/views/login.php' );
} elseif ( Config::getUserSession()->getRole() != "admin" ) {
	header( 'Location: '.curPageURL().'/views//profile' );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico"/>


    <title>
		<?php startblock( 'title' ) ?>
        Admin
		<?php endblock() ?>
    </title>

    <!-- Bootstrap -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap-daterangepicker/daterangepicker.css"
          rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo curPageURL() ?>/assets/back/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"> <span>ets ZAYENE</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo curPageURL() ?>/assets/back/img.jpg" alt="..."
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenu,</span>
                        <h2>etsZ</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Statistique <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                  <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherStat.php">Categorie</a></li>
                                   <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherPrix.php">Produit</a></li>
                                      <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/statCommande.php">Commandes</a></li>
                                      <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/AffStatAchat.php">Achats</a></li>
                                      <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherReservation.php">Reservations</a></li>
                                      <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherStatus.php">Status Reservations</a></li>
                                       
                                </ul>
                                      

                            </li>
                            
                            <li><a><i class="fa fa-desktop"></i> Utilisateurs <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/user/add.php">Ajout Technicien</a></li>
                                          <li><a href="<?php echo curPageURL() ?>/views/livraison/admin/form_validation.php">Ajout Livreur</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/user/index.php">Liste Utilisateurs</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/user/index.php?role=technicien">Liste Techniens</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/livraison/admin/tables.php">Liste livreurs</a></li>
                                     <li><a href="<?php echo curPageURL() ?>/views/livraison/admin/tablesLivraisons.php">Liste livraison</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/user/index.php?role=admin">Liste Admin</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/user/index.php?role=user">Liste Clients</a></li>
                                     

                                </ul>
                            </li>
                             <li><a><i class="fa fa-desktop"></i> Produits <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/afficherProduit.php">Liste Produits</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/ajoutProduit.php">Ajouter Produits</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/ajoutCategorie.php">Ajouter Catégories</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/afficherCategorie.php">Liste Catégories</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/ajoutConstructeur.php">Ajouter Constructeurs</a></li>
                                 <li><a href="<?php echo curPageURL() ?>/views/admin/produits/afficherConstructeur.php">Liste Constructeurs</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/ajoutModele.php">Ajouter Modéles</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/afficherModele.php">Liste Modéles</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/produits/afficherReclamation.php">Liste Reclamations</a></li>
                                
                                </ul>
                            </li>
                                   <li><a><i class="fa fa-desktop"></i> Paniers et commandes <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherPanier.php">Liste Panies</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/paniers/afficherCommande.php">Liste Commandes</a></li>
                                     
                        
                        
                                
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Garage <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/garage">Liste</a></li>
                                    <li><a href="<?php echo curPageURL() ?>/views/admin/garage/add.php">Ajouter</a></li>
                                </ul>
                            </li>
                           
                            
                            
                        </ul>
                    </div>
                  

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout"
                       href="<?php echo curPageURL() ?>/views/logout.php">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?php echo curPageURL() ?>/assets/back/img.jpg" alt="">Mokhtar Zayene
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href="<?php echo curPageURL() ?>/views/logout.php"><i
                                                class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img
                                                    src="<?php echo curPageURL() ?>/assets/back/images/img.jpg"
                                                    alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img
                                                    src="<?php echo curPageURL() ?>/assets/back/images/img.jpg"
                                                    alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img
                                                    src="<?php echo curPageURL() ?>/assets/back/images/img.jpg"
                                                    alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img
                                                    src="<?php echo curPageURL() ?>/assets/back/images/img.jpg"
                                                    alt="Profile Image"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
			<?php startblock( "main" ) ?>
			<?php endblock() ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                ets ZAYENE <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo curPageURL() ?>/assets/back/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo curPageURL() ?>/assets/back/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo curPageURL() ?>/assets/back/js/custom.min.js"></script>

   <script src="<?php echo curPageURL() ?>/assets/back/vendors/validator/validator.js"></script>
<?php startblock("javascripts")  ?>
<?php endblock() ?>

</body>
</html>
