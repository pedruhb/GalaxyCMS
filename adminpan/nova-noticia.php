<?php GalaxyHK::VerificaPermissao("noticias");?>
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
								<h4 class="mt-0 header-title">Escrever notícia</h4>
								<p class="text-muted mb-3">Escreva uma nova notícia para o hotel.</p>
								<?php
								if(isset($_POST['postar'])){
									if(!empty($_POST['titulo'])){
										if(!empty($_POST['subtitulo'])){
											if(!empty($_POST['imagem'])){
												$getUsername = $dbh->prepare("INSERT INTO `cms_news` (`title`, `image`, `shortstory`, `longstory`, `author`, `date`) VALUES (:a, :b, :c, :d, :e, :f);");
												$getUsername->bindValue(':a', $_POST['titulo']);
												$getUsername->bindValue(':b', $_POST['imagem']);
												$getUsername->bindValue(':c', $_POST['subtitulo']);
												$getUsername->bindValue(':d', $_POST['noticia']);
												$getUsername->bindValue(':e', $_SESSION['id']);
												$getUsername->bindValue(':f', time());
												$getUsername->execute();
												GalaxyHK::Sucesso("Notícia postada com sucesso.");
												GalaxyHK::Log("Postou uma notícia.", "Postou uma notícia.");
											} else {
												GalaxyHK::Error("Imagem em branco.");
											}
										} else {
											GalaxyHK::Error("Subtitulo em branco.");
										}
									} else {
										GalaxyHK::Error("Título em branco.");
									}
								}
								?>
								<form method="post">

									<div class="form-group">
										<label for="exampleInputEmail1">Título</label> 
										<input type="text" class="form-control" placeholder="Título da notícia" name="titulo" required> 
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Subtítulo</label> 
										<input type="text" class="form-control" placeholder="Subtítulo da notícia" name="subtitulo" required> 
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Imagem da notícia</label> 
										<input type="text" class="form-control" placeholder="Link da imagem" name="imagem" required> 
										<small id="emailHelp" class="form-text text-muted">Recomendo hospedar no imgur.</small>
									</div>
									<div class="form-group">
										<textarea name="noticia" id="editor"></textarea>
										<small id="emailHelp" class="form-text text-muted">Coloque o conteúdo da notícia acima.</small>
									</div>

									<button type="submit" name="postar" class="btn btn-primary">Postar</button>

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
		<script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
		<script>CKEDITOR.replace('editor');</script>
	</body>
	</html>