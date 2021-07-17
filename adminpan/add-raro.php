<?php GalaxyHK::VerificaPermissao("raros");?>
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
								<h4 class="mt-0 header-title">Adicionar raro</h4>
								<p class="text-muted mb-3">Adicione um raro no hotel.</p>
								<?php
								$aparecer = true;
								if(isset($_POST['adicionar-ltd'])){

									function soNumero($str) {
										return preg_replace("/[^0-9]/", "", $str);
									}

									$nome=$_POST['nome'];
									$moedas=0;
									$duckets=0;	
									$diamantes=0;	
									$gotw=0;	
									$furni_id=soNumero($_POST['furni_id']);	
									$page_id=soNumero($_POST['page_id']);	
									$estoque=10;
									$emblema=strtoupper($_POST['emblema']);	
									if(soNumero($_POST['moedas']) > 0)
										$moedas=soNumero($_POST['moedas']);
									if(soNumero($_POST['duckets']) > 0)
										$duckets=soNumero($_POST['duckets']);
									if(soNumero($_POST['diamantes']) > 0)
										$diamantes=soNumero($_POST['diamantes']);	
									if(soNumero($_POST['gotw']) > 0)
										$gotw=soNumero($_POST['gotw']);	
									if(soNumero($_POST['estoque']) > 0)
										$estoque=soNumero($_POST['estoque']);

									$dadosfurni = $dbh->prepare("SELECT * FROM furniture WHERE id = :furniid");
									$dadosfurni->bindParam(':furniid', $furni_id);
									$dadosfurni->execute();
									$furnirc = $dadosfurni->rowCount();
									$furni = $dadosfurni->fetch();

									$dadospage = $dbh->prepare("SELECT caption FROM catalog_pages WHERE id = :pageid");
									$dadospage->bindParam(':pageid', $page_id);
									$dadospage->execute();
									$page = $dadospage->fetch();

									if($furnirc != 1){
										GalaxyHK::Error("Nenhum mobi encontrado com o id $furni_id enviado.");
									} else if (!$page){
										GalaxyHK::Error("Nenhuma página no catálogo encontrada com o id enviado.");
									} else if($diamantes > 0 & $gotw > 0){
										GalaxyHK::Error("Não é possível custar diamantes e gotw ao mesmo tempo.");
									} else {
										echo '<h3>Confirme os dados</h3>';
										echo '<strong>Nome:</strong> '.$nome.'<br>';
										echo '<strong>Valor em Moedas:</strong> '.$moedas.'<br><img draggable="false" src="https://puhekupla.com/images/furni/'.$furni['item_name'].'.png" style="float: right;padding-right: 300px;">';
										echo '<strong>Valor em Duckets:</strong> '.$duckets.'<br>';
										echo '<strong>Valor em Diamantes:</strong> '.$diamantes.'<br>';
										echo '<strong>Valor em GOTW:</strong> '.$gotw.'<br>';
										echo '<strong>Mobi:</strong> ID:'.$furni_id.' / item_name: '.$furni['item_name'].' / ícone: <img draggable="false" src="https://swf.galaxyservers.com.br/dcr/hof_furni/'.$furni['item_name'].'_icon.png"><br>';
										echo '<strong>Página do catálogo:</strong> '.$page_id.' / Nome: '.$page['caption'].'<br>';
										echo '<strong>Lotes disponíveis:</strong> '.$estoque.'<br>';
										if(!empty($emblema))
											echo '<strong>Emblema:</strong> '.$emblema;
										echo '<br><br><br>';
										echo '<form method="POST" name="confirma" enctype="multipart/form-data"><center>
										<input type="hidden" name="nome" value="'.$nome.'">
										<input type="hidden" name="moedas" value="'.$moedas.'">
										<input type="hidden" name="duckets" value="'.$duckets.'">
										<input type="hidden" name="diamantes" value="'.$diamantes.'">
										<input type="hidden" name="gotw" value="'.$gotw.'">
										<input type="hidden" name="furni_id" value="'.$furni_id.'">
										<input type="hidden" name="page_id" value="'.$page_id.'">
										<input type="hidden" name="estoque" value="'.$estoque.'">
										<input type="hidden" name="emblema" value="'.$emblema.'">
										<button type="submit" name="confirma" style="border-radius: 8px;" class="btn btn-primary m-b-0">Adicionar</button>
										<br></center></form>';
										$aparecer = false;
									}
								}
								if(isset($_POST['confirma'])){ 
									$adicionanadb = $dbh->prepare("INSERT INTO `catalog_items` (`page_id`, `item_id`, `catalog_name`, `cost_credits`, `cost_diamonds`, `cost_gotw`, `limited_stack`, `badge`) VALUES (:paid, :fuid, :nome, :moedas, :dimas, :gotw, :estoque, :emblema);");
									$adicionanadb->bindValue(':nome', $_POST["nome"]);
									$adicionanadb->bindValue(':moedas', $_POST['moedas']);
									$adicionanadb->bindValue(':fuid', $_POST['furni_id']);
									$adicionanadb->bindValue(':paid', $_POST['page_id']);
									$adicionanadb->bindValue(':dimas', $_POST['diamantes']);
									$adicionanadb->bindValue(':estoque', $_POST['estoque']);
									$adicionanadb->bindValue(':emblema', $_POST['emblema']);
									$adicionanadb->bindValue(':gotw', $_POST['gotw']);
									if($adicionanadb->execute()){
										GalaxyHK::Log("Adicionou o raro ".$furni['item_name'], "Adicionou o raro ".$furni['item_name']);
										GalaxyHK::Sucesso("Raro adicionado! atualize o catálogo usando o :cataltd (envia alerta) ou :update cata (sem alerta)");											
									} else {
										GalaxyHK::Error("Erro ao adicionar o raro.");
									}
								}

								if($aparecer != false){
									?>

									<form method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label for="exampleInputEmail1">Nome</label> 
											<input type="text" class="form-control" placeholder="Nome do mobi. Ex: Serpa Preta" name="nome" required> 
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Moedas</label> 
											<input type="number" class="form-control" placeholder="Valor em moedas" name="moedas" > 
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Duckets</label> 
											<input type="number" class="form-control" placeholder="Valor em duckets" name="duckets" > 
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Diamantes</label> 
											<input type="number" class="form-control" placeholder="Valor em diamantes" name="diamantes" > 
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">GOTW</label> 
											<input type="number" class="form-control" placeholder="Valor em gotw" name="gotw"> 
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Furniture ID</label> 
											<input type="number" class="form-control" placeholder="ID furniture do mobi." name="furni_id" required> 
											<small id="emailHelp" class="form-text text-muted">Caso você não saiba, chegue na frente do mobi e utilize o comando :mobi</small>
										</div>

										<div class="form-group">
											<label for="exampleInputEmail1">Página no catálogo</label> 
											<select name="page_id" class="form-control" data-live-search="true">
												<?php
												$getArtdicles = $dbh->prepare("SELECT id,caption FROM catalog_pages WHERE page_layout != \"info_duckets\" and page_layout != \"marketplace_own_items\" 
													and page_layout != \"marketplace\" and page_layout != \"badge_display\" and page_layout != \"bots\"  and page_layout != \"soundmachine\" and page_layout != \"trophies\" and page_layout != \"roomads\" and page_layout != \"single_bundle\" and page_layout != \"recycler\"  and page_layout != \"pets3\" and page_layout != \"pets\" and enabled = \"1\" and visible = \"1\" and page_link != \"ultimas_compras\" ORDER BY id");
												$getArtdicles->execute();
												while($dnews = $getArtdicles->fetch())
												{
													$nomecata = str_replace("HOTELNAME", $config['hotelname'], $dnews['caption']);
													?>
													<option data-tokens="<?= $nomecata;?> <?= $dnews['id']?>" value="<?= $dnews['id']?>"><?= $nomecata;?> - <?= $dnews['id']?></option>
												<?php } ?>
											</select> 
										</div>


										<div class="form-group">
											<label for="exampleInputEmail1">Estoque</label> 
											<input type="number" class="form-control" name="estoque" required> 
											<small id="emailHelp" class="form-text text-muted">Quantidade máxima que os usuários podem comprar.</small>
										</div>


										<div class="form-group">
											<label for="exampleInputEmail1">Emblema</label> 
											<input type="text" class="form-control" placeholder="" name="emblema"  onkeyup="maiuscula(this)"> 
											<small id="emailHelp" class="form-text text-muted">Emblema que será dado ao usuário quando comprar, caso não tiver, deixe em branco.</small>
										</div>

										<button type="submit" name="adicionar-ltd" class="btn btn-primary">Adicionar</button>

									</form>
								<?php }?>

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