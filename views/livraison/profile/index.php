<?php
	include '../../base.php' ;
	//include "../../core/UserController.php";
$user1C=new UserController();
$listeUsers=$user1C->afficherUsers();
    //session_start();
    if(Config::getUserSession()==null) {
		header('Location: ../login.php');
	}
    $user = Config::getUserSession();
?>
<table border="1">
<tr>
<td>id</td>
<td>Nom</td>
<td>Prenom</td>
<td>Adresse</td>
<td>Description</td>
<td>Cité</td>
<td>Codep</td>
<td>E-mail</td>
<td>Numero tel</td>

</tr>

<?PHP
foreach($listeUsers as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['username']; ?></td>
	<td><?PHP echo $row['name']; ?></td>
	<td><?PHP echo $row['surname']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['password']; ?></td>
	<td><?PHP echo $row['role']; ?></td>
	<td><?PHP echo $row['number']; ?></td>
	</tr>
<?PHP
}
?>
</table>