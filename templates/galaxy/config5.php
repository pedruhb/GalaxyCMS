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
							<a href="config4"><?= $lang['Cas']; ?></a>
						</li>
						<li>
							<a class='slc' href="config5"><?= $lang['Ce']; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="errblok">
			</div>
			<div class="box">
				<div class="title red">
					<div class="img">
						<img src="/templates/galaxy/assets/img/settings_title_badges.png" />
					</div>
					<p><?= $lang['CGE'];?></p>
				</div>
				<div class="content">
					<div class="badges">
						<p><?= $lang['CGEi'];?></p>
						<noscript>
							<div class="error">
								Você precisa de javascript / I need Javascript
							</div>
						</noscript>
						<div class="badgelist">
							<?php 

							if (isset($_POST['post']))
							{ 
								$sqlm = $dbh->prepare("DELETE FROM `users_badges` WHERE `badge_code` = :bid and user_id = :uid;");
								$sqlm->bindValue(':bid', $_POST['codigo']); 
								$sqlm->bindValue(':uid', User::userData('id')); 
								$sqlm->execute();
							}

							$stmt = $dbh->prepare("SELECT * FROM users_badges WHERE user_id = :userid order by id desc");
							$stmt->bindValue(':userid', User::userData('id')); 
							$stmt->execute();
						
							if (!$stmt->RowCount() == 0)
							{
								while($badge = $stmt->fetch())
								{
									echo'
									<div tooltip tooltip-direction="top" tooltip-content="'.$badge["badge_code"].'" class="badgeGestion" slot="0" id="'.filter($badge["badge_code"]).'">
									<img src="'.$config['badgeURL'].filter($badge["badge_code"]).'.gif" />
									<form method="post" type="submit"><input type="hidden" name="codigo" value="'.$badge["badge_code"].'"> 
									<button name="post" type="submit" style="cursor:pointer"><i style="cursor:pointer;position: absolute;right: -5px;font-weight: bold;top: -5px;color: #fff;background: #c62828;width: 20px;height: 20px;text-align: center;line-height: 20px;font-size: 12px;border-radius: 50px;box-shadow: 0 0 0 3px #fff;" class="fa fa-minus" aria-hidden="true"></i></button>
									</form>
									</div>
									';
								}
							}
							else
							{
								echo '<center><p>'.$lang['CntE'].'</p><br></center>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'assets/fundo.php';?>
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