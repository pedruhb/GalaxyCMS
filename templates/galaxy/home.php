 <!DOCTYPE html>
 <html>

 <head>
 	<?php include 'assets/meta.php'; ?>

 	<title><?php echo $config['hotelName'] ?> - <?= $lang['Ht']; ?></title>
 	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
 	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/profil.css?LVL254" media="screen" />
 </head>

 <body>

 	<?php include 'assets/menu.php'; ?>
 	<?php
		if (!isset($_GET['user']) && empty($_GET['user']) || userHome('id') == null) {
			header('Location: ' . $config['hotelUrl'] . '/me');
			return;
		}
		?>
 	<div class='page profil'>
 		<div class="left">
 			<div class="banner imgdfChange" style="background:url('/templates/galaxy/assets/img/default.png');">
 				<div class="bottom">
 					<div class="user">
 						<img src="<?= $config['avatarImageUrl']; ?>?figure=<?= userHome('look'); ?>&size=l&gesture=sml" />
 					</div>
 					<div class="userinfo">
 						<p><?= userHome('username'); ?></p>
 						<?php
							$ms = (3 * 60) * 60;
							$gmdata = gmdate("d/m/Y", userHome('account_created') - ($ms));
							$gmhora = gmdate("G:i", userHome('account_created') - ($ms));
							$gmdata2 = gmdate("d/m/Y", userHome('last_online') - ($ms));
							$gmhora2 = gmdate("G:i", userHome('last_online') - ($ms));
							?>
 						<span><?= userHome('username'); ?> <?= $lang['Hsr']; ?> <?php echo $gmdata; ?> <?= $lang['Has']; ?> <?php echo $gmhora; ?>.</span>
 					</div>
 				</div>
 			</div>

 		</div>
 		<div class="right">
 			<div class="box badges">
 				<div class="title blue">
 					<div class="img">
 						<img src="/templates/galaxy/assets/img/settings_title_badges.png" />
 					</div>
 					<p><?= $lang['HUE']; ?></p>
 				</div>
 				<div class="content">
 					<?php
						$stmt = $dbh->prepare("SELECT * FROM users_badges WHERE user_id = :userid AND slot_id > '0' order by slot_id");
						$stmt->bindValue(':userid', userHome('id'));
						$stmt->execute();
						if (!$stmt->RowCount() == 0) {
							while ($badge = $stmt->fetch()) {
								echo '<div class="img clipboard" tooltip="" tooltip-direction="top" tooltip-content="' . filter($badge["badge_code"]) . '">
									<img src="' . $config['badgeURL'] . filter($badge["badge_code"]) . '.gif" alt="' . filter($badge["badge_code"]) . '" />
									</div>';
							}
						} else {
							echo '<div class="error">' . $lang['HNE'] . '</div>';
						}
						?>
 				</div>
 			</div>
 			<div class="box palmares">
 				<div class="title blue">
 					<div class="img">
 						<img src="/templates/galaxy/assets/img/tw.gif" />
 					</div>
 					<p><?= $lang['HS']; ?> <?= userHome('username'); ?></p>
 				</div>
 				<div class="content">
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/menu_articles.png" />
 							</div>
 						</div>
 						<div class="right">
 							<p><?php echo substr_replace(userHome('motto'), (strlen(userHome('motto')) > '30' ? '...' : ''), '30'); ?></p>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/citycash.png" />
 							</div>
 						</div>
 						<div class="right">
 							<p><?= userHome('credits'); ?> <?= $lang['Mcreditos']; ?>.</p>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/meteoritos.png" />
 							</div>
 						</div>
 						<div class="right">
 							<p><?= userHome('gotw_points'); ?> <?= $lang['Mestrelas']; ?>.</p>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/shop_pack_diamonds.png" />
 							</div>
 						</div>
 						<div class="right">
 							<p><?= userHome('vip_points'); ?> <?= $lang['Mdiamantes']; ?>.</p>
 						</div>
 					</div>
 					<?php
						$getArticles = $dbh->prepare("SELECT * FROM users_settings WHERE user_id = :userid");
						$getArticles->bindValue(':userid', userHome('id'));
						$getArticles->execute();
						$result = $getArticles->fetch();
						?>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/winwins.png" />
 							</div>
 						</div>
 						<div class="right">
 							<?php
								$total = $result['online_time'];
								$horas = floor($total / 3600);
								$minutos = floor(($total - ($horas * 3600)) / 60);
								$segundos = floor($total % 60);
								?>

 							<p><?php echo $horas; ?> <?= $lang['HHJ']; ?>.</p>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/shop_pack_respects.png" />
 							</div>
 						</div>
 						<div class="right">
 							<p><?php if (empty($result["respects_received"])) {
									echo '0';
								} else {
									echo $result["respects_received"];
								} ?> <?= $lang['HR']; ?>.</p>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="box palmares">
 				<div class="title blue">
 					<div class="img">
 						<img src="/templates/galaxy/assets/img/trophee.png" />
 					</div>
 					<p><?= $lang['HRD']; ?> <?= userHome('username'); ?></p>
 				</div>
 				<div class="content">
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/coracao.png" />
 							</div>
 						</div>
 						<div class="right">
 							<?php
								$getArticles = $dbh->prepare("SELECT users.username FROM messenger_friendships, users WHERE users.id = messenger_friendships.user_two_id AND messenger_friendships.user_one_id = :uid AND messenger_friendships.relation = '1' ORDER BY RAND()");
								$getArticles->bindValue(':uid', userHome('id'));
								$getArticles->execute();

								if ($getArticles->rowCount() == 0) {
									echo '<p>' . $lang['HNA'] . '</p>';
								} else {
									$user = $getArticles->fetch();
									if ($getArticles->rowCount() == 1) {
										echo '<p><a href="' . $user['username'] . '">' . $user['username'] . '</a></p>';
									} else {
										echo '<p>' . $user['username'] . ' ' . $lang['HEma'] . ' ' . ($getArticles->rowCount() - 1) . '</p>';
									}
								}
								?>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/sorriso.png" />
 							</div>
 						</div>
 						<div class="right">
 							<?php
								$getArticles = $dbh->prepare("SELECT users.username FROM messenger_friendships, users WHERE users.id = messenger_friendships.user_two_id AND messenger_friendships.user_one_id = :uid AND messenger_friendships.relation = '2' ORDER BY RAND()");
								$getArticles->bindValue(':uid', userHome('id'));
								$getArticles->execute();

								if ($getArticles->rowCount() == 0) {
									echo '<p>' . $lang['HNA'] . '</p>';
								} else {
									$user = $getArticles->fetch();
									if ($getArticles->rowCount() == 1) {
										echo '<p><a href="' . $user['username'] . '">' . $user['username'] . '</a></p>';
									} else {
										echo '<p>' . $user['username'] . ' ' . $lang['HEma'] . ' ' . ($getArticles->rowCount() - 1) . '</p>';
									}
								}
								?>
 						</div>
 					</div>
 					<div class="palmares">
 						<div class="left">
 							<div class="img">
 								<img src="/templates/galaxy/assets/img/caveira.png" />
 							</div>
 						</div>
 						<div class="right">
 							<?php
								$getArticles = $dbh->prepare("SELECT users.username FROM messenger_friendships, users WHERE users.id = messenger_friendships.user_two_id AND messenger_friendships.user_one_id = :uid AND messenger_friendships.relation = '3' ORDER BY RAND()");
								$getArticles->bindValue(':uid', userHome('id'));
								$getArticles->execute();

								if ($getArticles->rowCount() == 0) {
									echo '<p>' . $lang['HNA'] . '</p>';
								} else {
									$user = $getArticles->fetch();
									if ($getArticles->rowCount() == 1) {
										echo '<p><a href="' . $user['username'] . '">' . $user['username'] . '</a></p>';
									} else {
										echo '<p>' . $user['username'] . ' ' . $lang['HEma'] . ' ' . ($getArticles->rowCount() - 1) . '</p>';
									}
								}
								?>
 						</div>
 					</div>
 				</div>
 			</div>

 			<div class="box rooms">
 				<div class="title blue">
 					<div class="img">
 						<img src="/templates/galaxy/assets/img/title_box_house.png" />
 					</div>
 					<p>
 						<?= $lang['HUQ']; ?>
 					</p>
 				</div>
 				<div class="content">

 					<?php
						$stmt = $dbh->prepare("SELECT * FROM rooms WHERE owner_name = :nome ORDER BY id DESC LIMIT 3");
						$stmt->bindValue(':nome', userHome('username'));
						$stmt->execute();
						if (!$stmt->RowCount() == 0) {
							while ($rooms = $stmt->fetch()) {

								$m23 = str_replace('Æ’', '<i class="fa fa-heart" aria-hidden="true"></i>', utf8_encode($rooms["name"]));
								$m33 = str_replace('¥', '<i class="fa fa-star" aria-hidden="true"></i>', $m23);
								$m43 = str_replace('ƒ', '<i class="fa fa-heart" aria-hidden="true"></i>', $m33);
								$m53 = str_replace('|', '<i class="fa fa-heart-o" aria-hidden="true"></i>', $m43);
								$m63 = str_replace('—', '<i class="fa fa-music" aria-hidden="true"></i>', $m53);
								$m73 = str_replace('‡', '<i class="fa fa-ban" aria-hidden="true"></i>', $m63);
								$m83 = str_replace('•', '<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>', $m73);
								$m93 = str_replace('÷', '<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>', $m83);

								echo '<div class="room">
											<div class="left">
											<div class="img">
											<img src="/templates/galaxy/assets/img/room.png" />
											</div>
											</div>
											<div class="right">
											<a href="../../room/' . filter($rooms["id"]) . '">' . $m93 . '</a>
											<i>' . filter($rooms["score"]) . ' ' . $lang['Hlikes'] . '</i>
											</div>
											</div><hr>';
							}
						} else {
							echo '<div class="error"><center style="margin-top:70px">' . $lang['HNQ'] . '</center><br></div>';
						}
						?>



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
 	<script data-cfasync="false" src="/templates/galaxy/assets/js/jquery.profil_special.js?LVL254" charset="utf-8"></script>
 </body>

 </html>