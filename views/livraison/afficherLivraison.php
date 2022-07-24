 <?PHP
//include "../core/livraisonL.php";
$livraison1L=new LivraisonL();
$listeLivraisons=$livraison1L->afficherLivraisons();

//var_dump($listeEmployes->fetchAll());
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
<td>Date</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeLivraisons as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><?PHP echo $row['description']; ?></td>
	<td><?PHP echo $row['cite']; ?></td>
	<td><?PHP echo $row['codep']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['numt']; ?></td>
	<td><?PHP echo $row['datel']; ?></td>
	<td><form method="POST" action="supprimerLivraison.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierLivraison.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
<?PHP
}
?>
</table>


