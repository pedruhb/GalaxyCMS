<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - Pesquisar usuário</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/search.css?LVL254" media="screen" />
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
				</div><?php User::editUsername(); ?>
				<div class="content">
					<p>
						Olá <?php $_SESSION['FULLNAME'];?>, coloque abaixo o seu novo nome de usuário!
					</p>
					
					<form action="" method="post">
						<input type="text"  name="username" required placeholder="Nome de usuário">
						<input style="margin-top: 11px" type="submit" name="editusername" value="Pronto!" />
					</form>
				</div>
			</div>
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