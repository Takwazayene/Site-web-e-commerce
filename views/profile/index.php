<?php
	include '../../base.php' ;
    if(Config::getUserSession()==null) {
		header('Location: ../login.php');
	}
    $user = Config::getUserSession();
?>
<?php startblock('content') ?>
	<h3> Nom : <?php echo $user->getName() ?></h3>
	<h3> Prénom : <?php echo $user->getSurname() ?></h3>
	<h3> Pseudo : <?php echo $user->getUsername() ?></h3>
	<h3> Email : <?php echo $user->getEmail() ?></h3>
	<h3> Role : <?php echo $user->getRole() ?></h3>
	<h3> Numéro : <?php echo $user->getNumber() ?></h3>
<?php endblock() ?>