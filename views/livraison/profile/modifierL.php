<?PHP
//include "../../entities/livraison.php";
//include "../../core/livraisonL.php";
include "../../../base.php";


    $user = Config::getUserSession();
   // $idc=Config::getUserSession()->getId();
if (isset($_GET['id'])){
    $livraisonL=new livraisonL();
    $result=$livraisonL->recupererLivraison3($_GET['id']);
    foreach($result as $row){
        $idClt=$row['idClt'];
        $id=$row['id'];
        $nom=$row['nom'];
        $prenom=$row['prenom'];
        $adresse=$row['adresse'];
        $codep=$row['codep'];
        $email=$row['email'];
        $numt=$row['numt'];
        $cite=$row['cite'];
        $description=$row['description'];
    
?>
<!-- End mainmenu area -->

<?php startblock("content");?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Modifier Livraison : <br>
                        <span  style="font-size: 40px"> <?php  echo $adresse ?> </span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
           

    <div class="product-content-right">
         <div class="woocommerce">
<form enctype="multipart/form-data" id=""  method="POST" class="checkout"  name="checkout">
  
   <table>
<caption>Modifier Livraison</caption>
<tr>
<td>Identifiant</td>
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
<td>Cite</td>
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
<td>Tel</td>
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
</div>
</div>

<?PHP
    }
}

if (isset($_POST['modifier'])){
    $livraison=new livraison($idClt,$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['description'],$_POST['cite'],$_POST['codep'],$_POST['email'],$_POST['numt']);
     $livraison->setId($id);
    $livraisonL->modifierLivraison($livraison,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: afficheLivraison.php');
}

?>



</div>
</div>
</div>

   
<?php endblock() ?>
    