<?php GalaxyHK::VerificaPermissao("usuario");?>
<?php
if(empty($_GET['user'])){
	header('Location /adminpan/dash');
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
		<?php
		$checkUser = $dbh->prepare("SELECT id FROM users WHERE username = :username");
		$checkUser->bindValue(':username', $_GET['user']);
		$checkUser->execute();
		$idusuario = $checkUser->fetch()['id'];
		if($checkUser->rowCount() != 1){
			GalaxyHK::Error("O usuário não existe.");
		} else {

			if(!empty($_GET['ac'])){
				$_SESSION['id'] = $idusuario;
				$_SESSION['id2'] = $idusuario;
				header('Location /index');
				return;
			}
			
			?>
			<div class="page-content">
				<div class="container-fluid">
					<!-- Page-Title -->
					<div class="row">
						<div class="col-sm-12">
							<div class="page-title-box">
							</div>
							<!--end page-title-box-->
						</div>
						<!--end col-->
					</div>
					<!-- end page title end breadcrumb -->
					<div class="row">
						<div class="col-12">
							<?php
								if(isset($_POST['salvar']))
								{
									$username = $_POST['username'];
									$motto = utf8_encode($_POST['motto']);
									$mail = $_POST['mail'];
									$prefix_name = $_POST['prefix_name'];
									$prefix_name_color = $_POST['prefix_name_color'];
									$Premiar = $_POST['Premiar'];
									$rank = $_POST['rank'];
									$hide_online = $_POST['hide_online'];
									$ignore_invites = $_POST['ignore_invites'];
									$allow_gifts = $_POST['allow_gifts'];
									$allow_mimic = $_POST['allow_mimic'];
									$allow_sex = $_POST['allow_sex'];
									$allow_events = $_POST['allow_events'];
									$AchievementScore = $_POST['AchievementScore'];
									$Respect = $_POST['Respect'];
									$senha = $_POST['senha'];
									$activity_points = $_POST['activity_points'];
									$credits = $_POST['credits'];
									$gotw_points = $_POST['gotw_points'];
									$vip_points = $_POST['vip_points'];
									$promo_points = $_POST['promo_points'];
									$staff_ocult = $_POST['staff_ocult'];

									$selectUser = $dbh->prepare("SELECT id FROM users WHERE username = :username");
									$selectUser->bindValue(':username', $_GET['user']);
									$selectUser->execute();
									$userid = $selectUser->fetch()['id'];

									$permissao2 = $dbh->prepare("SELECT online FROM users WHERE id = :id");
									$permissao2->bindParam(':id', $userid);
									$permissao2->execute();
									$permi2 = $permissao2->fetch()['online'];
									if($permi2 == '1'){
										GalaxyHK::Error('Não é possível editar um usuário online.');
									} else {
										$attUser = $dbh->prepare("UPDATE users SET username = :1, motto = :2, mail = :3, prefix_name = :4, prefix_name_color = :5, name_color = :15, Premiar = :6, rank = :7, hide_online = :9, ignore_invites = :10, allow_gifts = :11, allow_mimic = :12, allow_sex = :13, allow_events = :14,activity_points = :16, credits = :17, gotw_points = :18, vip_points = :19, promo_points = :20, staff_ocult =:21 WHERE id = :id");
										$attUser->bindParam(':1', $username);
										$attUser->bindParam(':2', $motto);
										$attUser->bindParam(':3', $mail);
										$attUser->bindParam(':4', $prefix_name);
										$attUser->bindParam(':5', $prefix_name_color);
										$attUser->bindParam(':6', $Premiar);
										$attUser->bindParam(':7', $rank);
										$attUser->bindParam(':9', $hide_online);
										$attUser->bindParam(':10', $ignore_invites);
										$attUser->bindParam(':11', $allow_gifts);
										$attUser->bindParam(':12', $allow_mimic);
										$attUser->bindParam(':13', $allow_sex);
										$attUser->bindParam(':14', $allow_events);
										$attUser->bindParam(':15', $name_color);
										$attUser->bindParam(':16', $activity_points);
										$attUser->bindParam(':17', $credits);
										$attUser->bindParam(':18', $gotw_points);
										$attUser->bindParam(':19', $vip_points);
										$attUser->bindParam(':20', $promo_points);
											$attUser->bindParam(':21', $staff_ocult);
										$attUser->bindParam(':id', $userid);
										$attUser->execute();
										$attUser2 = $dbh->prepare("UPDATE user_stats SET AchievementScore = :1, Respect = :2 WHERE id = :id");
										$attUser2->bindParam(':1', $AchievementScore);
										$attUser2->bindParam(':2', $Respect);
										$attUser2->bindParam(':id', $userid);
										$attUser2->execute();
										GalaxyHK::Log('Editou o usuário '.$_GET['user'], 'Editou o usuário '.$_GET['user']);
										GalaxyHK::Sucesso('Usuário editado com sucesso');
										if(isset($_POST['senha']) && !empty($_POST['senha'])){
											if (strlen($senha) >= 6){
												$senha_hash = password_hash($senha, PASSWORD_BCRYPT);
												$attSUser = $dbh->prepare("UPDATE users SET password = :1 WHERE id = :id");
												$attSUser->bindParam(':1', $senha_hash);
												$attSUser->bindParam(':id', $userid);
												$attSUser->execute();
												GalaxyHK::Log('Editou a senha do usuário '.$_GET['user']);
												GalaxyHK::Sucesso('Senha do usuário alterada.');
											} else {
												GalaxyHK::Error('A senha deve ter no mínimo 6 caracteres.');
											}
										}

									}
								}

								$selectUser = $dbh->prepare("SELECT * FROM users WHERE username = :username");
								$selectUser->bindValue(':username', $_GET['user']);
								$selectUser->execute();
								$user = $selectUser->fetch();

								$selectUser2 = $dbh->prepare("SELECT * FROM user_stats WHERE id = :id");
								$selectUser2->bindValue(':id', $user['id']);
								$selectUser2->execute();
								$user2 = $selectUser2->fetch();
								?>
							<div class="card">
								<div class="card-body met-pro-bg">
									<div class="met-profile">
										<div class="row">
											<div class="col-lg-4 align-self-center mb-3 mb-lg-0">
												<div class="met-profile-main">
													<div class="met-profile-main-pic">
														<img src="http://habbo.city/habbo-imaging/avatarimage?figure=<?= $user['look'];?>&action=sit&size=m&head_direction=2&gesture=sml" alt="" class="rounded-circle">
													</div>
													<div class="met-profile_user-detail">
														<h5 class="met-user-name"><?= $user['username'];?></h5>
														<p class="mb-0 met-user-name-post"><?= utf8_decode($user['motto']);?></p>
													</div>
												</div>
											</div>
											<!--end col-->
											<div class="col-lg-4 ml-auto">
												<ul class="list-unstyled personal-detail">
													<li class=""><b>Créditos </b>: <?= $user['credits'];?></li>
													<li class=""><b>Duckets </b>: <?= $user['activity_points'];?></li>
													<li class=""><b>Diamantes</b> : <?= $user['vip_points'];?></li>
													<li class=""><b>GOTW</b> : <?= $user['gotw_points'];?></li>
													<br>
													<li class=""><b>Eventos Ganhos</b> : <?= $user['Premiar'];?></li>
													<li class=""><b>Promoções Ganhas</b> : <?= $user['promo_points'];?></li>
												</ul>
											</div>
											<!--end col-->
										</div>
										<!--end row-->
									</div>
									<!--end f_profile-->
								</div>
								<!--end card-body-->
								<div class="card-body">
									<ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a style="padding: .5rem 1rem;" href="/adminpan/contasip/<?= $user['ip_last'];?>">Ver contas com o mesmo IP</a>
										</li>
										<li class="nav-item">
											<a style="padding: .5rem 1rem;" href="/adminpan/quartos/<?= $user['id'];?>">Ver quartos</a>
										</li>
										<?php if($user['id'] != $_SESSION['id']){ ?>
											<li class="nav-item">
												<a style="padding: .5rem 1rem;" href="/adminpan/editar-usuario/<?= $_GET['user'];?>/acessar-conta">Acessar conta</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<!--end card-->
						</div>
						<!--end col-->
					</div>
					<!--end row-->
					<div class="row">
						<div class="col-12">
							<div class="tab-content detail-list" id="pills-tabContent">								
								<div class="tab-pane fade active show" id="settings_detail">
									<div class="row">
										<div class="col-lg-9 mx-auto">
											<div class="card">
												<div class="card-body">
													
													<form class="form-horizontal form-material mb-0" method="post">

														<label for="exampleInputEmail1">Nome de usuário</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="username" value="<?= $user['username'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Missão</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="motto" value="<?= utf8_decode($user['motto']);?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Créditos</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="credits" value="<?= $user['credits'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Duckets</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="activity_points" value="<?= $user['activity_points'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Diamantes</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="vip_points" value="<?= $user['vip_points'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">GOTW</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="gotw_points" value="<?= $user['gotw_points'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Email</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="mail" value="<?= $user['mail'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">TAG</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="prefix_name" value="<?= $user['prefix_name'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Cor TAG</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="prefix_name_color" value="<?= $user['prefix_name_color'];?>" id="tcolor" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Cor Nick</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="name_color" value="<?= $user['name_color'];?>" id="ncolor" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Nível Premiar</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="Premiar" value="<?= $user['Premiar'];?>" class="form-control">
															</div>
														</div>

																<label for="exampleInputEmail1">Pontos de promoção</label>
														<div class="form-group">
															<div class="input-group">
																<input type="number" name="promo_points" value="<?= $user['promo_points'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Rank</label>
														<div class="form-group">
															<div class="input-group">
																<select name="rank" class="form-control">
																	<?php
																	$getArtdicles = $dbh->prepare("SELECT * FROM ranks ORDER BY id");
																	$getArtdicles->execute();
																	while($dnews = $getArtdicles->fetch())
																	{
																		?>
																		<option <?php if($user['rank'] == $dnews['id'])echo'selected ';?> value="<?php echo $dnews['id']?>"><?php echo utf8_decode($dnews['name'].' ('.$dnews['id'].')');?></option>
																	<?php } ?>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Staff Oculto</label>
														<div class="form-group">
															<div class="input-staff_ocult">
																<select name="hide_online" class="form-control">
																	<option <?php if($user['staff_ocult'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['staff_ocult'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Ocultar Online</label>
														<div class="form-group">
															<div class="input-group">
																<select name="hide_online" class="form-control">
																	<option <?php if($user['hide_online'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['hide_online'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Ignorar convites</label>
														<div class="form-group">
															<div class="input-group">
																<select name="ignore_invites" class="form-control">
																	<option <?php if($user['ignore_invites'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['ignore_invites'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Permitir Presentes</label>
														<div class="form-group">
															<div class="input-group">
																<select name="allow_gifts" class="form-control">
																	<option <?php if($user['allow_gifts'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['allow_gifts'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Permitir que copiem o visual</label>
														<div class="form-group">
															<div class="input-group">
																<select name="allow_mimic" class="form-control">
																	<option <?php if($user['allow_mimic'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['allow_mimic'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Permitir comando :sexo</label>
														<div class="form-group">
															<div class="input-group">
																<select name="allow_sex" class="form-control">
																	<option <?php if($user['allow_sex'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['allow_sex'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Permitir alerta de eventos</label>
														<div class="form-group">
															<div class="input-group">
																<select name="allow_events" class="form-control">
																	<option <?php if($user['allow_events'] == "1")echo'selected ';?> value="1">Sim</option>
																	<option <?php if($user['allow_events'] == "0")echo'selected ';?> value="0">Não</option>
																</select>
															</div>
														</div>

														<label for="exampleInputEmail1">Placar de conquistas</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="AchievementScore" value="<?= $user2['AchievementScore'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Respeitos Recebidos</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="Respect" value="<?= $user2['Respect'];?>" class="form-control">
															</div>
														</div>

														<label for="exampleInputEmail1">Nova senha</label>
														<div class="form-group">
															<div class="input-group">
																<input type="text" name="senha" placeholder="Preencha apenas se deseja alterar a senha." class="form-control">
															</div>
														</div>

														<button name="salvar" class="btn btn-primary btn-sm text-light px-4 mt-3 float-right mb-0">Atualizar usuário</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--end col-->
							</div>
							<!--end row-->
						</div>
						<!--end settings detail-->
					</div>
					<!--end tab-content-->
				</div>
				<!--end col-->
			</div>
			<!--end row-->
		</div>
		<!-- container -->
	<?php } ?>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.js"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.css' />
<script>
	$("#ncolor").spectrum({
		color: "<?= $user['name_color'];?>",
		preferredFormat: "hex"
	});
	$("#tcolor").spectrum({
		color: "<?= $user['prefix_name_color'];?>",
		preferredFormat: "hex"
	});
</script>
</body>
</html>