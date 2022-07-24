<?php
include '../../../baseAdmin.php';
$garages = $garageController->getGarages();
?>


<?php startblock("main");?>
<!-- top tiles -->
<div class="row">
	this is a simple test admin page
</div>
<?php

foreach ($garages as $garage){
	echo $garage["name"].'    ';
}

?>

<?php endblock();?>

