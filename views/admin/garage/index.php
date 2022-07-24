<?php
include '../../../baseAdmin.php';
$garages = $garageController->getGarages();
?>

<?php startblock("main");?>
<!-- top tiles -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Liste Garage <small>service rapides</small></h2>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">

				

				<div class="table-responsive">
					<table class="table table-striped jambo_table bulk_action">
						<thead>
						<tr class="headings">
							<th>
								<div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" id="check-all" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
							</th>
							<th class="column-title"># </th>
							<th class="column-title">Nom </th>
							<th class="column-title">Adresse </th>
							<th class="column-title">Service</th>
							<th class="column-title no-link last"><span class="nobr">Action</span>
							</th>
							<th class="bulk-actions" colspan="7">
								<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
							</th>
						</tr>
						</thead>

						<tbody>
						<?php

						foreach ($garages as $g){?>

							<tr class="even pointer">
								<td class="a-center ">
									<div class="icheckbox_flat-green" style="position: relative;">
                                        <input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
								</td>
								<td class=" "><?php echo $g["id"] ?></td>
								<td class=" "><?php echo $g["name"] ?></td>
								<td class=" "><?php echo $g["address"] ?></td>
								<td class=" "><?php
                                     $service = $garageController->findService($g["id_service"]);
                                    echo $service->getName();
                                    ?></td>
								<td class="">
									<form style="float: left;" action="delete.php" method="post">
										<input type="hidden" value="<?PHP echo $g['id']; ?>" name="id">
										<input type="submit" class="btn btn-danger" value="Supprimer" >
									</form>
                                    <form style="float: left;" action="update.php" method="get">
                                        <input type="hidden" value="<?PHP echo $g['id']; ?>" name="id">
                                        <input type="submit" class="btn btn-info" value="Modifier" >
                                    </form>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>


			</div>
		</div>
	</div>
</div>

<?php endblock();?>

