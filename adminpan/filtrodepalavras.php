<?php GalaxyHK::VerificaPermissao("filtro");?>
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
								<h4 class="mt-0 header-title">Adicionar palavra ao filtro</h4>
								<p class="text-muted mb-3">Adicione uma palavra ao filtro de proibidas.</p>
								<?php
								if(isset($_POST['adicionar'])){
									if(!empty($_POST['palavra'])){
										$getUsername = $dbh->prepare("INSERT INTO `wordfilter` (`word`, `replacement`, `addedby`) VALUES (:a, 'bobba', :b);");
										$getUsername->bindValue(':a', $_POST['palavra']);
										$getUsername->bindValue(':b', $_SESSION['id']);
										$getUsername->execute();
										GalaxyHK::Sucesso("Palavra adicionada com sucesso.");
										GalaxyHK::Log("Adicionou a palavra \"".$_POST['palavra']."\" ao filtro", "Adicionou a palavra ".$_POST['palavra']." ao filtro");
									} else {
										GalaxyHK::Error("Palavra em branco.");
									}
								}
								?>
								<form method="post">
									<div class="form-group">
										<label for="exampleInputEmail1">Palavra</label> 
										<input type="text" class="form-control" placeholder="Palavra que será proibida." name="palavra" required> 
									</div>
									<button type="submit" name="adicionar" class="btn btn-primary">Adicionar</button>
								</form>
							</div>
						</div>
					</div>
					<!-- end col -->
				</div>

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class="mt-0 header-title">Filtro de palavras</h4>
								<p class="text-muted mb-3">Visualize e gerencie aqui as palavras proibidas no hotel.</p>
								<?php
								if(isset($_GET['a'])){
									$id = $_GET['a'];
									$getArticles = $dbh->prepare("DELETE FROM wordfilter WHERE id = :id LIMIT 1");
									$getArticles->bindParam(':id', $id);
									$getArticles->execute();
									GalaxyHK::Sucesso("Palavra id ".$id." apagada do filtro com sucesso!");
									GalaxyHK::Log("Palavra id ".$id." apagada do filtro.", "Apagou do filtro, a palavra id ".$id);
								}
								?>
								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									<thead>
										<tr>
											<th>ID</th>
											<th>Palavra</th>
											<th>Opções</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$getArticles = $dbh->prepare("SELECT * FROM wordfilter ORDER BY id DESC");
										$getArticles->execute();
										while($result = $getArticles->fetch()){
											echo '<tr>
											<td>'.$result['id'].'</td>
											<td>'.$result['word'].'</td>
											<td><a href="/adminpan/filtrodepalavras/apagar/'.$result['id'].'"><i class="fas fa-trash-alt text-danger font-16"></i></a></td>
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