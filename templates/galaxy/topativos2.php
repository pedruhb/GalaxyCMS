<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - TOP Ativos 2</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/palmares.css?LVL254" media="screen" />
</head>
<body>
	<?php include 'assets/menu.php';?>
	<div class="page palmares">

		<div class="boox WinWin">
			<div class="title">
				TOP 10 eventos (mensal)
			</div>
			<div class="content">
				<?php
				$getMessage = $dbh->prepare("SELECT * from users where rank = '1' order by Premiar desc limit 1");
				$getMessage->execute();
				$getMessageData = $getMessage->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['Premiar'];?> eventos ganhos">
					<div class="number">
						1°
					</div>
					<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData['look'];?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData['username'];?>"><?php echo $getMessageData['username'];?></a>
				</div>

				<?php
				$getMessage22 = $dbh->prepare("SELECT * from users where rank = '1' order by Premiar  desc limit 1, 2 ");
				$getMessage22->execute();
				$getMessageData22 = $getMessage22->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['Premiar'];?> eventos ganhos">
					<div class="number">
						2°
					</div>
					<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData22['look'];?>&head_direction=2&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData22['username'];?>">
						<?php echo $getMessageData22['username'];?></a>
					</div>

					<?php
					$getMessage223 = $dbh->prepare("SELECT * from users where rank = '1' order by Premiar  desc limit 2, 1 ");
					$getMessage223->execute();
					$getMessageData223 = $getMessage223->fetch();
					?>
					<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['Premiar'];?> eventos ganhos">
						<div class="number">
							3°
						</div>
						<div class="avatar">
							<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData223['look'];?>&direction=4&head_direction=4&gesture=sml" />
						</div>
						<a href="../home/<?php echo $getMessageData223['username'];?>">
							<?php echo $getMessageData223['username'];?></a>
						</div>

						<?php
						$getMessage44444 = $dbh->prepare("SELECT * from users where rank = '1' order by Premiar  desc limit 3, 7 ");
						$getMessage44444->execute();
						while ($getMessageData4444 = $getMessage44444->fetch())
							{echo'
						<div class="bloc">
						<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444['look'].'" />
						</div>
						<div class="info">
						<a href="../home/'.$getMessageData4444['username'].'">'.$getMessageData4444['username'].'</a>
						<i>'.$getMessageData4444['Premiar'].' eventos ganhos</i>
						</div>
						<div class="img"></div>
						</div>
						';}?>
					</div>
				</div>
				<div class="boox respects">
					<div class="title">
						Top 10 promoções 
					</div>
					<div class="content">
						<?php
						$getMessage = $dbh->prepare("SELECT * from users where rank = '1' order by promo_points desc limit 1");
						$getMessage->execute();
						$getMessageData = $getMessage->fetch();
						?>
						<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['promo_points'];?> promoções ganhas">
							<div class="number">
								1°
							</div>
							<div class="avatar">
								<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData['look'];?>&size=l&direction=3&gesture=sml" />
							</div>
							<a href="../home/<?php echo $getMessageData['username'];?>"><?php echo $getMessageData['username'];?></a>
						</div>

						<?php
						$getMessage22 = $dbh->prepare("SELECT * from users where rank = '1' order by promo_points  desc limit 1, 2 ");
						$getMessage22->execute();
						$getMessageData22 = $getMessage22->fetch();
						?>
						<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['promo_points'];?> promoções ganhas">
							<div class="number">
								2°
							</div>
							<div class="avatar">
								<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData22['look'];?>&head_direction=2&gesture=sml" />
							</div>
							<a href="../home/<?php echo $getMessageData22['username'];?>">
								<?php echo $getMessageData22['username'];?></a>
							</div>

							<?php
							$getMessage223 = $dbh->prepare("SELECT * from users where rank = '1' order by promo_points  desc limit 2, 1 ");
							$getMessage223->execute();
							$getMessageData223 = $getMessage223->fetch();
							?>
							<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['promo_points'];?> promoções ganhas">
								<div class="number">
									3°
								</div>
								<div class="avatar">
									<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData223['look'];?>&direction=4&head_direction=4&gesture=sml" />
								</div>
								<a href="../home/<?php echo $getMessageData223['username'];?>">
									<?php echo $getMessageData223['username'];?></a>
								</div>

								<?php
								$getMessage44444 = $dbh->prepare("SELECT * from users where rank = '1' order by promo_points  desc limit 3, 7 ");
								$getMessage44444->execute();
								while ($getMessageData4444 = $getMessage44444->fetch())
									{echo'
								<div class="bloc">
								<div class="avatar">
								<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444['look'].'" />
								</div>
								<div class="info">
								<a href="../home/'.$getMessageData4444['username'].'">'.$getMessageData4444['username'].'</a>
								<i>'.$getMessageData4444['promo_points'].' promoções ganhas</i>
								</div>
								<div class="img"></div>
								</div>
								';}?>
							</div>
						</div>
						<div class="boox connexionTime">
							<div class="title">
								TOP 10 conquistas
							</div>
							<div class="content">
								<?php
								$getMessagedd = $dbh->prepare("SELECT AchievementScore,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `AchievementScore` DESC  LIMIT 1");
								$getMessagedd->execute();
								$getMessageDatadd = $getMessagedd->fetch();
								?>
								<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatadd['AchievementScore'];?> pontos de conquistas">
									<div class="number">
										1°
									</div>
									<div class="avatar">
										<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageDatadd['look'];?>&size=l&direction=3&gesture=sml" />
									</div>
									<a href="../home/<?php echo $getMessageDatadd['username'];?>">
										<?php echo $getMessageDatadd['username'];?> </a>
									</div>
									<?php
									$getMessage22dd = $dbh->prepare("SELECT AchievementScore,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `AchievementScore` DESC  LIMIT 1, 2 ");
									$getMessage22dd->execute();
									$getMessageData22dd = $getMessage22dd->fetch();

									?>
									<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22dd['AchievementScore'];?> pontos de conquistas">
										<div class="number">
											2°
										</div>
										<div class="avatar">
											<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData22dd['look'];?>&head_direction=2&gesture=sml" />
										</div>
										<a href="../home/<?php echo $getMessageData22dd['username'];?>">
											<?php echo $getMessageData22dd['username'];?> </a>
										</div>
										<?php
										$getMessage223dd = $dbh->prepare("SELECT AchievementScore,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `AchievementScore` DESC  LIMIT 2, 1 ");
										$getMessage223dd->execute();
										$getMessageData223dd = $getMessage223dd->fetch();

										?>
										<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223dd['AchievementScore'];?> pontos de conquistas">
											<div class="number">
												3°
											</div>
											<div class="avatar">
												<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData223dd['look'];?>&direction=4&head_direction=4&gesture=sml" />
											</div>
											<a href="../home/<?php echo $getMessageData223dd['username'];?>">
												<?php echo $getMessageData223dd['username'];?> </a>
											</div>
											<?php
											$getMessage44444dd = $dbh->prepare("SELECT AchievementScore,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `AchievementScore` DESC  LIMIT 3, 7 ");
											$getMessage44444dd->execute();
											while ($getMessageData4444dd = $getMessage44444dd->fetch())
											{
												
												echo'

												<div class="bloc">
												<div class="avatar">
												<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444dd['look'].'" />
												</div>
												<div class="info">
												<a href="../home/'.$getMessageData4444dd['username'].'">'.$getMessageData4444dd['username'].'</a>
												<i>'.$getMessageData4444dd['AchievementScore'].' pontos de conquistas.</i>
												</div>
												<div class="img"></div>
											</div>';}?>

										</div>
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