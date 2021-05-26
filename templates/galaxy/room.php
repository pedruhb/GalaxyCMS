<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - Redirecionando para o quarto...</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/room.css?LVL254" media="screen" />
</head>
<body>
	<?php include 'assets/menu.php';?>
	<div class="page">

		<?php

		$sql33 = $dbh->prepare("SELECT * FROM users where id = :id");
		$sql33->bindParam(':id', $_SESSION['id']);
		$sql33->execute();
		$news33 = $sql33->fetch();
		if ($_GET['id'] >= 1)
		{
			$sql3 = $dbh->prepare("SELECT count(id) as total FROM rooms WHERE id= :id");
			$sql3->bindParam(':id', phb($_GET['id']));
			$sql3->execute();
			$news3 = $sql3->fetch();
			if($news3["total"] == 0)
			{
				echo '<div style="background: #d32f2f;" class="good">Quarto inexistente!</div>';
			}
			else
			{
				$sql = $dbh->prepare("SELECT * FROM rooms WHERE id= :id");
				$sql->bindParam(':id', phb($_GET['id']));
				$sql->execute();
				$news = $sql->fetch();
				$sql2 = $dbh->prepare("SELECT * FROM users WHERE id= :id");
				$sql2->bindParam(':id', $news["owner"]);
				$sql2->execute();
				$news2 = $sql2->fetch();
				if($news["state"] == 'open')
				{

					if($news33['online'] == 1)
					{
						echo '<div style="background: #d32f2f;" class="good">Você deve estar desconectado para usar links de quarto!</div>';

					} else {

					$sql66 = $dbh->prepare("UPDATE users SET quartoid = :quarto WHERE id = :id");
					$sql66->bindParam(':quarto', phb($_GET['id']));
					$sql66->bindParam(':id', $_SESSION['id']);
					$sql66->execute();
					$m23 = str_replace('Æ’', '<i class="fa fa-heart" aria-hidden="true"></i>', $news["caption"]);
					$m2333 = str_replace('Â¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m23);						
					$m33 = str_replace('¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m2333);
					$m43 = str_replace('ƒ', '<i class="fa fa-heart" aria-hidden="true"></i>', $m33);
					$m53 = str_replace('|', '<i class="fa fa-heart-o" aria-hidden="true"></i>', $m43);
					$m63 = str_replace('—', '<i class="fa fa-music" aria-hidden="true"></i>', $m53);
					$m73 = str_replace('‡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m63);
					$m83 = str_replace('•', '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>', $m73);
					$m93 = str_replace('÷', '<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>', $m83);
					$m94 = str_replace('â€”', '<i class="fa fa-music" aria-hidden="true"style="color:white"></i>', $m93);
					$m95 = str_replace('â€¡', '<i class="fa fa-ban" aria-hidden="true" style="color:white"></i>', $m94);
					echo '<div class="good" style="color: #fff;">Você será redirecionado em 3 segundos para o quarto "'.utf8_decode($m93).'" do usuário '.$news2["username"].'.</div>';
					echo '<meta http-equiv="refresh" content="4; /hotel">';
				}
				}
			}
			if($news["state"] == 'locked')
			{
				echo '<div style="background: #d32f2f;" class="good">Quarto trancado!</div>';
			}
			if($news["state"] == 'invisible')
			{
				echo '<div style="background: #d32f2f;" class="good">Quarto inacessível!</div>';
			}
		}
		else {
			echo '<div style="background: #d32f2f;" class="good">Quarto inválido!</div>';
		}

		?>

	</div>
	<?php include 'assets/fundo.php';?>
	<script src="templates/HABBY/assets/js/jquery.min.js" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.cookyjs.min.js" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.extend.js" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.BBCJS.js?4" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.share.min.js?v3" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/jquery.global.js?78" charset="utf-8"></script>
	<script src="templates/HABBY/assets/js/register.pushn.js" charset="utf-8"></script>
</body>
</html>