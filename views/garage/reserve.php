<?php
$currentPage="garage";
include '../../base.php';

$services = $garageController->getServices();

if (isset($_GET['id'])) {
    $garage = $garageController->findGarage($_GET['id']);
}
if (isset($_POST['idGarage'])) {
	$reservation = new Reservation();

	$reservation->setDateBegin($_POST['date']);
	$reservation->setIdGarage($_POST['idGarage']);
	$reservation->setIdService($_POST['service']);
	$reservation->setIdTechnicien($_POST['user']);
	$reservation->setIdClient(Config::getUserSession()->getId());
	$result = $garageController->addReservation($reservation);
	if($result == true)
	    header( 'Location: '.curPageURL().'/views/garage/reservations.php' );
}
?>

<?php startblock("content");?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Réservation Rappide <br>
                        <span  style="font-size: 40px"> <?php  echo  $garage->getName()?> </span>
                    </h2>
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
                    <h2 class="sidebar-title">chercher un mécanicien</h2>
                    <form action="">
                        <input type="text" placeholder="Chercher un mécanicien...">
                        <input type="submit" value="chercher">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Mécanicien Disponible</h2>
                    <?php
                        $techniciens= $userController->getUsersByGarage($garage->getId());
                        foreach ($techniciens as $technicien){
                    ?>
                    <div class="thubmnail-recent">
                        <img src="<?php echo  curPageURL()?>/assets/front/img/mecanicien.png" class="recent-thumb" alt="">
                        <h2><a href="single-product.html"><?php echo $technicien["name"].' '.$technicien["surname"] ?></a></h2>
                        <div class="product-sidebar-price">
                            <ins>Adresse</ins>
                        </div>
                    </div>
                    <?php
                        }
                    ?>

                </div>

                <div class="single-sidebar">

                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">



                        <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                            <div id="customer_details" >
                                <div >
                                    <div class="woocommerce-billing-fields">
                                        <h3>Billing Details</h3>
                                        <input name="idGarage" type="hidden" value="<?php echo $garage->getId()?>">
                                        <div class="">
                                            <label class="" for="billing_country">Garage <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="<?php echo $garage->getName()?>" disabled >
                                        </div>
                                        <div>
                                            <label class="" for="billing_country">Service <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <select name="service">
                                                <option value="">choisir un service…</option>
                                                <?php
                                                    foreach ($services as $service){
                                                        echo '<option value="'.$service["id"].'">'.$service["name"].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="" for="billing_country">Mecanicien <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <select name="user">
                                                <option value="">choisir un mecanicien…</option>
                                                <?php
                                                $techniciens = $userController->getUsersByGarage($garage->getId());
                                                foreach ($techniciens as $technicien){
                                                        echo '<option value='.$technicien["id"].'>'.$technicien["name"].' '.$technicien["surname"].'</option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div>
                                            <label class="" for="billing_first_name">Date<abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input name="date"  type="datetime-local" value="" placeholder="" class="input-text ">
                                        </div>
                                        <div>
                                            <input type="submit" data-value="Place order" value="envoyer" id="place_order" name="woocommerce_checkout_place_order" onclick="envoyer()" class="button alt">
                                        </div>
                                        <div class="clear"></div>

                                    </div>
                                </div>

                            </div>x
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endblock();?>

