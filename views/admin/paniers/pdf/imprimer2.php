<?php
include "../../../../core/commandeC.php";
include "../../../../core/Config.php";
//require ('db.php');
/*$currentPage="imprimer" ; 
include '../../../../baseAdmin.php';*/
ob_start();
?>
<page backtop="10mm">
	 <h1> Toutes les commandes </h1>
		<table style="width:100%;border: 1px dashed">
		<tr>
			

                          <th  style="width: 15%">id commande</th>
                          <th  style="width: 15%">id client</th>
                          <th style="width: 15%">date</th>
                          <th  style="width: 15%">livraison</th>
                          <th style="width: 15%">quantite</th>
						   <th style="width: 15%">total</th>
						    <th style="width: 15%">etat</th>
                          

                      
		</tr>
		<?php
	
$commande1C=new CommandeC();
$listeCommandes=$commande1C->afficherCommandes();
foreach($listeCommandes as $row) {
			?>
		<tr>
	<td><?PHP echo $row['idCom']; ?></td>
	<td><?PHP echo $row['idClt']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><?PHP echo $row['livraison']; ?></td>
	<td><?PHP echo $row['quantite']; ?></td>
    <td><?PHP echo $row['total']; ?></td>    
	<td><?PHP echo $row['etat']; ?></td>  
		</tr>
			<?php  
		}

?>
	</table>


</page>

<?php
$content= ob_get_clean();
require('html2pdf/html2pdf.class.php');
try{
$pdf=new html2pdf('p','A4','fr','true','UTF-8');
$pdf->pdf->SetDisplayMode('fullpage');

$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(true)');
$pdf->Output('test.pdf');
}
catch(HTML2PDF_exception $e)
{
	die($e);
}

?>