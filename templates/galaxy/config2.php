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
							<a href="config"><?= $lang['Cp']; ?></a>
						</li>
						<li>
							<a class='slc' href="config2"><?= $lang['Ccj']; ?></a>
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

				if (isset($_POST['post'])) {
					$stmt113 = $dbh->prepare("UPDATE `users_settings` SET block_following = :bf, block_friendrequests = :bfr, ignore_bots = :ib, ignore_pets = :ip WHERE user_id = :id;");
					$stmt113->bindParam(':id', User::userData('id'));
					$stmt113->bindParam(":bf", $_POST['block_following']);
					$stmt113->bindParam(":bfr", $_POST['block_friendrequests']);
					$stmt113->bindParam(":ib", $_POST['ignore_bots']);
					$stmt113->bindParam(":ip", $_POST['ignore_pets']);
					$stmt113->execute();

					echo '<div class="error tctm success">' . $lang['CAr'] . '</div>';
				}

				$stmt11 = $dbh->prepare("SELECT * FROM users_settings WHERE user_id = :id");
				$stmt11->bindParam(':id', User::userData('id'));
				$stmt11->execute();
				$ativar11 = $stmt11->fetch();

				?>
			</div>
			<div class="box">
				<div class="title red">
					<div class="img">
						<img src="/templates/galaxy/assets/img/settings_title_general.png" />
					</div>
					<p><?= $lang['Ccj']; ?></p>
				</div>
				<div class="content">
					<div class="general">
						<p><?= $lang['Cconta2'] ?></p>
						<noscript>
							<div class="error">
								é necessário javascript! / I need javascript
							</div>
						</noscript>

						<form method="post">
							<div class="right" style="float: right;
							    width: 98%;
							padding: 10px 10px 10px 0;">

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
							padding: 10px;"><?= $lang['Cse']; ?></p>
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
							cursor: pointer;" tyoe='profilCommentaires' style="background: rgba(0,0,0,0);" class='switch_set'>
										<select name="block_following" style="border-radius: 0px;border-color: rgb(169, 169, 169);-webkit-appearance: menulist;box-sizing: border-box;align-items: center;white-space: pre;-webkit-rtl-ordering: logical;color: black;background-color: white;cursor: default;border-width: 1px;border-style: solid;border-color: initial;border-image: initial;text-rendering: auto;color: initial;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;margin: 0em;font: 400 13.3333px Arial;">
											<option <?php if ($ativar11['block_following'] == 0) {
														echo 'selected';
													} ?> value="0"><?= $lang['sim']; ?></option>
											<option <?php if ($ativar11['block_following'] == 1) {
														echo 'selected';
													} ?> value="1"><?= $lang['nao']; ?></option>
										</select>
									</div>
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
					padding: 10px;"><?= $lang['Cadd']; ?></p>
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
					cursor: pointer;" tyoe='profilCommentaires' style="background: rgba(0,0,0,0);" class='switch_set'>
										<select name="block_friendrequests" style="border-radius: 0px;border-color: rgb(169, 169, 169);-webkit-appearance: menulist;box-sizing: border-box;align-items: center;white-space: pre;-webkit-rtl-ordering: logical;color: black;background-color: white;cursor: default;border-width: 1px;border-style: solid;border-color: initial;border-image: initial;text-rendering: auto;color: initial;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;margin: 0em;font: 400 13.3333px Arial;">
											<option <?php if ($ativar11['block_friendrequests'] == 0) {
														echo 'selected';
													} ?> value="0"><?= $lang['sim']; ?></option>
											<option <?php if ($ativar11['block_friendrequests'] == 1) {
														echo 'selected';
													} ?> value="1"><?= $lang['nao']; ?></option>
										</select>
									</div>
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
			padding: 10px;"><?= $lang['Cib']; ?></p>
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
			cursor: pointer;" tyoe='profilCommentaires' style="background: rgba(0,0,0,0);" class='switch_set'>
										<select name="ignore_bots" style="border-radius: 0px;border-color: rgb(169, 169, 169);-webkit-appearance: menulist;box-sizing: border-box;align-items: center;white-space: pre;-webkit-rtl-ordering: logical;color: black;background-color: white;cursor: default;border-width: 1px;border-style: solid;border-color: initial;border-image: initial;text-rendering: auto;color: initial;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;margin: 0em;font: 400 13.3333px Arial;">
											<option <?php if ($ativar11['ignore_bots'] == 1) {
														echo 'selected';
													} ?> value="1"><?= $lang['sim']; ?></option>
											<option <?php if ($ativar11['ignore_bots'] == 0) {
														echo 'selected';
													} ?> value="0"><?= $lang['nao']; ?></option>
										</select>
									</div>
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
	padding: 10px;"><?= $lang['Cip']; ?></p>
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
	cursor: pointer;" tyoe='profilCommentaires' style="background: rgba(0,0,0,0);" class='switch_set'>
										<select name="ignore_pets" style="border-radius: 0px;border-color: rgb(169, 169, 169);-webkit-appearance: menulist;box-sizing: border-box;align-items: center;white-space: pre;-webkit-rtl-ordering: logical;color: black;background-color: white;cursor: default;border-width: 1px;border-style: solid;border-color: initial;border-image: initial;text-rendering: auto;color: initial;letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;display: inline-block;text-align: start;margin: 0em;font: 400 13.3333px Arial;">
											<option <?php if ($ativar11['ignore_pets'] == 1) {
														echo 'selected';
													} ?> value="1"><?= $lang['sim']; ?></option>
											<option <?php if ($ativar11['ignore_pets'] == 0) {
														echo 'selected';
													} ?> value="0"><?= $lang['nao']; ?></option>
										</select>
									</div>
								</div>

								<input style="width: 100%;
text-shadow: 0 1px 2px rgba(0,0,0,0.2);
background: #6c9c14;
color: #fff;
transition: 200ms background;
cursor: pointer;
text-align: center;    width: calc(50% - 5px);
padding: 9px 10px;
border-radius: 3px;
    margin-left: 25%;
border: 1px solid #6c9c14;
margin-top: 10px;" method="post" name="post" type="submit" value="<?= $lang['Csa']; ?>">
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
	<script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="//www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
</body>

</html>