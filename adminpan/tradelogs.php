<?php GalaxyHK::VerificaPermissao("logs"); ?>
<html lang="en">
<?php include 'assets/head.php'; ?>

<body>
	<!-- Top Bar Start -->
	<div class="topbar">
		<!-- LOGO -->
		<?php include 'assets/logo.php'; ?>
		<!--end logo-->
		<!-- Navbar -->
		<?php include 'assets/navbar.php'; ?>
		<!-- end navbar-->
	</div>
	<!-- Top Bar End -->
	<div class="page-wrapper">
		<!-- Left Sidenav -->
		<div class="left-sidenav">
			<div class="main-icon-menu">
				<?php include 'assets/menulateral.php'; ?>
			</div>
			<!--end main-icon-menu-->
			<div class="main-menu-inner active">
				<div class="slimScrollDiv active" style="position: relative; overflow: hidden; width: auto; height: 363px;">
					<div class="menu-body slimscroll in" style="overflow: hidden; width: auto; height: 363px;">
						<div id="MetricaOthers" class="main-icon-menu-pane active mm-active">
							<div class="title-box">
								<h6 class="menu-title">Menu</h6>
							</div>
							<ul class="nav metismenu" id="main_menu_side_nav">
								<?php include 'assets/menu.php'; ?>
							</ul>
							<!--end nav-->
						</div>
						<!-- end Others -->
					</div>
					<div class="slimScrollBar" style="background: rgb(224, 229, 241); width: 7px; position: absolute; top: 0px; opacity: 1; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 897px;">
					</div>
					<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
					</div>
				</div>
				<!--end menu-body-->
			</div>
			<!-- end main-menu-inner-->
		</div>
		<!-- end left-sidenav-->
		<!-- Page Content-->
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="page-title-box">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class="mt-0 header-title">Tradelogs</h4>
								<p class="text-muted mb-3">Veja as trocas do hotel, limitado aos últimos 5 mil.</p>
								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th>ID</th>
											<th>Usuário 1</th>
											<th>Usuário 1 deu</th>
											<th>Usuário 2</th>
											<th>Usuário 2 deu</th>
											<th>Data</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$getLogs = $dbh->prepare("SELECT room_trade_log.id, room_trade_log.timestamp, room_trade_log.user_one_id, u1.username AS usuario1, room_trade_log.user_two_id, u2.username AS usuario2 FROM room_trade_log, users u1, users u2 WHERE u1.id = room_trade_log.user_one_id AND u2.id = room_trade_log.user_two_id ORDER BY room_trade_log.id DESC LIMIT 100");
										$getLogs->execute();
										while ($log = $getLogs->fetch()) {
											echo '<tr>
													<td>' . $log["id"] . '</td>
													<td>' . $log["usuario1"] . '</td><td>';
											$getItems1 = $dbh->prepare("SELECT * FROM room_trade_log_items WHERE id = :id and user_id = :user");
											$getItems1->bindValue(":id", $log["id"]);
											$getItems1->bindValue(":user", $log["user_one_id"]);
											$getItems1->execute();
											while ($items1 = $getItems1->fetch()) {
												$getitemdetail1 = $dbh->prepare("SELECT item_id FROM items WHERE id = :id");
												$getitemdetail1->bindValue(":id", $items1['item_id']);
												$getitemdetail1->execute();
												if ($getitemdetail1->rowCount() >= 1) {
													$itemdetail1 = $getitemdetail1->fetch();
													$getItemName = $dbh->prepare("SELECT item_name FROM items_base WHERE id = :id");
													$getItemName->bindValue(":id", $itemdetail1['item_id']);
													$getItemName->execute();
													$itemname = $getItemName->fetch();
													echo $itemname['item_name'] . " (" . $items1['item_id'] . ")<br>";
												} else {
													echo "Mobi não existe mais - " . $items1['item_id'] . "<br>";
												}
											}
											echo '</td><td>' . $log["usuario2"] . '</td><td>';
											$getItems1 = $dbh->prepare("SELECT * FROM room_trade_log_items WHERE id = :id and user_id = :user");
											$getItems1->bindValue(":id", $log["id"]);
											$getItems1->bindValue(":user", $log["user_two_id"]);
											$getItems1->execute();
											while ($items1 = $getItems1->fetch()) {
												$getitemdetail1 = $dbh->prepare("SELECT item_id FROM items WHERE id = :id");
												$getitemdetail1->bindValue(":id", $items1['item_id']);
												$getitemdetail1->execute();
												if ($getitemdetail1->rowCount() >= 1) {
													$itemdetail1 = $getitemdetail1->fetch();
													$getItemName = $dbh->prepare("SELECT item_name FROM items_base WHERE id = :id");
													$getItemName->bindValue(":id", $itemdetail1['item_id']);
													$getItemName->execute();
													$itemname = $getItemName->fetch();
													echo $itemname['item_name'] . " (" . $items1['item_id'] . ")<br>";
												} else {
													echo "Mobi não existe mais - "  . $items1['item_id'] . "<br>";
												}
											}
											echo '<td>' . date('d/m/y h:i:s', $log["timestamp"]) . '</td></td>';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- end col -->
				</div>
				<!-- container -->
				<?php include 'assets/footer.php'; ?>
				<!--end footer-->
			</div>
			<!-- end page content -->
		</div>
		<!-- end page-wrapper -->
		<!-- jQuery  -->
		<script src="/adminpan/assets/js/jquery.min.js">
		</script>
		<script src="/adminpan/assets/js/bootstrap.bundle.min.js">
		</script>
		<script src="/adminpan/assets/js/metisMenu.min.js">
		</script>
		<script src="/adminpan/assets/js/waves.min.js">
		</script>
		<script src="/adminpan/assets/js/jquery.slimscroll.min.js">
		</script>
		<!-- Required datatable js -->
		<script src="/adminpan/assets/plugins/datatables/jquery.dataTables.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/dataTables.bootstrap4.min.js">
		</script>
		<!-- Buttons examples -->
		<script src="/adminpan/assets/plugins/datatables/dataTables.buttons.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/buttons.bootstrap4.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/jszip.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/pdfmake.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/vfs_fonts.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/buttons.html5.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/buttons.print.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/buttons.colVis.min.js">
		</script>
		<!-- Responsive examples -->
		<script src="/adminpan/assets/plugins/datatables/dataTables.responsive.min.js">
		</script>
		<script src="/adminpan/assets/plugins/datatables/responsive.bootstrap4.min.js">
		</script>
		<!-- App js -->
		<script src="/adminpan/assets/js/app.js">
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#datatable').DataTable({
					autoFill: true,
					order: [
						[0, 'desc']
					]
				});
			});
		</script>
</body>

</html>