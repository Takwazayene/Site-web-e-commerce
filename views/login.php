	<?php 
    include '../base.php' ;
	$error = "";
	if(!isset($_SESSION)) {
    session_start();
    }
	
	if(Config::getUserSession()) {
		header('Location: profile/index.php');
	}

	if(isset($_POST["email"])){

		$email = $_POST["email"];
		$password = $_POST["password"];

		$result = $userController->findUser($email,$password);
		if($result == null)
			$error ="Email et/ou mot de passe est incorrect";
		else{
			if($result instanceof  User){
				Config::setUserSession($result);
                if ($result->getRole() != "admin")
			    	header('Location: profile/index.php');
                else
			    	header('Location: admin/index.php');
			}

		}
	}
?>
<?php startblock('stylesheet') ?>
	<style type="text/css">
		.login-container{
		    margin-top: 5%;
		    margin-bottom: 5%;
		}
		.form-login{
			padding-top:20px; padding-right: 20%;padding-left: 20%;
		}
	</style>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container login-container">
	<div class="row">
		<div class="col-md-12" style="text-align: center">
			<h3>Connexion</h3>
			<p style="color:red"><?php echo $error ?></p>
			<form class="form-login" action="login.php"  method="post">
				<div class="form-group">
					<input name="email" type="text" class="form-control" placeholder="Your Email *" value="" />
				</div>
				<div class="form-group">
					<input name="password" type="password" class="form-control" placeholder="Your Password *" value="" />
				</div>
				<div class="form-group">
					<input type="submit" class="btnSubmit" value="Login" />
				</div>
				<div class="form-group">
					<a href="#" class="ForgetPwd">Mot de passe Oublié?</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php endblock() ?>