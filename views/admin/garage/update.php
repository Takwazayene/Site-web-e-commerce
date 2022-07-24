<?php
include '../../../baseAdmin.php';
if ( isset( $_GET['id'] ) ) {
	$garage = $garageController->findGarage( $_GET['id'] );
}
if ( isset( $_POST['id'] ) ) {
	$garage = new Garage();
	$garage->setId( $_POST["id"] );
	$garage->setName( $_POST["name"] );
	$garage->setAddress( $_POST["address"] );
	$garage->setIdService( $_POST["idservice"] );
	$result = $garageController->updateGarage( $garage );
	if ( $result == true ) {
		header( 'Location: ' . curPageURL() . '/views/admin/garage/' );
	}
}
?>

<?php startblock( "main" ); ?>
<!-- top tiles -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design
                    <small>different form elements</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form action="update.php" method="post" id="demo-form2" data-parsley-validate=""
                      class="form-horizontal form-label-left" novalidate="">
                    <input type="hidden" name="id" value="<?php echo $garage->getId() ?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" required="required"
                                   value="<?php echo $garage->getName() ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Adresse <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" value="<?php echo $garage->getAddress() ?>" name="address"
                                   required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Service</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required="required" name="idservice" class="form-control">
                                <option value="" hidden>Choose here</option>

								<?php
								$services = $garageController->getServices();
								foreach ( $services as $service ) {
									if ( $service["id"] == $garage->getIdService() ) {
										echo '<option selected="selected" value="' . $service["id"] . '">' . $service["name"] . '</option>';
									} else {
										echo '<option value="' . $service["id"] . '">' . $service["name"] . '</option>';
									}
								}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php endblock(); ?>

