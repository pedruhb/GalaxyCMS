<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['Ptit']; ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/search.css?LVL254" media="screen" />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page search">
		<div class="left cinquante" style="width: 100%;">
			<div class="box">
				<div class="title black">
					<div class="img">
						<img src="/templates/galaxy/assets/img/box_title_search.png" />
					</div>
					<p>
						<?= $lang['P']; ?>
					</p>
				</div>
				<div class="content">
					<p>
						<?= $lang['Pi']; ?>
					</p>
					<form name="post" method="post">
						<input type="text" name="p" value="<?php echo $_POST['p']; ?>" required placeholder="<?= $lang['Pnome']; ?>" />
						<input type="submit" name="post" value="<?= $lang['Pp']; ?>" />
					</form>
				</div>
			</div>
			<?php
			if (isset($_POST['post'])) {
				$getArticles = $dbh->prepare("SELECT * FROM users where username like :user;");
				$getArticles->bindValue(":user", "%".$_POST['p']."%");
				$getArticles->execute();
				
				if ($getArticles->rowCount() == 0) {
					echo '<div class="error">'.$lang['Pnre'].'</div>';
				} else {

					$i=0;
					while ($result1 = $getArticles->fetch()) {

						if($i > 99)
							continue;

						$m2 = str_replace('Æ’', '<i class="fa fa-heart" aria-hidden="true"></i>', $result1['motto']);
						$m3 = str_replace('¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m2);
						$m4 = str_replace('ƒ', '<i class="fa fa-heart" aria-hidden="true"></i>', $m3);
						$m5 = str_replace('|', '<i class="fa fa-heart-o" aria-hidden="true"></i>', $m4);
						$m6 = str_replace('—', '<i class="fa fa-music" aria-hidden="true"></i>', $m5);
						$m7 = str_replace('‡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m6);
						$m8 = str_replace('•', '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>', $m7);
						$m9 = str_replace('÷', '<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>', $m8);

						echo '
						<div class="user" style="width: 232px;margin-right: 10px;">
						<div class="avatar">
						<img src="'.$config['avatarImageUrl'].'?figure=' . $result1['look'] . '">
						</div>
						<div class="uinfo">
						<a target="_blank" href="../home/' . $result1['username'] . '">' . $result1['username'] . '</a>
						<p class="habbfont">' . utf8_decode($m9) . '</p>
						</div>
						</div>';
						$i++;
					}
				}
			}
			?>

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
</body>

</html>