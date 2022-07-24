<?php
include '../../../baseAdmin.php';
$users = $userController->getUsers();
$role="Tous";
if(isset($_GET["role"])){
	$role = $_GET["role"];
    if($role == "technicien")
	    $users = $userController->getUsersByRoles("technicien");
	else if($role == "user")
		$users = $userController->getUsersByRoles("user");
	else if($role == "admin")
		$users = $userController->getUsersByRoles("admin");
	else
	    $role="TOUS";
}
?>

<?php startblock("main");?>
<!-- top tiles -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><b>Liste Utilisateurs : </b><?php echo strtoupper($role)?></h2>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">

			

				<div class="table-responsive">
					<table class="table table-striped jambo_table bulk_action">
						<thead>
						<tr class="headings">
							<th class="column-title"># </th>
							<th class="column-title">Nom </th>
							<th class="column-title">Prénom </th>
							<th class="column-title">Email</th>
							<th class="column-title">Role</th>
							<?php if($role=="technicien") { ?>
                                <th class="column-title">Garage</th>
                            <?php
							    }
                            ?>
							<th class="column-title no-link last"><span class="nobr">Action</span>
							</th>
							<th class="bulk-actions" colspan="7">
								<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
							</th>
						</tr>
						</thead>

						<tbody>
						<?php

						foreach ($users as $user){?>

							<tr class="even pointer">
								<td class=" "><?php echo $user["id"] ?></td>
								<td class=" "><?php echo $user["name"] ?></td>
								<td class=" "><?php echo $user["surname"] ?></td>
								<td class=" "><?php echo $user["email"] ?></td>
								<td class=" "><?php echo $user["role"] ?></td>
								<?php if($role=="technicien") { ?>
                                    <td class=" "><?php
										$garages    = $garageController->getGarages();
										$nameGarage = "non défini";
										foreach ( $garages as $garage ) {
											if ( $garage["id"] == $user["id_garage"] ) {
												$nameGarage = $garage["name"];
											}
										}
										echo $nameGarage;
										?></td>
									<?php
								}
                                ?>
								<td class="">
									<form style="float: left;" action="delete.php" method="post">
										<input type="hidden" value="<?PHP echo $user['id']; ?>" name="id">
										<input type="submit" class="btn btn-danger" value="Supprimer" >
									</form>
                                    <form style="float: left;" action="update.php" method="get">
                                        <input type="hidden" value="<?PHP echo $user['id']; ?>" name="id">
                                        <input type="submit" class="btn btn-info" value="Modifier" >
                                    </form>
                                    <?php if($role=="technicien"){ ?>
                                        <form style="float: left;" action="affecter.php" method="get">
                                            <input type="hidden" value="<?PHP echo $user['id']; ?>" name="id">
                                            <input type="submit" class="btn btn-success" value="Affecter" >
                                        </form>
                                    <?php
                                     }
                                    ?>
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

