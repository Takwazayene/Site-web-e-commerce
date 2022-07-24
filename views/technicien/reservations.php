<?php
$currentPage = "reservations";
include '../../base.php';
if ( Config::getUserSession() == null ) {
	header( 'Location: ../login.php' );
}
if ( isset( $_POST["idReservation"] ) ) {
    $idr= $_POST["idReservation"];
	$result = $garageController->acceptReservation( $idr,$_POST["dateFin"] );

	$reservation = $garageController->getReservationsById($idr);
	$garage = $garageController->findGarage($reservation->getIdGarage());
	$user = $userController->findUserById($reservation->getIdClient());
	$mail =$user->getEmail();
	$service = $garageController->findService($reservation->getIdService());
	$message = "Votre réservation numéro "
               .$_POST["idReservation"]." du garage  "
               .$garage->getName()."  de service ".$service->getName()." a été acceptée";
	//UserController::sendEmail("Reservation Acceptee",$message,$mail);

            $to='zayenetakwa@gmail.com';
            $sujet='Reservation service rapide !';
            $texte=$message;
            $header='From : test@gmail.com';
            mail($to,$sujet,$texte,$header);
    
          

	//var_dump($result);
}

$garages      = $garageController->getGarages();
$reservations = $garageController->getReservationsByTechnicien( Config::getUserSession()->getId() );
?>

<?php startblock( "content" ); ?>
<!-- top tiles -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Gestion Reservations</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-widget-area">
    <div class="zigzag-bottom"></div>

    <div class="container">
        <div class="row" style="margin-top: 50px">
            <table cellspacing="0" class="shop_table cart">
                <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Garage</th>
                    <th class="product-price">Service</th>
                    <th class="product-quantity">Client</th>
                    <th class="product-subtotal">Date Debut</th>
                    <th class="product-subtotal">Status</th>
                    <th class="product-subtotal">Date Fin</th>
                    <th class="product-subtotal">Action</th>

                </tr>
                </thead>
                <tbody>
				<?php
				$color = "#fff";
				foreach ( $reservations as $reservation ) {
					if ( $reservation["status"] == "wait" ) {
						$color = "#fff6cb";
					} else if ( $reservation["status"] == "accepted" ) {
						$color = "#ccffcb";
					} else if ( $reservation["status"] == "refused" ) {
						$color = "#ffcbe3";
					} else if ( $reservation["status"] == "completed" ) {
						$color = "#d8d8d8";
					}
					?>

                    <tr style="background: <?php echo $color ?>" class="cart_item">
                        <td class="product-remove">
                            <a title="Remove this item" class="remove" href="#">×</a>
                        </td>
                        <td class="product-thumbnail">
                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up"
                                                               class="shop_thumbnail"
                                                               src="<?php echo curPageURL() ?>/assets/front/img/product-thumb-2.jpg"></a>
                        </td>
                        <td class="product-name">
                            <a href="single-product.html">
								<?php
								$garage = $garageController->findGarage( $reservation["id_garage"] );
								echo $garage->getName();
								?>
                            </a>
                        </td>
                        <td class="product-price">
                                <span class="amount">
                                    <?php
                                    $service = $garageController->findService( $reservation["id_service"] );
                                    echo $service->getName();
                                    ?>
                                </span>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity buttons_added">
								<?php
								$user = $userController->findUserById( $reservation["id_client"] );
								echo $user->getName() . " " . $user->getSurname();
								?>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <div>
								<?php
								echo $reservation["date_begin"];
								?>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <div>
								<?php
								echo $reservation["status"];
								?>
                            </div>
                        </td>
                        <form method="post" action="reservations.php">
                            <input type="hidden" name="idReservation" value="<?php echo $reservation["id"] ?>">
                            <td class="product-subtotal">
                                <div>
									<?php
									if ( $reservation["date_end"] ) {
										echo $reservation["date_end"];
									} else if ( $reservation["status"] == "wait" ) {
										echo "<input type='datetime-local' name='dateFin'>";
									} else
										echo '-------'
									?>
                                </div>
                            </td>
                            <td class="product-subtotal">
								<?php
								if ( $reservation["status"] == "wait" ) {
									?>
                                    <a class="btn btn-danger"
                                       href="refuse.php?id=<?php echo $reservation["id"] ?>">Annuler</a>
                                    <button type="submit" class="btn btn-success" href="">Accepter</button>
									<?php
								}
								?>
                            </td>
                        </form>

                    </tr>

					<?php
				}
				?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endblock(); ?>

