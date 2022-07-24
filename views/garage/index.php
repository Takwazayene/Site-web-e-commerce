<?php
$currentPage="garage";
include '../../base.php';
$garages = $garageController->getGarages();
if(isset($_GET["nameGarage"])){
    $garages = $garageController->findGarageByName($_GET["nameGarage"]);
    var_dump($garages);
}
?>

<?php startblock("content");?>
<!-- top tiles -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Liste garages</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>

    <div class="container">
        <div class="row" style="margin-top: 50px">

            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Rechercher garage </h2>
                    <form action="index.php" method="get">
                        <input name="nameGarage" type="text" placeholder="entrez nom du garage...">
                        <input type="submit" value="Rechercher">
                    </form>
                </div>

        

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Des nouveaux services</h2>
                    <ul>
                        <li><a href="">service lavage - 2019</a></li>
                        <li><a href="">service lavage2 - 2019</a></li>
                        <li><a href="">service vidange - 2019</a></li>
                        <li><a href="">service maintenance - 2019</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
		            <?php
		            foreach ($garages as $garage){
			            ?>

                        <div class="col-md-4">
                            <div class="single-wid-product">
                                <a href="single-product.html"><img src="../../assets/front/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                                <h2><a href="<?php echo curPageURL() ?>/views/garage/show.php?id=<?php echo $garage["id"]?>" ><?php echo $garage["name"]?></a></h2>
                                <div class="product-wid-rating">
	                                <?php
                                        $rate = RatingController::getRating($garage["id"]);
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
                                <div class="product-wid-price">
                                    <a href="show.php?id=<?php echo $garage["id"]?>" class="btn btn-primary">Détails</a>
                                </div>
                            </div>
                        </div>
			            <?php
		            }
		            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock();?>

