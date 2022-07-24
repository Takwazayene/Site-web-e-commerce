<?php
include '../../../baseAdmin.php';
$user = new User();
$garages = $garageController->getGarages();

if (isset($_GET['id'])) {
    $user = $userController->findUserById($_GET['id']);
}
if (isset($_POST['id'])) {
	$user = new User();
	$user->setId($_POST["id"]);
	$user->setIdGarage($_POST["idgarage"]);
	$result = $userController->affectUserToGarage($user);
	if($result === true)
	   header( 'Location: '.curPageURL().'/views/admin/user/index.php?role=technicien' );
	else
		var_dump($result);

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
                <form action="affecter.php" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <input type="hidden" name="id" value="<?php echo $user->getId()?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled type="text" id="name" name="name" required="required" value="<?php echo $user->getName() ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Surname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled type="text" id="address" value="<?php echo $user->getSurname() ?>" name="surname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled id="middle-name" value="<?php echo $user->getEmail() ?>" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Garage</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select  required="required" name="idgarage" class="form-control">
                                <option value="" hidden>Choose here</option>
		                        <?php
		                        foreach ($garages as $garage){
			                        if($garage["id"] == $user->getIdGarage())
				                        echo '<option selected="selected" value="'.$garage["id"].'">'.$garage["name"].'</option>';
			                        else
				                        echo '<option value="'.$garage["id"].'">'.$garage["name"].'</option>';
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

<?php endblock();?>

