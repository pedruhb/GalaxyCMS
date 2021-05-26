<?php
if (isset($_GET['userref'])) {
	$userref = $_GET['userref'];
} else {
	$userref = '';
}

?>
<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['Rtitle']; ?></title>
	<link rel="stylesheet" href="/templates/galaxy/assets/css/register.css?2206" media="screen" title="register css" />
</head>

<body>
	<?php User::register(); ?>
	<div style="position: absolute;bottom: 0; left: 0; right: 0">
		<strong>
		</strong>
	</div>
	<div class="pc_device">
		<div class="top">
			<div class="center">
				<a href="../index">
				</a>
			</div>
		</div>
		<noscript>
			<div class="error nojs">
				Você precisa de Javascript! / I need Javascript
			</div>
		</noscript>
		<div class="section white">

			<div class="center">
				<h1 class="green" style="width:calc(60% + 7.5px);">
					<p><?= $lang['Rinscrevase']; ?></p>
					<i><?= $lang['RinscrevaseI']; ?></i>
				</h1>
				<h1 class="green" style="width:calc(40% - 7.5px);">
					<p><?= $lang['Rporque']; ?></p>
					<i><?= $lang['RporqueI']; ?></i>
				</h1>
				<form method="post">
					<div class="champ">
						<img src="/templates/galaxy/assets/img/register_username.png" />
						<p><?= $lang['Rusuario']; ?></p>
						<span><?= $lang['RusuarioI']; ?></span>
						<input type='text' id="usuariophb" name="username" autofocus="" autocomplete="off" value='' placeholder='' />
					</div>
					<div class="champ">
						<img src="/templates/galaxy/assets/img/register_mail.png" />
						<p><?= $lang['Remail']; ?></p>
						<span><?= $lang['RemailI']; ?></span>
						<input type='email' name="email" autocomplete="off" value='' placeholder='' />
					</div>
					<div class="champ">
						<img src="/templates/galaxy/assets/img/register_password.png" />
						<p><?= $lang['Rsenha']; ?></p>
						<span><?= $lang['RsenhaI']; ?></span>
						<input type='password' name="password" autocomplete="off" value='' placeholder='' />
					</div>
					<div class="champ">
						<img src="/templates/galaxy/assets/img/register_password.png" />
						<p><?= $lang['RsenhaR']; ?></p>
						<span><?= $lang['RsenhaRI']; ?></span>
						<input type='password' name="password_repeat" autocomplete="off" value='' placeholder='' />
					</div>

					<div class="champ">
						<img src="/templates/galaxy/assets/img/register_username.png" />
						<p><?= $lang['Rreferencia']; ?></p>
						<span><?= $lang['RreferenciaI']; ?></span>
						<input type='text' name="referrer" autofocus="" autocomplete="off" value="<?= $userref; ?>" placeholder='<?= $lang['RreferenciaP']; ?>' />
					</div>

					<?php if ($config['recaptchaSiteKeyEnable'] == true) { ?>
						<div class="champ">
							<p><?= $lang['Rverificacao']; ?></p>
							<span><?= $lang['RverificacaoI']; ?></span>
							<div class="g-recaptcha" data-sitekey="<?= $config['recaptchaSiteKey'] ?>"></div>
						</div>
						<br><br><br>
					<?php } ?>

					<input type='hidden' name="motto" value="<?= $config['startMotto'];?>"/>
					<input type='hidden' name="avatar" value="sh-295-62.hd-180-10.ch-255-1193.lg-275-81.hr-3163-45.0"/>

					<input type="submit" name="register" value="<?= $lang['Rbotao']; ?>" />
				</form>
				<div class="content why">
					<div class="bloc">
						<div class="img">
							<img src="/templates/galaxy/assets/img/pk1.png" />
						</div>
						<div class="reason">
							<h1><?= $lang['Rreason1']; ?></h1>
							<p><?= $lang['Rreason1P']; ?></p>
						</div>
					</div>
					<div class="bloc">
						<div class="img">
							<img src="/templates/galaxy/assets/img/pk2.png" />
						</div>
						<div class="reason">
							<h1><?= $lang['Rreason2']; ?></h1>
							<p><?= $lang['Rreason2P']; ?></p>
						</div>
					</div>
					<div class="bloc">
						<div class="img">
							<img src="/templates/galaxy/assets/img/pk3.png" />
						</div>
						<div class="reason">
							<h1><?= $lang['Rreason3']; ?></h1>
							<p><?= $lang['Rreason3P']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom presk">
				<div class="trait"></div>
			</div>
		</div>
		<div class="section presk">
			<div class="center">
				<div class="footer">
					<div class="link">
					</div>
					<div class="copy">
						&copy; <?php echo $config['hotelName'] ?> Hotel - <?php echo date("Y"); ?>. - Powered by <a href="https://galaxyservers.host/" target="_blank">
							<font style="color:#6047ad">GalaxyServers</font>
						</a>.</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.register.js?21003" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.global.js?5" charset="utf-8"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>