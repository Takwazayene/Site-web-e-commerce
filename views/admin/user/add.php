<?php
include '../../../baseAdmin.php';
$user = new User();
$roles = array("admin","technicien","user");
if (isset($_POST['id'])) {
	$user = new User();
	$user->setId($_POST["id"]);
	$user->setUsername($_POST["username"]);
	$user->setName($_POST["name"]);
	$user->setSurname($_POST["surname"]);
	$user->setEmail($_POST["email"]);
	$user->setRole("technicien");
	$user->setNumber($_POST["number"]);
	$user->setPassword($_POST["password"]);
	$result = $userController->addUser($user);
	//var_dump($result);
	if($result === true)
	    header( 'Location: '.curPageURL().'/views/admin/user/index.php?role=technicien' );
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
                    <input type="hidden" name="id" value="<?php echo $user->getId()?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pseudo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="username" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prénom <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="address" name="surname" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password " class="control-label col-md-3 col-sm-3 col-xs-12">mot de passe</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="password" type="password"  id="password" class="form-control" placeholder="Your Password *" value="" />
                            <input name="password_confirm" type="password" oninput="check(this)" class="form-control" placeholder="Repeat Your Password *" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Numéro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="number" name="number"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button class="btn btn-success" type="submit">Ajout </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php endblock();?>


<?php startblock("javascripts")  ?>
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
            console.log("unmatch");
        } else {
            // input is valid -- reset the error message    
            input.setCustomValidity('');
        }
    }
</script>
<?php endblock() ?>

