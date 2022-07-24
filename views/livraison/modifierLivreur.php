<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/livraison.php";
include "../core/livraisonL.php";
if (isset($_GET['id'])){
	$livraisonL=new LivraisonL();
    $result=$livraisonL->recupererLivraison($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$adresse=$row['adresse'];
		$description=$row['description'];
		$cite=$row['cite'];
		$codep=$row['codep'];
		$email=$row['email'];
		$numt=$row['numt'];

?>
<form method="POST">
<table>
<caption>Modifier Livraison</caption>
<tr>
<td>CIN</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>Adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>Description</td>
<td><input type="text" name="description" value="<?PHP echo $description ?>"></td>
</tr>
<tr>
<td>Cité</td>
<td><input type="text" name="cite" value="<?PHP echo $cite ?>"></td>
</tr>
<tr>
<td>Code postal</td>
<td><input type="number" name="codep" value="<?PHP echo $codep ?>"></td>
</tr>
<tr>
<td>E-mail</td>
<td><input type="text" name="email" value="<?PHP echo $email ?>"></td>
</tr>
<tr>
<td>Numero tel</td>
<td><input type="number" name="numt" value="<?PHP echo $numt ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livraison=new livraison($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['description'],$_POST['cite'],$_POST['codep'],$_POST['email'],$_POST['numt']);
	$livraisonL->modifierLivraison($livraison,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherLivraison.php');
}
?>
</body>
</HTMl>