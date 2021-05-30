<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - Trocar Senha</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/newpass.css?LVL254" media="screen" />
</head>
<body>
	<body>
		<div class="header">
			<div class="center">

			</div>
		</div>
		<noscript>
			<div class="error nojs">
				Você precisa usar Javascript!
			</div>
		</noscript>
		<style type="text/css">
		.error {
			border-radius: 3px 0 0 3px;
			margin: 10px;
			float: left;
			width: calc(100% - 20px);
			background: #d32f2f;
			line-height: 40px;
			font-size: 14px;
			color: #fff;
			text-align: center;
		}
		.sucesso {
			border-radius: 3px 0 0 3px;
			margin: 10px;
			float: left;
			width: calc(100% - 20px);
			background: #6c9c14;
			line-height: 40px;
			font-size: 14px;
			color: #fff;
			text-align: center;
		}
	</style>

	<div class="page search">
		<div class="left cinquante" style="width: 100%">
			<div class="box">
				<div class="title black">
					<div class="img">
						<img src="/templates/galaxy/assets/img/box_title_safety.png" />
					</div>
					<p>
						Recuperação de senha.
					</p>
				</div>
				<div class="content">
					<?php
					$keyusernamepega = $dbh->prepare("SELECT userid from resetpassword where resetkey = :key");
					$keyusernamepega->bindParam(':key', $_GET['key']);
					$keyusernamepega->execute();
					$keyusernamepegar = $keyusernamepega->fetch();
					$nomeuserpega = $dbh->prepare("SELECT username from users where id = :id");
					$nomeuserpega->bindParam(':id', $keyusernamepegar['userid']);
					$nomeuserpega->execute();
					$nomeuserpegar = $nomeuserpega->fetch();
					$getArticles = $dbh->prepare("SELECT count(id) as total FROM resetpassword WHERE resetkey = :key AND enable = '0'");
					$getArticles->bindParam(':key', $_GET['key']);
					$getArticles->execute();
					$result = $getArticles->fetch();
					if ($result["total"] == 0)
					{
						echo '<span class="error">Erro na key!</span></div></div>';
					} else {
						echo '					<p>
						Olá '.$nomeuserpegar['username'].', coloque abaixo a sua nova senha!
						</p>
						<form name="resetpasswordnow" method="post">
						<input type="password"  name="password_reset" required placeholder="Nova senha">
						<input style="margin-top: 10px" type="password" name="password_repeat_reset" required placeholder="Repita sua nova senha" >
						<input style="margin-top: 11px" type="submit" name="resetpasswordnow" value="Alterar" />
						</form>
						</div>
						</div>';
					}
					if (isset($_POST['resetpasswordnow']))
					{
						if (isset($_GET['key']) && !empty($_GET['key']))
						{
							if (isset($_POST['password_reset']) && !empty($_POST['password_reset']))
							{
								if (isset($_POST['password_repeat_reset']) && !empty($_POST['password_repeat_reset']))
								{
									if ($_POST['password_reset'] == $_POST['password_repeat_reset'])
									{
										if (strlen($_POST['password_reset']) >= 6)
										{
											$getResetKey = $dbh->prepare("SELECT * FROM resetpassword WHERE resetkey = :key AND enable = '0' LIMIT 1");
											$getResetKey->bindParam(':key', $_GET['key']);
											$getResetKey->execute();
											$getInfo = $getResetKey->fetch();
											if ($getResetKey->RowCount() > 0)
											{
												$newsPassword = user::hashed($_POST['password_reset']);
												$updatePassword = $dbh->prepare("UPDATE users SET password = :password  WHERE id = :userid");
												$updatePassword->bindParam(':password', $newsPassword); 
												$updatePassword->bindParam(':userid', $getInfo['userid']); 
												$updatePassword->execute(); 
												$disableKey = $dbh->prepare("UPDATE resetpassword SET enable = '1'  WHERE userid = :userid AND resetkey = :resetkey");
												$disableKey->bindParam(':userid', $getInfo['userid']); 
												$disableKey->bindParam(':resetkey', $_GET['key']); 
												$disableKey->execute();   
												echo '<span class="sucesso">Senha alterada com sucesso!</span>';
											}
											else
											{
												echo '<span class="error">Erro na key!</span>';
											}
										}
										else
										{
											echo '<span class="error">Senha pequena demais!</span>';
										}
									}
									else
									{
										echo '<span class="error">Senha vazia!</span>';
									}
								}
								else
								{
									echo '<span class="error">Procure um administrador!</span>';
								}
							}
							else
							{
								echo '<span class="error">Procure um administrador!</span>';
							}
						}
						else
						{
							echo '<span class="error">Procure um administrador!</span>';
						}
					}
					?>
		</div>
		<div class="cinquante right">
			<div class="box">


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
</body>
</html>