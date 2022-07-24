<HTML>
<head>
</head>
<body>
<?PHP
//include "../entities/employe.php";
//include "../core/employeC.php";
include "../../base.php";
startblock('content') ;
if (isset($_GET['idPanier'])){
	$panierC=new PanierC();
    $result=$panierC->recupererPanier($_GET['idPanier']);
	foreach($result as $row){
		$idPanier=$row['idPanier'];
		$idClient=$row['idClient'];
		$nomProd=$row['nomProd'];
		$idProduit=$row['idProduit'];
		$quantite=$row['quantite'];
		$prix=$row['prix'];
		
?>

<form method="POST" onsubmit="return executerverif()">
<table>
<caption>Modifier Panier</caption>
<p>
<tr>
<td>Nom Produit</td>
<td><input disabled type="text" name="nomProd" class="input-text " value="<?PHP echo $nomProd ?>"></td>
</tr>
</p>
<p>
<tr>
<td>Quantite</td>
<td><input type="number" name="quantite" id="quantite" class="input-text " value="<?PHP echo $quantite ?>"></td>
<span style="color: red" id="erreurQuantite"></span>
</tr>
</p>
<p>
<tr>
<td>Prix</td>
<td><input  disabled type="number" name="prix" class="input-text " value="<?PHP echo $prix ?>"></td>
</tr>
</p>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="idPanier_ini" value="<?PHP echo $_GET['idPanier'];?>"></td>
</tr>
</table>
</form>

<?PHP
	}
}
if (isset($_POST['modifier'])){
	$panier=new panier($idClient,$idProduit,$nomProd,$_POST['quantite'],$prix);
	 $panier->setIdPanier($idPanier);
	$panierC->modifierPanier($panier,$_POST['idPanier_ini']);

		
	//echo $_POST['cin_ini'];
	header('Location: afficherPanier.php');
}
?>
 <?php endblock() ;  ?>
</body>
</HTMl>

