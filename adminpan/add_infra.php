<?php GalaxyHK::VerificaPermissao("infracoes");?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="/adminpan/assets/plugins/dropify/css/dropify.min.css">
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
								<h4 class="mt-0 header-title">Adicionar infração</h4>
								<p class="text-muted mb-3">Adicione uma infração ao um usuário</p>
								
								<?php
								if(isset($_POST['adicionar'])){

									if(!isset($_POST['user'])){
										GalaxyHK::Error("Usuário inválido");
									} else if(!isset($_POST['infra'])){
										GalaxyHK::Error("Infração inválida");
									} else {

										$usuario = $_POST['user'];
										$infracao = $_POST['infra'];

										$addinfra = $dbh->prepare("INSERT INTO `infracoeshabby` (`infrator`, `motivo`, `data`, `por`) VALUES (:1, :2, :3, :4);");
										$addinfra->bindParam(":1", $usuario);
										$addinfra->bindParam(":2", $infracao);
										$addinfra->bindValue(":3", time());
										$addinfra->bindValue(":4", $_SESSION['id']);
										$addinfra->execute();

										GalaxyHK::Sucesso("Infração adicionada com sucesso");
										GalaxyHK::Log("Adicionou uma infração ao usuário ".$_POST['user'], "Adicionou uma infração ao usuário ".$_POST['user']);

									}
									
								}
								?>

								<form method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label for="exampleInputEmail1">Usuário</label> 
										<input type="text" class="form-control" placeholder="Nome do usuário" name="user" required> 
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Infração</label> 
										<input type="text" class="form-control" placeholder="Ex: desrespeito com os usuários" name="infra" required> 
									</div>

									<button type="submit" name="adicionar" class="btn btn-primary">Adicionar</button>

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

		<script src="/adminpan/assets/plugins/dropify/js/dropify.min.js">
		</script>

		<!-- Required datatable js -->
		<!-- App js -->
		<script src="/adminpan/assets/js/app.js">
		</script>
		<script src="https://cdn.ckeditor.com/4.12.1/full-all/ckeditor.js"></script>
		<script type="text/javascript">
			function maiuscula(z){
				v = z.value.toUpperCase();
				z.value = v;
			}

			$(function(){$(".dropify").dropify(),$(".dropify-fr").dropify({messages:{default:"Glissez-dÃ©posez un fichier ici ou cliquez",replace:"Glissez-dÃ©posez un fichier ou cliquez pour remplacer",remove:"Supprimer",error:"DÃ©solÃ©, le fichier trop volumineux"}});var e=$("#input-file-events").dropify();e.on("dropify.beforeClear",function(e,r){return confirm('Do you really want to delete "'+r.file.name+'" ?')}),e.on("dropify.afterClear",function(e,r){alert("File deleted")}),e.on("dropify.errors",function(e,r){console.log("Has Errors")});var r=$("#input-file-to-destroy").dropify();r=r.data("dropify"),$("#toggleDropify").on("click",function(e){e.preventDefault(),r.isDropified()?r.destroy():r.init()})});

		</script>
	</body>
	</html>