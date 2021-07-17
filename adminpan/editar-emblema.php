<?php GalaxyHK::VerificaPermissao("emblemas");?>
<?php
if(empty($_GET['id'])){
	header('Location /adminpan/emblemas-hospedados');
	return;
}
?>
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
								<h4 class="mt-0 header-title">Editar emblema</h4>
								<p class="text-muted mb-3">Editando o emblema <?= $_GET['id'];?></p>
								<?php
								if(isset($_POST['salvar'])){
									if(!empty($_POST['nome'])){
										if(!empty($_POST['descricao'])){

											$getUsername = $dbh->prepare("UPDATE `emblemas_upados` SET `nome` = :a, `desc` = :b WHERE codigo = :c LIMIT 1");
											$getUsername->bindValue(':a', $_POST['nome']);
											$getUsername->bindValue(':b', $_POST['descricao']);
											$getUsername->bindValue(':c', $_GET['id']);
											$getUsername->execute();
											GalaxyHK::Sucesso("Emblema ".$_GET['id']." atualizado com sucesso.");
											GalaxyHK::Log("Editou o emblema ".$_GET['id'].".", "Editou o emblema ".$_GET['id'].".");
											
										} else {
											GalaxyHK::Error("Descrição em branco.");
										}
									} else {
										GalaxyHK::Error("Nome em branco.");
									}
								}


								$getNews = $dbh->prepare("SELECT * FROM emblemas_upados WHERE codigo = :id");
								$getNews->bindValue(':id', $_GET['id']);
								$getNews->execute();
								$noticia = $getNews->fetch();

								if(!$noticia){
									header('Location /adminpan/emblemas-hospedados');
									return;
								}

								?>
								<form method="post">

									<div class="form-group">
										<label for="exampleInputEmail1">Código</label> 
										<input type="text" class="form-control" placeholder="Código do emblema" disabled value="<?= $noticia['codigo'];?>"> 
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Nome</label> 
										<input type="text" class="form-control" placeholder="Nome do emblema" name="nome" value="<?= $noticia['nome'];?>" required> 
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Descrição</label> 
										<input type="text" class="form-control" placeholder="Descrição do emblema" name="descricao" value="<?= $noticia['desc'];?>" required> 
									</div>


									<button type="submit" name="salvar" class="btn btn-primary">Salvar</button>

								</form>

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

	</body>
	</html>