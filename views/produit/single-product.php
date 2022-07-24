<?php
session_start();
/*include "../admin/core/ProduitC.php";
include "../admin/entities/Commentaire.php";
include "../admin/core/CommentaireC.php";
include "../admin/entities/Visiteur.php";
include "../admin/core/VisiteurC.php";*/
include '../../base.php';
 if(config::getUserSession()==null) {
        header('Location: ../login.php');
    }
$user = config::getUserSession();
$idUser=$user->getId() ; 
$nomUser=$user->getName() ; 
$prenomUser=$user->getSurname() ;

$comments=[];
if(isset($_POST['send_comment'])){
$commentaire=new Commentaire($_GET['id'],$idUser,$_POST['comment'],date('Y-m-d'),0);
$commentaireC=new CommentaireC();
$commentaireC->ajouterCommentaire($commentaire);
}
if (isset($_GET['id'])){
	$produitC=new ProduitC();
    $result=$produitC->recupererProduit($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$reference=$row['reference'];
		$nom=$row['nom'];
		$prix=$row['prix'];
		$datea=$row['datea'];
		$qte=$row['qte'];
		$description=$row['description'];
		$constructeur=$row['constructeur'];
		$modele=$row['modele'];
		$image=$row['image'];
		$categorie_id=$row['categorie_id'];
	}
	if($idUser){
		$commentaireC=new CommentaireC();
		$comments=$commentaireC->recupererAllCommentaire($_GET['id'],$idUser);
}
}
?>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

   
<?php startblock("content");?>
   
      
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        
                        
                    </div>
                       
					 
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Image</h2>
						
						   <img src="../admin/produits/images/produits/<?php echo $row['image']?>" alt="">
						   

                        <div class="thubmnail-recent">
                       
                            <h2><a href=""></a></h2>
                            <div class="product-sidebar-price">
                                <ins></ins> <del></del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                          
                            <h2><a href=""></a></h2>
                            <div class="product-sidebar-price">
                                <ins></ins> <del></del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                         
                            <h2><a href=""></a></h2>
                            <div class="product-sidebar-price">
                                <ins></ins> 
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                         
                            <h2><a href=""></a></h2>
                            <div class="product-sidebar-price">
                                <ins></ins> <del></del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title"></h2>
                        <ul>
                            <li><a href=""></a></li>
                          
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                           
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Plus des détails</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <h2 class="sidebar-title">Nom</h2>
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <ins><?php echo $nom?></ins> <del></del>
									 
									 
									  <h2 class="sidebar-title">Modéle</h2>
									     <ins><?php echo $modele?></ins> <del></del>
										
									
                                    <div class="product-inner-price">
									 <h2 class="sidebar-title">Prix</h2>
                                        <ins><?php echo $prix?></ins> <del></del>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $qte?>" name="quantity" min="1" step="1">
											
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Ajout au panier</button>
                                    </form>   
                                    
                                    
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"></a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Description Produit</h2>  
												  <ins><?php echo $description?></ins> <del></del>
                                                </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                               <div class="row">
							   <div class="col-md-offset-6 col-md-6">
							   <div class="row">
							   <div class="col-md-12">
							   <h2 style='font-size:20px;'>Commentaires</h2>  
							   </div>
							   </div>
							   <div class="row">
							   <div class="col-md-12">
							   <?PHP
					
								    foreach($comments as $comm){
                                    $userController=new  UserController();
                                    $visiteurs=$userController->recupererVisiteur($comm['id_visiteur']);
                                    foreach($visiteurs as $visiteur){
                                    $nom_visiteur=$visiteur['name'].' '.$visiteur['surname'];
                                }
                        
							
						
									echo "<b>".$nom_visiteur."</b><small>[".$comm['date']."]</small><br>";
									echo "<p>".$comm['comment']."</p>";
									
									echo "<a href='ajouter_like.php?id_comment=".$comm['id']."&id_prod=".$comm['id_produit']."'>";
								if($comm['jaime']==0){
									echo "<img src='img/like_off.png' style='width:20px;'>";
								}else{
									echo "<img src='img/like_on.png' style='width:20px;'><span class='badge'>".$comm['jaime']."</span>";
								}
			
								echo "</a>";
								echo "<hr>";
							
									?>

									<?php
								}
									?> 
							   </div>
							   </div>
						<?php
						if($idUser){
							?>
							   <form action="single-product.php?id=<?php echo $_GET['id']?>" method="POST">
							   <div class="row">
							   <div class="col-md-12">
							   
							   <textarea name='comment' class='form-control' placeholder='Votre commentaire'></textarea>
							    <div class="buttons">
        <input type='submit' class='btn btn-info' name='send_comment' value='Commenter'>
    </div>
							   </div>
							   </div>
							   <div class="row" style='margin-top:10px'>
							   <div class="col-md-12">
							   </div>
							   </div>
							   </form>
						<?php } ?>
							   </div>
</div>							   
                    
                          
                                </div>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>


   
  
	<style>
	. {
	border:none;
	padding:6px 0 6px 0;
	border-radius:75%;
	border-bottom:3px solid #4753f3;
	font:bold 13px Arial;
	color:#555;
	background:#fff;
}
   </style >

</style>

  <?php endblock();?>

