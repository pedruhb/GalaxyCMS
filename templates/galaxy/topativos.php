<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['TAtitulo']; ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/palmares.css?LVL254" media="screen" />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page palmares">

		<div class="boox respects">
			<div class="title">
				<?= $lang['TAev']; ?>
			</div>
			<div class="content">
				<?php
				$getMessage = $dbh->prepare("SELECT users.game_total_level, users.look, users.username FROM users ORDER BY users.game_total_level DESC limit 1");
				$getMessage->execute();
				$getMessageData = $getMessage->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['game_total_level']; ?> <?= $lang['TAeg'];?>">
					<div class="number">
						1°
					</div>
					<div class="avatar">

						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData['look']; ?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData['username']; ?>"><?php echo $getMessageData['username']; ?></a>
				</div>

				<?php
				$getMessage22 = $dbh->prepare("SELECT users.game_total_level, users.look, users.username FROM users ORDER BY users.game_total_level DESC  limit 1, 2 ");
				$getMessage22->execute();
				$getMessageData22 = $getMessage22->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['game_total_level']; ?> <?= $lang['TAeg'];?>">
					<div class="number">
						2°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData22['look']; ?>&head_direction=2&direction=2&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData22['username']; ?>">
						<?php echo $getMessageData22['username']; ?></a>
				</div>

				<?php
				$getMessage223 = $dbh->prepare("SELECT users.game_total_level, users.look, users.username FROM users ORDER BY users.game_total_level DESC limit 2, 1 ");
				$getMessage223->execute();
				$getMessageData223 = $getMessage223->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['game_total_level']; ?> <?= $lang['TAeg'];?>">
					<div class="number">
						3°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData223['look']; ?>&direction=4&head_direction=4&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData223['username']; ?>">
						<?php echo $getMessageData223['username']; ?></a>
				</div>
				<?php
				$getMessage44444 = $dbh->prepare("SELECT users.game_total_level, users.look, users.username FROM users ORDER BY users.game_total_level DESC limit 3, 10");
				$getMessage44444->execute();
				while ($getMessageData4444 = $getMessage44444->fetch()) {
					echo '
							<div class="bloc">
							<div class="avatar">
							<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444['look'] . '" />
							</div>
							<div class="info">
							<a href="../home/' . $getMessageData4444['username'] . '">' . $getMessageData4444['username'] . '</a>
							<i>' . $getMessageData4444['game_total_level'] . ' '.$lang['TAeg'].'</i>
							</div>
							<div class="img"></div>
							</div>
							';
				} ?>
			</div>
		</div>
		<div class="boox respects">
			<div class="title">
				<?= $lang['TAres']; ?>
			</div>
			<div class="content">
				<?php
				$getMessaged = $dbh->prepare("SELECT users_settings.respects_received, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.respects_received DESC limit 1");
				$getMessaged->execute();
				$getMessageDatad = $getMessaged->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatad['respects_received']; ?> <?= $lang['TAre'];?>">
					<div class="number">
						1°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageDatad['look']; ?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageDatad['username']; ?>">
						<?php echo $getMessageDatad['username']; ?></a>
				</div>
				<?php
				$getMessage22d = $dbh->prepare("SELECT users_settings.respects_received, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.respects_received DESC limit 1, 2 ");
				$getMessage22d->execute();
				$getMessageData22d = $getMessage22d->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22d['respects_received']; ?> <?= $lang['TAre'];?>">
					<div class="number">
						2°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData22d['look']; ?>&head_direction=2&direction=2&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData22d['username']; ?>">
						<?php echo $getMessageData22d['username']; ?></a>
				</div>
				<?php
				$getMessage223d = $dbh->prepare("SELECT users_settings.respects_received, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.respects_received DESC limit 2, 1 ");
				$getMessage223d->execute();
				$getMessageData223d = $getMessage223d->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223d['respects_received']; ?> <?= $lang['TAre'];?>">
					<div class="number">
						3°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData223d['look']; ?>&direction=4&head_direction=4&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData223d['username']; ?>">
						<?php echo $getMessageData223d['username']; ?></a>
				</div>
				<?php
				$getMessage44444d = $dbh->prepare("SELECT users_settings.respects_received, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.respects_received DESC limit 3, 10 ");
				$getMessage44444d->execute();
				while ($getMessageData4444d = $getMessage44444d->fetch()) {
					echo '

										<div class="bloc">
										<div class="avatar">
										<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444d['look'] . '" />
										</div>
										<div class="info">
										<a href="../home/' . $getMessageData4444d['username'] . '">' . $getMessageData4444d['username'] . '</a>
										<i>' . $getMessageData4444d['respects_received'] . ' '.$lang['TAre'].'</i>
										</div>
										<div class="img"></div>
									</div>';
				} ?>


			</div>
		</div>
		<div class="boox respects">
			<div class="title">
				<?= $lang['TAati']; ?>
			</div>
			<div class="content">
				<?php
				$getMessagedd = $dbh->prepare("SELECT users_settings.online_time, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.online_time DESC limit 1");
				$getMessagedd->execute();
				$getMessageDatadd = $getMessagedd->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?= floor($getMessageDatadd['online_time'] / 3600); ?> <?= $lang['TAho'];?>">
					<div class="number">
						1°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageDatadd['look']; ?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageDatadd['username']; ?>">
						<?php echo $getMessageDatadd['username']; ?> </a>
				</div>
				<?php
				$getMessage22dd = $dbh->prepare("SELECT users_settings.online_time, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.online_time DESC limit 1, 2 ");
				$getMessage22dd->execute();
				$getMessageData22dd = $getMessage22dd->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo floor($getMessageData22dd['online_time'] / 3600); ?> <?= $lang['TAho'];?>">
					<div class="number">
						2°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData22dd['look']; ?>&head_direction=2&direction=2&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData22dd['username']; ?>">
						<?php echo $getMessageData22dd['username']; ?> </a>
				</div>
				<?php
				$getMessage223dd = $dbh->prepare("SELECT users_settings.online_time, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.online_time DESC limit 2, 1 ");
				$getMessage223dd->execute();
				$getMessageData223dd = $getMessage223dd->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo floor($getMessageData223dd['online_time'] / 3600); ?> <?= $lang['TAho'];?>">
					<div class="number">
						3°
					</div>
					<div class="avatar">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData223dd['look']; ?>&direction=4&head_direction=4&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData223dd['username']; ?>">
						<?php echo $getMessageData223dd['username']; ?> </a>
				</div>
				<?php
				$getMessage44444dd = $dbh->prepare("SELECT users_settings.online_time, users.username, users.look FROM users, users_settings WHERE users.id = users_settings.user_id ORDER BY users_settings.online_time DESC limit 3, 10 ");
				$getMessage44444dd->execute();
				while ($getMessageData4444dd = $getMessage44444dd->fetch()) {
					echo '

												<div class="bloc">
												<div class="avatar">
												<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444dd['look'] . '" />
												</div>
												<div class="info">
												<a href="../home/' . $getMessageData4444dd['username'] . '">' . $getMessageData4444dd['username'] . '</a>
												<i>' . floor($getMessageData4444dd['online_time'] / 3600) . ' '.$lang['TAho'].'</i>
												</div>
												<div class="img"></div>
											</div>';
				} ?>

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
</body>

</html>