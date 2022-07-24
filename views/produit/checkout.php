<?PHP
//include "../admin/entities/Reclamation.php";
//include "../admin/core/ReclamationC.php";
$currentPage="reclamation";
include '../../base.php';
$msg='';
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse'])&& isset($_POST['cp'])&& isset($_POST['ville'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['sujet']))
{
$reclamation=new Reclamation($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['email'],$_POST['phone'],$_POST['sujet']);
$reclamationC=new ReclamationC();
$reclamationC->ajouterReclamation($reclamation);
$msg='Reclamation envoyé avec succés';
}

?>
   

    <?php startblock("content");?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Réclamations</h2>
                    </div>
                </div>
            </div>
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
                                                <input type="text" value="" placeholder="" id="nom" name="nom" class="input-text" autocomplete='off'>
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Prénom <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="prenom" name="prenom" class="input-text " autocomplete='off'>
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
												 <option value="Beja">Beja</option>
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
								
								
								
                                           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <input id="send" type="submit" class="btn btn-success" name="send" value='Envoyer'>

                                        </div>
                                    </div>
								</div>
                                     </div>
                                </div>
								
							</form>
                           
						</div>
					</div>
				</div>
	        
   
<?php endblock();?>

