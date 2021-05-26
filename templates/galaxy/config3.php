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
					<p><?= $lang['Cconta'];?></p>
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
							<a class='slc' href="config3"><?= $lang['Cae']; ?></a>
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
				if (isset($_POST['mail'])) {

					$getArticles = $dbh->prepare("SELECT id FROM users where mail = :mail");
					$getArticles->bindValue(':mail', $_POST['newmail']);
					$getArticles->execute();

					if (empty($_POST['newmail'])) {
						echo '<div class="error tctm ">' . $lang['CEnb'] . '</div> ';
					} else if ($_POST['newmail'] == User::userData('mail')) {
						echo '<div class="error tctm ">' . $lang['CEea'] . '</div> ';
					} else if ($result['total'] > 0) {
						echo '<div class="error tctm ">' . $lang['CEje'] . '</div> ';
					} else {
						$result = $getArticles->fetch();

						$body = '
						<td class="m_7569049885038207538wrapper" style="padding:0 10px">
						<table width="100%" cellpadding="0" cellspacing="0">
						<tbody><tr>
						<td bgcolor="#eaeced">
						<table class="m_7569049885038207538flexible" width="600" align="center" style="margin:0 auto" cellpadding="0" cellspacing="0">
						<tbody><tr>
						<td class="m_7569049885038207538img-flex"><img src="' . $config['imagememail'] . '" style="vertical-align:top" width="600" height="249" alt="" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 795px; top: 215px;"><div id=":28s" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Fazer o download do anexo " data-tooltip-class="a1V" data-tooltip="Fazer o download"><div class="aSK J-J5-Ji aYr"></div></div></div></td>
						</tr>
						<tr>
						<td class="m_7569049885038207538holder" style="padding:65px 60px 50px" bgcolor="#f9f9f9">
						<table width="100%" cellpadding="0" cellspacing="0">
						<tbody><tr>
						<td class="m_7569049885038207538title" align="center" style="font:30px/33px Arial,Helvetica,sans-serif;color:#292c34;padding:0 0 24px">
						'.$lang['ola'].' ' . User::userData('username') . ',<br>'.$lang['CEea'].'<br>'.$lang['CEantigo'].': ' . User::userData('mail') . '<br>'.$lang['CEnovo'].': ' . $_POST['newmail'] . '
						</td>
						</tr>
						<tr>
						<td style="padding:0 0 20px">
						<table width="134" align="center" style="margin:0 auto" cellpadding="0" cellspacing="0">
						<tbody><tr>
						<br><br><td class="m_7569049885038207538btn" align="center" style="font:12px/14px Arial,Helvetica,sans-serif;color:#f8f9fb;text-transform:uppercase;border-radius:2px" bgcolor="#f5ba1c">
						<a style="text-decoration:none;color:#f8f9fb;display:block;padding:12px 10px 10px" href="' . $config['hotelUrl'] . '/hotel" target="_blank" >JOGAR</a>
						</td>
						</tr>
						</tbody></table>
						</td>
						</tr>
						</tbody></table>
						</td>
						</tr>
						<tr>
						<td height="28">
						</td>
						</tr>
						</tbody></table>
						</td>
						</tr>
						</tbody></table>
						</td>';

						email($_POST['useremail'], $body, $lang['CEbody']);

						$sqlm = $dbh->prepare("UPDATE users set mail = :mail where id = :id");
						$sqlm->bindValue(':mail', $_POST['newmail']);
						$sqlm->bindValue(':id', User::userData('id'));
						$sqlm->execute();

						echo '<div class="error success tctm ">'.$lang['CEok'].'</div> ';
					}
				}
				?>
			</div>
			<div class="box">
				<div class="title red">
					<div class="img">
						<img src="/templates/galaxy/assets/img/settings_title_mail.png" />
					</div>
					<p><?= $lang['CMe']; ?></p>
				</div>
				<div class="content">
					<div class="mail">
						<p><?= $lang['CMep']; ?></p>
						<form action="" name="mail" method="post">
							<p><?= $lang['Ceea']; ?> <b><?= User::userData('mail') ?></b></p>
							<input type="hidden" name="type" value="mail" />
							<input type="mail" name="newmail" value="" placeholder="<?= $lang['Cnem']; ?>" />
							<input type="submit" name="mail" value="<?= $lang['Csa']; ?>" />
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