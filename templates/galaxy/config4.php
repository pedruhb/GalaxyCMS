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
						<img src="/templates/galaxy/assets/img/gear.png" />
					</div>
					<p><?= $lang['Cconta']; ?></p>
				</div>
				<div class="content">
					<ul>
						<li>
							<a href="config"><?= $lang['Cp']; ?></a>
						</li>
						<li>
							<a href="config2"><?= $lang['Ccj']; ?></a>
						</li>
						<li>
							<a href="config3"><?= $lang['Cae']; ?></a>
						</li>
						<li>
							<a class='slc' href="config4"><?= $lang['Cas']; ?></a>
						</li>
						<li>
							<a href="config5"><?= $lang['Ce']; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="errblok ">
				<?php User::editpassword(); ?>
			</div>
			<div class="box">
				<div class="title red">
					<div class="img">
						<img src="/templates/galaxy/assets/img/settings_title_password.png" />
					</div>
					<p><?= $lang['CEms']; ?></p>
				</div>
				<div class="content">
					<div class="password">
						<p><?= $lang['CEmsd']; ?></p>
						<form action="" method="POST">
							<input type="password" name="newpass" value="" placeholder="<?= $lang['CSSa']; ?>" />
							<input type="password" name="newpass_v" value="" placeholder="<?= $lang['CSNS']; ?>" />
							<input type="submit" name="password" value="<?= $lang['Csa']; ?>" />
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
</body>

</html>