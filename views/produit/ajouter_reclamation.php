 <?PHP
include '../../base.php';
 $currentPage == "reclamation2";
 if(!isset($_SESSION)) {
    session_start();
    }

$user = config::getUserSession();
$idUser=$user->getId() ; 
$nomUser=$user->getName() ; 
$prenomUser=$user->getSurname() ;

$msg='';
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse'])&& isset($_POST['cp'])&& isset($_POST['ville'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['sujet']))
{
$reclamation=new Reclamation($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['email'],$_POST['phone'],$_POST['sujet']);
$reclamationC=new ReclamationC();
$reclamationC->ajouterReclamation($reclamation);

echo "<script>notifyMe('".$_POST['prenom']."','".$_POST['nom']."','".$_POST['sujet']."')</script>";
$msg='Reclamation envoyé avec succés';

}

?>
   
       
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
                        <div class="woocommerce">
						<?php if( $msg !=''){
							?>
							<div style='background-color:#AFF2B2;padding:15px;margin-top:15px;margin-bottom:15px;'><?php echo $msg?></div>
						<?php } ?>
                            <form enctype="multipart/form-data" class="checkout" method="POST" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>remplir ce formulaire </h3>
                                            
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Nom <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text"  placeholder="" id="nom" name="nom" value="<?php echo $nomUser?>" class="input-text" autocomplete='off' readonly>
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Prénom <abbr title="required"class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="" id="prenom" name="prenom" class="input-text " value="<?php echo $prenomUser?>" readonly  autocomplete='off'>
                                            </p>
                                            
                                                <label class="" for="billing_address_1">Addresse <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="adresse" name="adresse" class="input-text " autocomplete='off'>
                                            </p>
											<p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">cp <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="cp" name="cp" class="input-text " minlength="4" maxlength="4" size="10" autocomplete='off'>
                                            </p>
											
                                               <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label class="" for="billing_country">ville <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="country_to_state country_select" id="ville" name="ville">
                                                    <option value="">sélectionner une ville…</option>
                                                    <option value="Monastir">Monastir</option>
                                                    <option value="Sfax">Sfax</option>
                                                    <option value="Mahdia">Mahdia</option>
                                                    <option value="Sousse">Sousse</option>
													<option value="Tunis">Tunis</option>
													<option value="Mahdia">Mahdia</option>
													// <option value="Beja">Beja</option>
                                                    </select>
                                                </p>
                                             
                                            
                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input  type="email" placeholder="mail@serveur.com" id="email" name="email" class="input-text " autocomplete='off'>
										
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="phone" name="phone" class="input-text " autocomplete='off'>
                                            </p>
											<p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email"> Sujet <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="sujet" name="sujet" class="input-text " autocomplete='off'>
                                            </p>
                                            <div class="clear"></div>
								
								
								
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input id="send" type="submit" class="btn btn-success" name="send" value='Envoyer' >
</div>
                                    </div>
								</div>
								
							</form>
							<div id="fb-root"></div>
							 <h3>Donner votre avis par rapport a notre site </h3>
                                            
							
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.2"></script>
<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                           	<li class=""><a href="http://localhost/gestion_produit/livechat/php/app.php?admin"><em class="fa fa-toggle-off">&nbsp;</em> forum</a></li>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>         
    <script src="main_js.js"></script>
      <?php endblock();?>

