<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['Indextitle']; ?></title>
	<link rel="stylesheet" href="/templates/galaxy/assets/css/index.css?190322" media="screen" title="index css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php User::Login(); ?>
	<div style="position: absolute;bottom: 0; left: 0; right: 0">
	</div>
	<div class="cache" style="display:none;">
		<div class="box" style="display:none;">
			<div class="title red">
				<p><?= $lang['Indexdados']; ?></p>
				<div class="close"></div>
			</div>
			<div class="content">
				<?= $lang['Indexdados2']; ?>
				<br /><br />
				<div class="changemdp_ajxload"></div>
				<?php
				if (isset($_POST['sendresetpasswordnow'])) ## RECUPERAÇÂO DE SENHA
				{
					$getUserinfo = $dbh->prepare("SELECT id, mail, username FROM users WHERE username = :username");
					$getUserinfo->bindValue(':username', $_POST['username']);
					$getUserinfo->execute();
					$getInfo = $getUserinfo->fetch();
					if ($getUserinfo->RowCount() > 0) {
						$resetKeyhash = md5(str_shuffle(1290 * 3 + $getInfo['id']));
						$addResetKey = $dbh->prepare("
							INSERT INTO
							resetpassword
							(userid,resetkey)
							VALUES
							(
							:userid, 
							:resetkey
						)");
						$addResetKey->bindValue(':userid', $getInfo['id']);
						$addResetKey->bindParam(':resetkey', $resetKeyhash);
						$addResetKey->execute();
						$infoUser = $dbh->prepare("SELECT id, username FROM users WHERE id = :id LIMIT 1");
						$infoUser->bindValue(':id', $getInfo['id']);
						$infoUser->execute();
						$getInfoUser = $infoUser->fetch();
						$email = $getInfo["mail"];
						require_once('system/class.phpmailer.php');
						$time = time();
						$mail = new PHPMailer();
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
						' . $lang['IndexOla'] . ' ' . $getInfo["username"] . '!
						</td>
						</tr>
						<tr>
						<td style="padding:0 0 20px">
						<table width="134" align="center" style="margin:0 auto" cellpadding="0" cellspacing="0">
						<tbody><tr>
						<br><br><td class="m_7569049885038207538btn" align="center" style="font:12px/14px Arial,Helvetica,sans-serif;color:#f8f9fb;text-transform:uppercase;border-radius:2px" bgcolor="#f5ba1c">
						<a style="text-decoration:none;color:#f8f9fb;display:block;padding:12px 10px 10px" href="' . $config['hotelUrl'] . '/newpassword/' . $resetKeyhash . '" target="_blank" >' . $lang['IndexdadosAS'] . '</a>
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
						$mail->IsSMTP(); // telling the class to use SMTP
						$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)// 1 = errors and messa                                // 2 = messages only
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->SMTPSecure = "tls";
						$mail->Host       = $config['smtphost']; // sets the SMTP server
						$mail->Port       = $config['smtpport'];                   // set the SMTP port for the GMAIL server
						$mail->Username   = $config['smtpuname']; // SMTP account username
						$mail->Password   = $config['smtppassword'];        // SMTP account password
						$mail->SetFrom($config['smtpemail'], $config['hotelName']);
						$mail->AddReplyTo($config['emailadm'], $config['hotelName']);
						$mail->CharSet = 'UTF-8';
						$mail->Subject    = $config['hotelName'] . " - Recupere sua senha!";
						$mail->AltBody    = $config['hotelName'] . " - Recupere sua senha!";
						$mail->MsgHTML($body);
						$address = $email;
						$mail->AddAddress($address, $getInfo["username"]);
						if ($mail->Send()) {
							echo '<script>alert("' . $lang['IndexRUEnviado'] . ' \n' . $address . '\")</script>';
						} else {
							echo '<script>alert("' . $lang['IndexRUErro'] . '")</script>';
						}
					}
				}
				if (isset($_POST['sendresetpasswordnow2'])) ### RECUPERAÇÂO DE NICK
				{
					$getUserinfo = $dbh->prepare("SELECT id, mail, username FROM users WHERE mail = :mail");
					$getUserinfo->bindValue(':mail', $_POST['mail2']);
					$getUserinfo->execute();
					$getInfo = $getUserinfo->fetch();
					if ($getUserinfo->RowCount() == 0) {
						echo '<script>alert("' . $lang['IndexRUErro2'] . '")</script>';
					} else if ($getUserinfo->RowCount() > 0) {

						$infoUser = $dbh->prepare("SELECT id, username FROM users WHERE id = :id LIMIT 1");
						$infoUser->bindParam(':id', $getInfo['id']);
						$infoUser->execute();
						$getInfoUser = $infoUser->fetch();
						$email = $getInfo["mail"];
						require_once('system/class.phpmailer.php');
						$time = time();
						$mail = new PHPMailer();
						$body = '<td class="m_7569049885038207538wrapper" style="padding:0 10px">

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
		' . $lang['IndexOla'] . '!<br>' . $lang['IndexNickRS'] . ' ' . $getInfo["username"] . '
		</td>

		</tr>
		<tr>
		<td style="padding:0 0 20px">
		<table width="134" align="center" style="margin:0 auto" cellpadding="0" cellspacing="0">
		<tbody>
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
						$mail->IsSMTP(); // telling the class to use SMTP
						$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)// 1 = errors and messa                                // 2 = messages only
						$mail->SMTPAuth   = true;                  // enable SMTP authentication
						$mail->SMTPSecure = "tls";
						$mail->Host       = $config['smtphost']; // sets the SMTP server
						$mail->Port       = $config['smtpport'];                    // set the SMTP port for the GMAIL server
						$mail->Username   = $config['smtpuname']; // SMTP account username
						$mail->Password   = $config['smtppassword'];        // SMTP account password
						$mail->SetFrom($config['smtpemail'], $config['hotelName']);
						$mail->AddReplyTo($config['emailadm'], $config['hotelName']);
						$mail->CharSet = 'UTF-8';
						$mail->Subject    = $config['hotelName'] . " - Recupere sua senha!";
						$mail->AltBody    = $config['hotelName'] . " - Recupere sua senha!";
						$mail->MsgHTML($body);
						$address = $email;
						$mail->AddAddress($address, $getInfo["username"]);
						if ($mail->Send()) {
							echo '<script>alert("' . $lang['IndexRUEnviado'] . '\n' . $address . '\n")</script>';
						} else {
							echo '<script>alert("' . $lang['IndexRUErro'] . '")</script>';
						}
					}
				}
				?>
				<form class="sendresetpasswordnow" name="mdpform" method="post">
					<p><?= $lang['IndexRS']; ?></p>
					<input class="mail_email" type="text" style="width: 55%" name="username" placeholder="<?= $lang['IndexRUsuario']; ?>"><input type="submit" name="sendresetpasswordnow" value="OK">
				</form>
				<form class="mdpform" name="sendresetpasswordnow2" method="post">
					<p><?= $lang['IndexRU']; ?></p>
					<input class="mail_email" type="email" style="width: 55%" name="mail2" placeholder="<?= $lang['IndexREmail']; ?>"><input name="sendresetpasswordnow2" type="submit" value="OK">
				</form>
			</div>
		</div>
	</div>
	<div class="pc_device">
		<div class="top">
			<div class="center" style="color: #000">
				<a href="index" class="transwitch">
				</a>
				<div class="buttons">
				</div>
			</div>
			<div class="down">
				<a style="font-size: 13px;
			float: left;
			margin-left: 10px;
			color: #fff;
			transition: 200ms background;
			text-shadow: 0 1px 2px rgba(0,0,0,0.2);
			line-height: 40px;
			padding: 0 20px;
			border-radius: 3px;
			cursor: pointer;background: #2A88AA;" class="btn" href="register"><?= $lang['IndexRegistrar']; ?></a>
				<div class="right">
					<form class="loginform" id="login" name="login" action="#" method="post">
						<input type="text" class="login_mailornick" autofocus="" onchange="MudaAvatar()" onkeyup="MudaAvatar()" id="username" name="username" required value="" placeholder="<?= $lang['IndexLUsuario']; ?>" />
						<div class="avatarlogin">
							<img id="imgspacep" src="/templates/galaxy/assets/img/ghost.png" style="margin-top: -10px;">
						</div>
						<input type="password" class="login_password" id="password" name="password" value="" required placeholder="<?= $lang['IndexLSenha']; ?>" />
						<input type="submit" name="login" class="login_send" value="<?= $lang['IndexEntrar']; ?>" placeholder="" />
						<a class="cacheOpener captcha"><?= $lang['IndexRecuperacao']; ?></a>

					</form>
				</div>
			</div>
		</div>
		<noscript>
			<div class="error nojs">
				Você precisa de javascript! / I need Javascript.
			</div>
		</noscript>
		<?php
		$sql3 = $dbh->prepare("SELECT count(id) as noticiastotal FROM cms_news");
		$sql3->execute();
		$news13 = $sql3->fetch();
		$totalnotificas = $news13['noticiastotal'];
		if ($news13['noticiastotal'] >= 1) {
		?>
			<div class="section white">
				<div class="center">
					<h1 class="green">
						<p><?= $lang['IndexUN']; ?></p>
					</h1>
					<div class="news">
						<?php
						$sql = $dbh->prepare("SELECT * FROM cms_news ORDER BY ID DESC LIMIT 4");
						$sql->execute();
						while ($news1 = $sql->fetch()) {
							echo '
						<div class="new">
						<div class="photo" style="background:url(' . $news1["image"] . ')  no-repeat center right;">
												</div>
						<div class="content">
						<p class="title">' . $news1["title"] . '</p>
						<p class="snippet">' . $news1["shortstory"] . '</p>
						</div>
						</div>
						';
						}
						?>
					</div>
				</div>
				<div class="bottom presk">
					<div class="trait"></div>
				</div>
			</div>
		<?php } ?>
		<div class="section presk">
			<div class="center">
				<h1 class="white" style="width:70%;">
					<p><?= $lang['IndexNU']; ?></p>
					<i><?= $lang['IndexNUi']; ?></i>
				</h1>
				<h1 class="white" style="width:30%;">
					<p><?= $lang['IndexUA']; ?></p>
					<i><?= $lang['IndexUAi']; ?></i>
				</h1>
				<div class="forum">
					<?php
					function difer_data($data)
					{

						$agora = new DateTime();
						try {
							$data_ref = new DateTime($data);
						} catch (Exception $e) {
							echo $e->getMessage();
							return NULL;
						}
						$intervalo = $data_ref->diff($agora);
						extract((array) $intervalo);
						if ($y >= 1) {
							$sufixo = "{$y} " . ($y == 1 ? $lang['ano'] : $lang['anos']);
						} else    
						if ($m >= 1) {
							$sufixo = "{$m} " . ($m == 1  ? $lang['mes'] : $lang['meses']);
						} else    
						if ($d > 7) {
							$sufixo = floor($d / 7) . " " . ($d <= 14 ? $lang['semana'] : $lang['semanas']);
						} else    
								if ($d >= 1) {
							$sufixo = "{$d} " . ($d == 1  ? $lang['dia'] : $lang['dias']);
						} else    
										if ($h >= 1) {
							$sufixo = "{$h} " . ($h == 1  ? $lang['hora'] : $lang['horas']);
						} else    
												if ($i >= 1) {
							$sufixo = "{$i} " . ($i == 1  ? $lang['minuto'] : $lang['minutos']);
						} else {
							$sufixo = "{$s} " . $lang['segundos'];
						}
						return $lang['IndexRegistrouHa'] . " {$sufixo}";
					}
					$getArticles = $dbh->prepare("SELECT * FROM users ORDER BY id DESC limit 6");
					$getArticles->execute();
					while ($news = $getArticles->fetch()) {
						$dataregistro = difer_data(date('Y-m-d G:i:s', $news['account_created']));
						$missao = utf8_decode($news["motto"]);
						echo '<a class="sujet">
<div class="avatar" tooltip tooltip-direction="top" tooltip-content="' . $dataregistro . '">
<img src="' . $config['avatarImageUrl'] . '?figure=' . $news["look"] . '" />
</div>
<div class="infos">
<p class="title">
' . $news["username"] . ' </p>
<p class="by">
' . $lang['IndexMissao'] . ' ' . $missao . '</span>
</p>
</div>
</a>';
					}
					?>
				</div>
				<div class="classment">
					<?php
					$getMessagedd = $dbh->prepare("SELECT users.username, users.look, users_settings.online_time FROM users, users_settings WHERE users.id = users_settings.id and users.rank < 3 ORDER BY online_time DESC LIMIT 1");
					$getMessagedd->execute();
					$getMessageDatadd = $getMessagedd->fetch();
					$total = $getMessageDatadd['OnlineTime'];
					$horas = floor($total / 3600);
					$minutos = floor(($total - ($horas * 3600)) / 60);
					$segundos = floor($total % 60);
					?>
					<div class="mek first">
						<a target="_blank" tooltip tooltip-direction="bottom" tooltip-content="<?php echo $getMessageDatadd['username']; ?>">
							<img src="<?= $config['avatarImageUrl']; ?>?figure=<?php echo $getMessageDatadd['look']; ?>&gesture=sml&direction=2&action=sit" />
						</a>
						<div class="text">
							<p><?php echo $horas; ?></p>
							<p><?= ucfirst($lang['horas']); ?></p>
						</div>
					</div>
					<?php
					$getMessage22dd = $dbh->prepare("SELECT users.username, users.look, users_settings.online_time FROM users, users_settings WHERE users.id = users_settings.id and users.rank < 3 ORDER BY online_time DESC LIMIT 1, 2 ");
					$getMessage22dd->execute();
					$getMessageData22dd = $getMessage22dd->fetch();

					$total2 = $getMessageData22dd['OnlineTime'];
					$horas2 = floor($total2 / 3600);
					$minutos2 = floor(($total2 - ($horas2 * 3600)) / 60);
					$segundos2 = floor($total2 % 60);
					?>
					<div class="mek second">
						<a target="_blank" tooltip tooltip-direction="bottom" tooltip-content="<?php echo $getMessageData22dd['username']; ?>">
							<img src="<?= $config['avatarImageUrl']; ?>?figure=<?php echo $getMessageData22dd['look']; ?>&gesture=sml&direction=3" />
						</a>
						<div class="text">
							<p><?php echo $horas2; ?></p>
							<p><?= ucfirst($lang['horas']); ?></p>
						</div>
					</div>

					<?php
					$getMessage223dd = $dbh->prepare("SELECT users.username, users.look, users_settings.online_time FROM users, users_settings WHERE users.id = users_settings.id and users.rank < 3 ORDER BY online_time DESC LIMIT 2, 1 ");
					$getMessage223dd->execute();
					$getMessageData223dd = $getMessage223dd->fetch();

					$total23 = $getMessageData223dd['OnlineTime'];
					$horas23 = floor($total23 / 3600);
					$minutos23 = floor(($total23 - ($horas23 * 3600)) / 60);
					$segundos23 = floor($total23 % 60);

					?>
					<div class="mek thrith">
						<a target="_blank" tooltip tooltip-direction="bottom" tooltip-content="<?php echo $getMessageData223dd['username']; ?> ">
							<img src="<?= $config['avatarImageUrl']; ?>?figure=<?php echo $getMessageData223dd['look']; ?>&gesture=sml&direction=4" />
						</a>
						<div class="text">
							<p><?php echo $horas23; ?></p>
							<p><?= ucfirst($lang['horas']); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom black">
				<div class="trait"></div>
			</div>
		</div>
		<div class="section black">
			<div class="center">
				<div class="footer">
					<div class="copy">
						&copy; <?php echo $config['hotelName'] ?> Hotel <?php echo date("Y"); ?> - Powered by <a href="https://galaxyservers.host/" target="_blank">
							<font style="color:#6047ad">GalaxyServers</font>
						</a>.</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		MudaAvatar = function() {
			document.getElementById('imgspacep').src = "/login_avatar.php?user=" + document.getElementById('username').value;
		}
	</script>
	<script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.index.js?21003" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.cookiebar.js?2" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.global.js?5" charset="utf-8"></script>
</body>

</html>