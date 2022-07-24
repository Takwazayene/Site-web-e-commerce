<?php
include '../../../baseAdmin.php';
$user = new User();
$roles = array("admin","technicien","user");
if (isset($_GET['id'])) {
    $user = $userController->findUserById($_GET['id']);
}
if (isset($_POST['id'])) {
	$user = new User();
	$user->setId($_POST["id"]);
	$user->setUsername($_POST["username"]);
	$user->setName($_POST["name"]);
	$user->setSurname($_POST["surname"]);
	$user->setEmail($_POST["email"]);
	$user->setRole($_POST["role"]);
	$user->setNumber($_POST["number"]);
	$result = $userController->updateUser($user);
	//var_dump($result);
	if($result === true)
	    header( 'Location: '.curPageURL().'/views/admin/user/' );
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
                <form action="update.php" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <input type="hidden" name="id" value="<?php echo $user->getId()?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pseudo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="username" required="required" value="<?php echo $user->getUsername() ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" required="required" value="<?php echo $user->getName() ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prénom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" value="<?php echo $user->getSurname() ?>" name="surname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="middle-name" value="<?php echo $user->getEmail() ?>" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Role</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="role" class="form-control">
                                <option value="" selected disabled hidden>Choose here</option>
                                <?php

                                    foreach ($roles as $role){
                                        if($role == $user->getRole())
                                            echo '<option selected="selected" value="'.$role.'">'.$role.'</option>';
                                        else
                                            echo '<option value="'.$role.'">'.$role.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Numéro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="number" name="number" required="required" value="<?php echo $user->getNumber() ?>" class="form-control col-md-7 col-xs-12">
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

