<?php
include '../../../baseAdmin.php';

if (isset($_POST['name'])) {
    $garage = new Garage();
    $garage->setName($_POST["name"]);
    $garage->setAddress($_POST["address"]);
    $garage->setIdService($_POST["idservice"]);
    $result = $garageController->addGarage($garage);
    if($result == true)
      header( 'Location: '.curPageURL().'/views//admin/garage/' );
}
?>

<?php startblock("main");?>
<!-- top tiles -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="add.php" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Adress <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idservice" class="control-label col-md-3 col-sm-3 col-xs-12">Service</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required="required" name="idservice" class="form-control">
                                <option value="" hidden>Choose here</option>
		                        <?php
		                        $services = $garageController->getServices();
		                        foreach ( $services as $service ) {
                                    echo '<option value="' . $service["id"] . '">' . $service["name"] . '</option>';
		                        }
		                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endblock();?>

