<?php GalaxyHK::VerificaPermissao("raros");?>
<html lang="en">
<?php include 'assets/head.php';?>
<body>
	<!-- Top Bar Start -->
	<div class="topbar">
		<!-- LOGO -->
		<?php include 'assets/logo.php';?>
		<!--end logo-->
		<!-- Navbar -->
		<?php include 'assets/navbar.php';?>
		<!-- end navbar-->
	</div>
	<!-- Top Bar End -->
	<div class="page-wrapper">
		<!-- Left Sidenav -->
		<div class="left-sidenav">
			<div class="main-icon-menu">
				<?php include 'assets/menulateral.php';?>
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
								<?php include 'assets/menu.php';?>
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
								<h4 class="mt-0 header-title">Raros</h4>
								<p class="text-muted mb-3">Visualize e gerencie aqui os raros do hotel.</p>
								<?php
								if(isset($_POST['a'])){
									$id_mobi = $_POST['a'];
									$apaga = $dbh->prepare("DELETE FROM catalog_items WHERE id = :id LIMIT 1");
									$apaga->bindParam(':id', $id_mobi);
									$apaga->execute();

									GalaxyHK::Sucesso("Raro ".$id." apagado com sucesso!");
									GalaxyHK::Log("Apagou o raro ".$id, "Apagou o raro ".$id);
								}
								?>
								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th>ID</th>
											<th>Mobi</th>
											<th>Página</th>
											<th>Estoque</th>
											<th>Vendidos</th>
											<th>Apagar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$paginas = $dbh->prepare("SELECT * FROM catalog_items WHERE limited_stack > 0 ORDER BY id");
										$paginas->execute();
										while($pagina = $paginas->fetch())
										{
											$furniture = $dbh->prepare("SELECT item_name FROM furniture WHERE id = '".$pagina['item_id']."'");
											$furniture->execute();
											$furniture = $furniture->fetch();
											$pages = $dbh->prepare("SELECT caption,icon_image FROM catalog_pages WHERE id = '".$pagina['page_id']."'");
											$pages->execute();
											$pages = $pages->fetch();
											$nomecata = utf8_encode($pages['caption']);
											echo'
											<tr>
											<td style="width: 1px;">'.$pagina['id'].'</td>
											<td><img draggable="false" src="https://swf.galaxyservers.com.br/dcr/hof_furni/'.str_replace('*','_',$furniture['item_name']).'_icon.png">     '.utf8_decode($pagina['catalog_name']).'</td>
											<td><img src="https://swf.galaxyservers.com.br/c_images/catalogue/icon_'.$pages['icon_image'].'.png"> '.$nomecata.'</td>
											<td>'.$pagina['limited_stack'].'</td>
											<td>'.$pagina['limited_sells'].'</td>
											<td><form method="post"><input type="hidden" name="a" value="'.$pagina['id'].'"><input type="image" src="https://i.imgur.com/EzvfUGW.png" onclick="return confirm(\'Tem certeza que deseja excluir esse raro? a ação não pode ser desfeita!\')"></form></td>
											</tr>
											';
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
				<?php include 'assets/footer.php';?>
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
					order: [[0, 'desc']]});
			});
		</script>
	</body>
	</html>