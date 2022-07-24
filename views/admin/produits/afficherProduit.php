<?php
/*include "../core/ProduitC.php";
include "../core/CategorieC.php";
include "../core/ConstructeurC.php";*/
include "../../../baseAdmin.php" ;
$produitC=new ProduitC();
$categorieC=new CategorieC();
$listecategorie=$categorieC->afficherCategories();
$tab_categorie=[];
foreach($listecategorie as $row){
	$tab_categorie[$row['id']]=$row['libelle'];
}	
$constructeurC=new ConstructeurC();
$listeConstructeur=$constructeurC->afficherConstructeurs();
$tab_constructeur=[];
foreach($listeConstructeur as $row){
	$tab_constructeur[$row['id']]=$row['nom'];
}	
$val_search='';
if(isset($_GET['recherche']) && !empty($_GET['recherche'])){
$val_search=$_GET['recherche'];
$listeproduit=$produitC->rechercherListeProduits($val_search);
}else if(isset($_GET['tri']) && !empty($_GET['tri'])){
$listeproduit=$produitC->triProduits($_GET['tri'],$_GET['order']);
}else{
$listeproduit=$produitC->afficherProduits();
}
?>


  
	<style>
	.icone_angle,
	.icone_angle:hover{
		color:#ffffff;
	</style>

				

            <?php startblock("main");?>
 <div class="page-title">
              <div class="title_left">
                <h3>Tableau des Produits <small></small></h3>
              </div>

              <form method='get'>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" name='recherche' class="form-control" autocomplete='off' value="<?php echo $val_search?>" placeholder="Rechercher...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>

              </div>
               </form>
            </div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produits <small>les differents produits</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  <form action="pdf.php">
						<input type="submit" name="pdf" style="float :right;padding-top: 5px;padding-left: 5px;padding-bottom: 5px;padding-right: 5px; background-color: #282828; color: #ffffff" value="Exporter PDF" class="btn btn-sm">
</form>

                  <div class="x_content">
                    <div class="table-responsive">
					<a href='afficherProduit.php' class='btn btn-info pull-right'><span class="fa fa-refresh"></span></a>
					<a href='statistiques.php' class='btn btn-info pull-right'><span	class="fa fa-bar-chart"></span></a>

					
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">
							<a href='afficherProduit.php?tri=reference&order=asc' class='icone_angle'></a>
							Reference 
							<a href='afficherProduit.php?tri=reference&order=desc' class='icone_angle'></span></a>
							 </th>
							 <th class="column-title">
							<a href='afficherProduit.php?tri=reference&order=asc' class='icone_angle'></a>
							Nom 
							<a href='afficherProduit.php?tri=reference&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							 </th>
							 <th class="column-title">
							 <a href='afficherProduit.php?tri=prix&order=asc' class='icone_angle'><span class="fa fa-angle-up"></span></a>
							 Prix
							<a href='afficherProduit.php?tri=prix&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							 </th>
							 <th class="column-title">
							<a href='afficherProduit.php?tri=reference&order=asc' class='icone_angle'><span class="fa fa-angle-up"></span></a>
							DateA 
							<a href='afficherProduit.php?tri=reference&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							 </th>
							  <th class="column-title">
							  <a href='afficherProduit.php?tri=qte&order=asc' class='icone_angle'><span class="fa fa-angle-up"></span></a>
							Quantite
							<a href='afficherProduit.php?tri=qte&order=desc' class='icone_angle'><span class="fa fa-angle-down"></span></a>
							</th>
							   <th class="column-title">Description </th>
							    <th class="column-title">Constructeur </th>
								 <th class="column-title">Modele </th>
								  <th class="column-title">Image </th>
								   <th class="column-title">Categorie_id </th>
							
                            <th class="column-title no-link last"><span class="nobr">Action</span> 
                            </th>
							<th class="column-title no-link last"><span class="nobr">Supprimer</span>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
						<?PHP
foreach($listeproduit as $row){
	?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=""><?PHP echo $row['reference']; ?></td>
							<td class=""><?PHP echo $row['nom']; ?></td>
							<td class=""><?PHP echo $row['prix']; ?></td>
							<td class=""><?PHP echo $row['datea']; ?></td>
							<td class=""><?PHP echo $row['qte']; ?></td>
							<td class=""><?PHP echo $row['description']; ?></td>
							<td class=""><?PHP echo $tab_constructeur[$row['constructeur']]; ?></td>
							<td class=""><?PHP echo $row['modele']; ?></td>
							<td class=""><img src="images/produits/<?PHP echo $row['image']; ?>" style="width:50px;"></td>
							<td class=""><?PHP echo $tab_categorie[$row['categorie_id']]; ?></td>
                            <td class=" last"><a href="modifierProduit.php?id=<?PHP  echo $row['id']; ?>">Modifier</a>
							<i class="fa fa-edit" style="font-size:36px"></i>
                            </td>
							<td>
							<form method="POST" action="supprimerProduit.php">
	                       <input type="submit" name="supprimer"  value="supprimer" onclick="return confirm('Etes-vous s&ucirc;r de vouloir supprimer ce commentaire ?');">
						   <script>
function popup(str) {
	var x=document.getElementsByClassName("cd-popup");
    if (str=="") {
        
        x[0].innerHTML =""
       
        xmlhttp.send(); 
       
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               x[0].innerHTML = this.responseText;
                 
            }


        };
        
         xmlhttp.open("GET","popup.php?id="+str,true);
        xmlhttp.send(); 
    }

}
</script>
						    <em class="fa fa-trash-o"></em></a>
                           <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	                        </form>
	                        </td>

                          </tr>
						  
                          <?PHP
}
	?>
	
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </th>
            </tr>
          </thead>
        </table>
      </div>
         
        <!-- /page content -->

       
<?php endblock();?>


   
