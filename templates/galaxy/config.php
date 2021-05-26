<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['Ctitulo']; ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/settings.css?LVL254" media="screen" />
	<link rel='stylesheet' href='/templates/galaxy/assets/css/spectrum.css' />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page settings">
		<div class="left">
			<div class="box">
				<div class="title blue">
					<div class="img">
						<img style="margin-top: 9px;" src="/templates/galaxy/assets/img/gear.png" />
					</div>
					<p><?= $lang['Cconta']; ?></p>
				</div>
				<div class="content">
					<ul>
						<li>
							<a class='slc' href="config"><?= $lang['Cp']; ?></a>
						</li>
						<li>
							<a href="config2"><?= $lang['Ccj']; ?></a>
						</li>
						<li>
							<a href="config3"><?= $lang['Cae']; ?></a>
						</li>
						<li>
							<a href="config4"><?= $lang['Cas']; ?></a>
						</li>
						<li>
							<a href="config5"><?= $lang['Ce']; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="errblok">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$getMessageUser = $dbh->prepare("UPDATE `users` SET `nome_cor`= :namecolor, `prefixo_cor`= :prefixcolor WHERE `id`= :id");
					$getMessageUser->bindValue(':namecolor', $_POST['cornick']);
					$getMessageUser->bindValue(':prefixcolor', $_POST['cortag']);
					$getMessageUser->bindParam(':id', User::userData('id'));
					$getMessageUser->execute();
					$user = $getMessageUser->fetch();

					echo '<div class="error success tctm ">' . $lang['CAr'] . '</div> ';
				}
				?>
			</div>
			<div class="box">
				<div class="title red">
					<div class="img">
						<img src="/templates/galaxy/assets/img/settings_title_general.png" />
					</div>
					<p><?= $lang['COP']; ?></p>
				</div>
				<div class="content">
					<div class="general">
						<p><?= $lang['CDesc']; ?></p>
						<noscript>
							<div class="error">
								é necessário javascript! / I need Javascript
							</div>
						</noscript>
						<div class="left">
							<div class="img">
								<img src="<?= $config['avatarImageUrl']; ?>?figure=<?= User::userData('look') ?>&action=sit" />
							</div>
							<p><?= $lang['Cvc']; ?></p>
						</div>
						<form action="#" method="post">
							<div class="right" style="float: right;
							width: calc(100% - 110px);
							padding: 10px 10px 10px 0;">
								<?php
								$var = User::userData('prefixo');
								if (empty($var)) {
									$prefixo11 = '';
								} else {
									$prefixo11 = '<div class="choice" style="border-radius: 3px;
								overflow: hidden;
								width: 100%;
								float: left;
								clear: both;
								margin-bottom: 10px;
								background: rgba(0,0,0,0.05);">
								<p style="    float: left;
								font-size: 14px;
								color: #666;
								padding: 10px;">' . $lang['Cct'] . '</p>
								<div style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);  
								float: right;
								font-size: 12px;
								background: #fff0;
								margin: 5px;
								height: 27px;
								border-radius: 3px;
								padding: 0 10px;
								line-height: 27px;
								color: #fff;
								cursor: pointer;" tyoe="profilCommentaires" style="background: rgba(0,0,0,0);" class="switch_set"><input type="text" name="cortag" id="cortag" value="' . User::userData('prefixo_cor') . '"  /></div>
								</div>';
								}
								?>
								<?php echo $prefixo11; ?>
								<div class="choice" style="border-radius: 3px;
							overflow: hidden;
							width: 100%;
							float: left;
							clear: both;
							margin-bottom: 10px;
							background: rgba(0,0,0,0.05);">
									<p style="    float: left;
							font-size: 14px;
							color: #666;
							padding: 10px;"><?= $lang['Ccn']; ?></p>
									<div style="text-shadow: 0 1px 2px rgba(0,0,0,0.2);  
							float: right;
							font-size: 12px;
							background: #fff0;
							margin: 5px;
							height: 27px;
							border-radius: 3px;
							padding: 0 10px;
							line-height: 27px;
							color: #fff;
							cursor: pointer;" tyoe='profilCommentaires' style="background: rgba(0,0,0,0);" class='switch_set'><input type='text' name="cornick" id="cornick" value="<?php echo User::userData('nome_cor'); ?>" /></div>
								</div>
								<div class="choice" style="border-radius: 3px;
						overflow: hidden;
						width: 100%;
						float: left;
						clear: both;
						margin-bottom: 10px;
						background: rgba(0,0,0,0.05);">
									<p style="    float: left;
						font-size: 14px;
						color: #666;
						padding: 10px;"><?= $lang['Cpr']; ?>
										<?php
										$var = User::userData('prefixo');
										if (empty($var)) {
											$prefixo = '';
										} else {
											$prefixo = '<font style="color:' . User::userData('prefixo_cor') . '">[' . (filter(User::userData('prefixo'))) . ']</font>';
										}
										?>
										<?php echo $prefixo; ?> <font style="color: <?php echo User::userData('nome_cor'); ?>"><?php echo User::userData('username'); ?></font>
									</p>
								</div> <input style="width: 100%;
					text-shadow: 0 1px 2px rgba(0,0,0,0.2);
					background: #6c9c14;
					color: #fff;
					transition: 200ms background;
					cursor: pointer;
					text-align: center;    width: calc(50% - 5px);
					padding: 9px 10px;
					border-radius: 3px;
					float: right;
					border: 1px solid #6c9c14;
					margin-top: 10px;" name="post" type="submit" value="<?= $lang['Csa']; ?>">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'assets/fundo.php'; ?>
	<script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.cookyjs.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.BBCJS.js?4" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.share.min.js?v3" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.global.js?78" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/register.pushn.js" charset="utf-8"></script>
	<script data-cfasync="false" src="/templates/galaxy/assets/js/jquery.settings.js?LVL254" charset="utf-8"></script>
	<script src='/templates/galaxy/assets/js/spectrum.js'></script>
	<script src="/templates/galaxy/assets/js/parallax.js"></script>
	<script>
		$("#cortag").spectrum({
			color: "#<?php echo User::userData('prefixo_cor'); ?>"
		});
	</script>
	<script>
		$("#cornick").spectrum({
			color: "#<?php echo User::userData('nome_cor'); ?>"
		});
	</script>
</body>

</html>