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
					<div class="col-lg-3">
						<div class="card card-eco">
							<div class="card-body">
								<h4 class="title-text mt-0">Usuários online</h4>
								<div class="d-flex justify-content-between">
									<h3 class="font-weight-bold">
										<?php
										$getOnlines = $dbh->prepare("SELECT id FROM users WHERE online='1'");
										$getOnlines->execute();
										echo $getOnlines->rowCount();
										?>
									</h3>
									<i class="fas fa-users card-eco-icon text-pink align-self-center">
									</i>
								</div>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div>
					<!--end col-->
					<div class="col-lg-3">
						<div class="card card-eco">
							<div class="card-body">
								<h4 class="title-text mt-0">Usuários Registrados</h4>
								<div class="d-flex justify-content-between">
									<h3 class="font-weight-bold"><?php
																	$getUsers = $dbh->prepare("SELECT id FROM users");
																	$getUsers->execute();
																	echo $getUsers->rowCount();
																	?></h3>
									<i class="fas fa-users card-eco-icon text-secondary align-self-center">
									</i>
								</div>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div>
					<!--end col-->
					<div class="col-lg-3">
						<div class="card card-eco">
							<div class="card-body">
								<h4 class="title-text mt-0">Notícias postadas</h4>
								<div class="d-flex justify-content-between">
									<h3 class="font-weight-bold"><?php
																	$getArticles = $dbh->prepare("SELECT id FROM cms_news;");
																	$getArticles->execute();
																	echo $getArticles->rowCount();
																	?></h3>
									<i class="fas fa-newspaper card-eco-icon text-warning align-self-center">
									</i>
								</div>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div>
					<!--end col-->
					<div class="col-lg-3">
						<div class="card card-eco">
							<div class="card-body">
								<h4 class="title-text mt-0">Banimentos</h4>
								<div class="d-flex justify-content-between">
									<h3 class="font-weight-bold"> <?php
																	$getArticles = $dbh->prepare("SELECT id FROM bans;");
																	$getArticles->execute();
																	echo $getArticles->rowCount();
																	?></h3>
									<i class="fas fa-user-slash card-eco-icon text-success align-self-center">
									</i>
								</div>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div>
					<!--end col-->
				</div>
				<!-- end page title end breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body" style="position: relative;">
								<center>
									<h3>Gráfico de usuários onlines</h3>
								</center>
								<div id="crm_dash_2" class="apex-charts" style="min-height: 380px;">
								</div>
								<div class="resize-triggers">
									<div class="expand-trigger">
										<div style="width: 1454px; height: 406px;">
										</div>
									</div>
									<div class="contract-trigger">
									</div>
								</div>
							</div>
							<!--end card-body-->
						</div>
						<!--end card-->
					</div>
					<!-- end col-->
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
		<script src="/adminpan/assets/plugins/moment/moment.js">
		</script>
		<script src="/adminpan/assets/plugins/apexcharts/apexcharts.min.js">
		</script>
		<script src="/adminpan/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js">
		</script>
		<script src="/adminpan/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js">
		</script>
		<?php
		$getArticles = $dbh->prepare("SELECT * FROM graficos_phbplugin order by id");
		$getArticles->execute();
		$onlines = "";
		$datas = "";
		while ($grafico = $getArticles->fetch()) {

			$onlines .= $grafico['onlines'] . ",";
			$datas .= '"' . date('m', $grafico["timestamp"]) . '/' . date('d', $grafico["timestamp"]) . '/' . date('y', $grafico["timestamp"]) . ' ' . date('H', $grafico["timestamp"]) . ':' . date('i', $grafico["timestamp"]) . '",';
		}
		$onlines = substr($onlines, 0, -1);
		$datas = substr($datas, 0, -1);
		?>
		<script type="text/javascript">
			var options = {
				chart: {
					height: 365,
					type: "line",
					toolbar: {
						show: !1
					}
				},
				stroke: {
					width: [0, 2, 5],
					curve: "smooth"
				},
				plotOptions: {
					bar: {
						columnWidth: "20%",
						endingShape: "rounded"
					}
				},
				colors: ["#4ac7ec"],
				series: [{
					name: "Usuários Online",
					type: "area",
					data: [<?= $onlines; ?>]
				}],
				fill: {
					type: "gradient",
					gradient: {
						shade: "light",
						type: "horizontal",

						stops: [0, 100, 100, 100]
					}
				},
				labels: [<?= $datas; ?>],
				markers: {
					size: 0
				},
				xaxis: {
					type: "datetime",
					axisBorder: {
						show: !0,
						color: "#bec7e0"
					},
					axisTicks: {
						show: !0,
						color: "#bec7e0"
					}
				},
				yaxis: {
					min: 0
				},
				tooltip: {
					shared: !0,
					intersect: !1,
					y: {
						formatter: function(e) {
							return void 0 !== e ? e.toFixed(0) : e
						}
					}
				},
				legend: {
					labels: {
						useSeriesColors: !0
					},
					offsetX: 0,
					offsetY: -10,
					markers: {
						customHTML: [function() {
							return ""
						}, function() {
							return ""
						}, function() {
							return ""
						}]
					}
				}
			};
			(chart = new ApexCharts(document.querySelector("#crm_dash_2"), options)).render();
		</script>
		<script src="/adminpan/assets/js/app.js">
		</script>
</body>

</html>