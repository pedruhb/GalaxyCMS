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
								<h4 class="mt-0 header-title">LTD Logs</h4>
								<p class="text-muted mb-3">Veja os ltd logs do hotel, limitado aos últimos 1 mil.</p>
								<table class="table" id="datatable">
									<thead>
										<tr>
											<th class="wd-25p">Comprador</th>
											<th class="wd-25p">Dono</th>
											<th class="wd-25p">Raro</th>
											<th class="wd-15p">Lote</th>
											<th class="wd-15p">Quarto</th>
											<th class="wd-20p">Data</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$obtemLogs = $dbh->prepare("SELECT catalog_items_limited.timestamp, catalog_items_limited.item_id, users.username AS comprador, items.limited_data, items_base.item_name, items_base.public_name, items.room_id, novodono.username FROM catalog_items_limited, users, items, items_base, users novodono WHERE items_base.id = items.item_id AND items.id = catalog_items_limited.item_id AND users.id = catalog_items_limited.user_id AND novodono.id = items.user_id ORDER BY catalog_items_limited.timestamp DESC");
										$obtemLogs->execute();
										while ($log = $obtemLogs->fetch()) {
										?>
											<tr>
												<td class="text-primary"><?= $log['comprador']; ?></td>
												<td class="text-primary"><?= $log['username']; ?></td>
												<td class="text-primary"><?= $log['public_name']; ?></td>
												<td class="text-primary"><?= explode(":", $log['limited_data'])[1]; ?> de <?= explode(":", $log['limited_data'])[0]; ?></td>
												<td class="text-primary"><?= $log['room_id']; ?></td>
												<td class="text-primary"><?= date("d/m/y H:i", $log['timestamp']); ?></td>
											</tr>
										<?php } ?>
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