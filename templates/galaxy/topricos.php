<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= $lang['TRtitulo']; ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/palmares.css?LVL254" media="screen" />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page palmares">

		<div class="boox CityCash">
			<div class="title">
				<?= $lang['TRref']; ?>
			</div>
			<div class="content">
				<?php
				$getMessage = $dbh->prepare("SELECT referrer.refid,count(referrer.id) as referencias, users.username, users.look from referrer, users WHERE users.id = referrer.refid group by referrer.refid order by referencias desc limit 1");
				$getMessage->execute();
				$getMessageData = $getMessage->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['referencias']; ?> <?= $lang['TRreferencias'];?>">
					<div class="number">
						1°
					</div>
					<div class="avatar">

						<img src="<?= $config['avatarImageUrl'];?>?figure=<?php echo $getMessageData['look']; ?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData['username']; ?>"><?php echo $getMessageData['username']; ?></a>
				</div>

				<?php
				$getMessage22 = $dbh->prepare("SELECT referrer.refid,count(referrer.id) as referencias, users.username, users.look from referrer, users WHERE users.id = referrer.refid group by referrer.refid order by referencias desc limit 1, 2 ");
				$getMessage22->execute();
				$getMessageData22 = $getMessage22->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['referencias']; ?> <?= $lang['TRreferencias'];?>">
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
				$getMessage223 = $dbh->prepare("SELECT referrer.refid,count(referrer.id) as referencias, users.username, users.look from referrer, users WHERE users.id = referrer.refid group by referrer.refid order by referencias desc limit 2, 1 ");
				$getMessage223->execute();
				$getMessageData223 = $getMessage223->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['referencias']; ?> <?= $lang['TRreferencias'];?>">
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
				$getMessage44444 = $dbh->prepare("SELECT referrer.refid,count(referrer.id) as referencias, users.username, users.look from referrer, users WHERE users.id = referrer.refid group by referrer.refid order by referencias desc limit 3, 10");
				$getMessage44444->execute();
				while ($getMessageData4444 = $getMessage44444->fetch()) {
					if ($getMessageData4444['referencias'] == 1)
						$rrrrr = '<i>' . $getMessageData4444['referencias'] . ' '.$lang['TRreferencia'].'</i>';
					else
						$rrrrr = '<i>' . $getMessageData4444['referencias'] . ' '.$lang['TRreferencias'].'</i>';


					echo '
							<div class="bloc">
							<div class="avatar">
							<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444['look'] . '" />
							</div>
							<div class="info">
							<a href="../home/' . $getMessageData4444['username'] . '">' . $getMessageData4444['username'] . '</a>
							' . $rrrrr . '
							</div>
							<div class="img"></div>
							</div>
							';
				} ?>
			</div>
		</div>
		<div class="boox diamants">
			<div class="title">
				<?= $lang['TRdima']; ?>
			</div>
			<div class="content">
				<?php
				$getMessaged = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 5 ORDER BY users_currency.amount DESC limit 1");
				$getMessaged->execute();
				$getMessageDatad = $getMessaged->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatad['amount']; ?> <?= $lang['TRdiamantes'];?>">
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
				$getMessage22d = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 5 ORDER BY users_currency.amount DESC limit 1, 2 ");
				$getMessage22d->execute();
				$getMessageData22d = $getMessage22d->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22d['amount']; ?> <?= $lang['TRdiamantes'];?>">
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
				$getMessage223d = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 5 ORDER BY users_currency.amount DESC limit 2, 1 ");
				$getMessage223d->execute();
				$getMessageData223d = $getMessage223d->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223d['amount']; ?> <?= $lang['TRdiamantes'];?>">
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
				$getMessage44444d = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 5 ORDER BY users_currency.amount DESC limit 3, 10 ");
				$getMessage44444d->execute();
				while ($getMessageData4444d = $getMessage44444d->fetch()) {
					echo '

										<div class="bloc">
										<div class="avatar">
										<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444d['look'] . '" />
										</div>
										<div class="info">
										<a href="../home/' . $getMessageData4444d['username'] . '">' . $getMessageData4444d['username'] . '</a>
										<i>' . $getMessageData4444d['amount'] . ' '.$lang['TRdiamantes'].'</i>
										</div>
										<div class="img"></div>
									</div>';
				} ?>


			</div>
		</div>
		<div class="boox CityClub">
			<div class="title">
				<?= $lang['TRest']; ?>
			</div>
			<div class="content">
				<?php
				$getMessagedd = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 103 ORDER BY users_currency.amount DESC limit 1");
				$getMessagedd->execute();
				$getMessageDatadd = $getMessagedd->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatadd['amount']; ?> <?= $lang['TRestrelas'];?>">
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
				$getMessage22dd = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 103 ORDER BY users_currency.amount DESC limit 1, 2 ");
				$getMessage22dd->execute();
				$getMessageData22dd = $getMessage22dd->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22dd['amount']; ?> <?= $lang['TRestrelas'];?>">
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
				$getMessage223dd = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 103 ORDER BY users_currency.amount DESC limit 2, 1 ");
				$getMessage223dd->execute();
				$getMessageData223dd = $getMessage223dd->fetch();
				?>
				<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223dd['amount']; ?> <?= $lang['TRestrelas'];?>">
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
				$getMessage44444dd = $dbh->prepare("SELECT users.username, users.look, users_currency.amount FROM users, users_currency WHERE users.rank < 3 AND users.id = users_currency.user_id AND users_currency.`type` = 103 ORDER BY users_currency.amount DESC limit 3, 10 ");
				$getMessage44444dd->execute();
				while ($getMessageData4444dd = $getMessage44444dd->fetch()) {
					echo '

												<div class="bloc">
												<div class="avatar">
												<img src="'.$config['avatarImageUrl'].'?figure=' . $getMessageData4444dd['look'] . '" />
												</div>
												<div class="info">
												<a href="../home/' . $getMessageData4444dd['username'] . '">' . $getMessageData4444dd['username'] . '</a>
												<i>' . $getMessageData4444dd['amount'] . ' '.$lang['TRestrelas'].'</i>
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