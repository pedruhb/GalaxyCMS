<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - TOP Quartos</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/palmares.css?LVL254" media="screen" />
</head>
<body>
	<?php include 'assets/menu.php';?>
	<div class="page palmares">

		<div class="boox" style="width:calc(50% - 5px);">
			<div class="title">
				Quartos mais famosos do <?php echo $config['hotelName']?>!
			</div>
			<div class="content newPres">
				<?php
				$stmt = $dbh->prepare("SELECT * FROM rooms ORDER BY score desc LIMIT 10");
				$stmt->execute();
				if (!$stmt->RowCount() == 0)
				{
					while($rooms = $stmt->fetch())
					{
						$sql = "SELECT look, username FROM users where id = ".$rooms['owner']." ";
						$stmt3 = $dbh->prepare($sql);
						$stmt3->execute();
						$dono = $stmt3->fetch();
						$m23 = str_replace('Æ’', '<i class="fa fa-heart" aria-hidden="true"></i>', $rooms["caption"]);
						$m2333 = str_replace('Â¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m23);						
						$m33 = str_replace('¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m2333);
						$m43 = str_replace('ƒ', '<i class="fa fa-heart" aria-hidden="true"></i>', $m33);
						$m53 = str_replace('|', '<i class="fa fa-heart-o" aria-hidden="true"></i>', $m43);
						$m63 = str_replace('—', '<i class="fa fa-music" aria-hidden="true"></i>', $m53);
						$m73 = str_replace('‡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m63);
						$m83 = str_replace('•', '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>', $m73);
						$m93 = str_replace('÷', '<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>', $m83);
						$m94 = str_replace('â€”', '<i class="fa fa-music" aria-hidden="true"></i>', $m93);
						$m95 = str_replace('â€¡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m94);
						echo'
						<div class="bloc">
						<div class="avatar" tooltip tooltip-direction="top" tooltip-content="Quarto de '.$dono['username'].'">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$dono['look'].'">
						</div>
						<div class="info">
						<div class="p">
						<p>'.utf8_decode($m95).'</p>
						<i>'.$rooms['score'].' joinhas</i>
						</div>
						<div class="go">
						<a href="../room/'.$rooms['id'].'">Visitar</a>
						</div>
						</div>
						</div>
						';
					}
				}

				?>

			</div>
		</div>
		<div class="boox" style="width:calc(50% - 5px);">
			<div class="title">
				Grupos mais populares
			</div>
			<div class="content newPres">
				<?php
				$stmt = $dbh->prepare("SELECT *,COUNT(*) AS count FROM groups,group_memberships WHERE groups.id = group_memberships.group_id GROUP BY group_memberships.group_id ORDER BY count DESC LIMIT 10");
				$stmt->execute();
				if (!$stmt->RowCount() == 0)
				{
					while($rooms = $stmt->fetch())
					{
						$m23 = str_replace('Æ’', '<i class="fa fa-heart" aria-hidden="true"></i>', $rooms["name"]);
						$m2333 = str_replace('Â¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m23);						
						$m33 = str_replace('¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m2333);
						$m43 = str_replace('ƒ', '<i class="fa fa-heart" aria-hidden="true"></i>', $m33);
						$m53 = str_replace('|', '<i class="fa fa-heart-o" aria-hidden="true"></i>', $m43);
						$m63 = str_replace('—', '<i class="fa fa-music" aria-hidden="true"></i>', $m53);
						$m73 = str_replace('‡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m63);
						$m83 = str_replace('•', '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>', $m73);
						$m93 = str_replace('÷', '<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>', $m83);
						$m94 = str_replace('â€”', '<i class="fa fa-music" aria-hidden="true"></i>', $m93);
						$m95 = str_replace('â€¡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m94);

						echo'
						<div class="bloc">
						<div class="badge">
						<img src="habbo-imaging/badge/'.$rooms['badge'].'.gif">
						</div>
						<div class="info">
						<div class="p">
						<p>'.utf8_decode($m95).'</p>
						<i>'.$rooms['count'].' membros</i>
						</div>
						<div class="go">
						<a href="../room/'.$rooms['room_id'].'">Visitar o QG</a>
						</div>
						</div>
						</div>
						';
					}
				}

				?>


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