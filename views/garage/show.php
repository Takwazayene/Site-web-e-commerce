<?php
$currentPage="garage";
include '../../base.php';
if (isset($_GET['id'])) {
    $garage = $garageController->findGarage($_GET['id']);
	$gid = $_GET['id'];
}
if (isset($_POST['id'])) {
	$garage = new Garage();
	$result = $garageController->updateGarage($garage);
	if($result == true)
            header( 'Location: '.curPageURL().'/views/admin/garage/' );
}

?>

<?php startblock("content");?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div>
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="index.php">Garage</a>
                        <a href="show.php?id=<?php echo $garage->getId()?>"><?php echo $garage->getName()?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo curPageURL() ?>/assets/front/images/product-2.jpg" alt="">
                                </div>

                               
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $garage->getName()?></h2>

                                <form action="" class="cart">
                                    <a href="reserve.php?id=<?php echo $garage->getId()?>" class="add_to_cart_button" type="submit">Réservation Service</a>
                                </form>

                                <div>
	                                <?Php
                                    if(RatingController::isRated(Config::getUserSession()->getId(),$garage->getId())===false)
	                                    require "../../core/rating-v3/common-tags2.php";
	                                ?>
                                </div>

                                <div>
                                    <div style="padding: 20px;" class="product-wid-rating">
	                                    <?php
	                                    $rate = RatingController::getRating($garage->getId());
	                                    $ratef =  round($rate, 0, PHP_ROUND_HALF_DOWN);
	                                    for($i=0;$i<$ratef;$i++){
		                                    echo '<i class="fa fa-star"></i>';
	                                    }
	                                    for($i=$ratef;$i<5;$i++){
		                                    echo '<i style="color: #ccc" class="fa fa-star"></i>';
	                                    }
	                                    echo '<i>'.$ratef.'</i>'
	                                    ?>
                                    </div>

                                </div>

                                <div class="product-inner-category">
                                    <p>Services:1
                                        <a href="">Vidange</a>,
                                        <a href="">Lavage</a>
                                    </p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Reviews</h2>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo curPageURL() ?>/core/rating-v3/rating-ajax.js">
<?php endblock() ?>
