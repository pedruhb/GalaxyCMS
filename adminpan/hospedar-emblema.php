<?php GalaxyHK::VerificaPermissao("emblemas"); ?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="/adminpan/assets/plugins/dropify/css/dropify.min.css">
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
								<h4 class="mt-0 header-title">Hospedar emblema</h4>
								<p class="text-muted mb-3">Hospede um novo emblema para o hotel</p>
								<?php
								#### API hospedar emblema by GalaxyServers.
								if (isset($_POST['hospedar'])) {

									### Faz o curl e envia o emblema para o servidor
									$cfile = curl_file_create($_FILES['arquivo']['tmp_name'], 'image/gif', $_FILES['arquivo']['name']);
									$postfields = array("arquivo" => $cfile, "filename" => $_FILES['arquivo']['name'], "codigo" => $_POST['cod'], "nome" => $_POST['nome'], "descricao" => $_POST['desc'], "api" => $config["galaxyApiKey"]);
									$ch = curl_init();
									$options = array(
										CURLOPT_URL => $config['galaxyApiUrl'] . "/emblemas_hospedar.php",
										CURLOPT_HEADER => false,
										CURLOPT_POST => 1,
										CURLOPT_HTTPHEADER => array("Content-Type:multipart/form-data"),
										CURLOPT_POSTFIELDS => $postfields,
										CURLOPT_INFILESIZE => $_FILES['arquivo']['size'],
										CURLOPT_RETURNTRANSFER => true
									);
									curl_setopt_array($ch, $options);
									$saida = curl_exec($ch);
									echo '<div class="alert alert-info" role="alert"><strong></strong> ' . $saida . ' </div>';
									curl_close($ch);

								}
								?>

								<form method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label for="exampleInputEmail1">Código</label>
										<input type="text" class="form-control" onkeyup="maiuscula(this)" placeholder="Código do emblema" name="cod" required>
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Nome</label>
										<input type="text" class="form-control" placeholder="Nome do emblema" name="nome" required>
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Descrição</label>
										<input type="text" class="form-control" placeholder="Descrição do emblema" name="desc" required>
									</div>
									<div class="form-group">
										<input type="file" id="input-file-now" class="dropify" name="arquivo" required>
									</div>

									<button type="submit" name="hospedar" class="btn btn-primary">Hospedar</button>

								</form>

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

		<script src="/adminpan/assets/plugins/dropify/js/dropify.min.js">
		</script>

		<!-- Required datatable js -->
		<!-- App js -->
		<script src="/adminpan/assets/js/app.js">
		</script>
		<script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
		<script type="text/javascript">
			function maiuscula(z) {
				v = z.value.toUpperCase();
				z.value = v;
			}

			$(function() {
				$(".dropify").dropify(), $(".dropify-fr").dropify({
					messages: {
						default: "Glissez-dÃ©posez un fichier ici ou cliquez",
						replace: "Glissez-dÃ©posez un fichier ou cliquez pour remplacer",
						remove: "Supprimer",
						error: "DÃ©solÃ©, le fichier trop volumineux"
					}
				});
				var e = $("#input-file-events").dropify();
				e.on("dropify.beforeClear", function(e, r) {
					return confirm('Do you really want to delete "' + r.file.name + '" ?')
				}), e.on("dropify.afterClear", function(e, r) {
					alert("File deleted")
				}), e.on("dropify.errors", function(e, r) {
					console.log("Has Errors")
				});
				var r = $("#input-file-to-destroy").dropify();
				r = r.data("dropify"), $("#toggleDropify").on("click", function(e) {
					e.preventDefault(), r.isDropified() ? r.destroy() : r.init()
				})
			});
		</script>
</body>

</html>