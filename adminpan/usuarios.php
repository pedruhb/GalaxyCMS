<?php GalaxyHK::VerificaPermissao("usuario");?>
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
								<h4 class="mt-0 header-title">Usuários</h4>
								<p class="text-muted mb-3">Visualize e gerencie aqui os usuários do hotel, limitado aos últimos 1000 registrados.</p>
								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th></th>
											<th>Usuário</th>
											<th>Rank</th>
											<th>Email</th>
											<th>IP</th>
											<th>Creditos</th>
											<th>Duckets</th>
											<th>Diamantes</th>
											<th>GOTW</th>
											<th>Status</th>
											<th>Registro</th>
											<th>Opções</th>
										</tr>
									</thead>
									<style type="text/css">
										.badge.badge-soft-moedas {
											background-color: rgb(231, 234, 13)!important;
											color: #000000!important;
											-webkit-box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
											box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
										}
										.badge.badge-soft-duckets {
											background-color: rgba(255, 0, 247, 0.88)!important;
											color: #ffffff!important;
											-webkit-box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
											box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
										}
										.badge.badge-soft-diamantes {
											background-color: rgb(13, 234, 224)!important;
											color: #1e242b!important;
											-webkit-box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
											box-shadow: 0 0 13px 0 rgba(30,202,184,.05);
										}

									</style>
									<tbody>
										<?php
										$getArticles = $dbh->prepare("SELECT * FROM users order by id desc limit 1000");
										$getArticles->execute();
										while($result = $getArticles->fetch()){

											if($result['online'] == "1")
												$status = "<span class=\"badge badge-soft-success\">Online</span>";
											else $status = "<span class=\"badge badge-soft-danger\">Offline</span>";

											echo '<tr>
											<td><img src="https://www.habbo.com/habbo-imaging/avatarimage?figure='.$result['look'].'&action=std&gesture=std&direction=2&head_direction=2&size=&headonly=1&img_format=png"></td>
											<td>'.$result['username'].'</td>
												<td>'.$result['rank'].'</td>
											<td>'.$result['mail'].'</td>
											<td>'.$result['ip_last'].'</td>
											<td><span class="badge badge-soft-moedas">'.$result['credits'].'</span></td>
											<td><span class="badge badge-soft-duckets">'.$result['activity_points'].'</span></td>
											<td><span class="badge badge-soft-diamantes">'.$result['vip_points'].'</span></td>
											<td><span class="badge badge-soft-moedas">'.$result['gotw_points'].'</span></td>
											<td>'.$status.'</td>
											<td>'.date('d/m/y h:i', $result['account_created']).'</td>
											<td><a href="/adminpan/editar-usuario/'.$result['username'].'" class="mr-2"><i class="fas fa-edit text-info font-16"></i></a></td>
											</tr>';
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