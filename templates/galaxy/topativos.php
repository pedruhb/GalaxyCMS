<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - TOP Ativos</title>
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
				TOP 13 eventos (geral)
			</div>
			<div class="content">
				<?php
				$getMessage = $dbh->prepare("SELECT * from users where rank = '1' order by ScoreGame desc limit 1");
				$getMessage->execute();
				$getMessageData = $getMessage->fetch();
				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['ScoreGame'];?> eventos ganhos">
					<div class="number">
						1°
					</div>
					<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData['look'];?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData['username'];?>"><?php echo $getMessageData['username'];?></a>
				</div>

				<?php
				$getMessage22 = $dbh->prepare("SELECT * from users where rank = '1' order by ScoreGame  desc limit 1, 2 ");
				$getMessage22->execute();
				$getMessageData22 = $getMessage22->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['ScoreGame'];?> eventos ganhos">
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
					$getMessage223 = $dbh->prepare("SELECT * from users where rank = '1' order by ScoreGame  desc limit 2, 1 ");
					$getMessage223->execute();
					$getMessageData223 = $getMessage223->fetch();
					?>
					<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['ScoreGame'];?> eventos ganhos">
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
						$getMessage44444 = $dbh->prepare("SELECT * from users where rank = '1' order by ScoreGame  desc limit 3, 10 ");
						$getMessage44444->execute();
						while ($getMessageData4444 = $getMessage44444->fetch())
							{echo'
						<div class="bloc">
						<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444['look'].'" />
						</div>
						<div class="info">
						<a href="../home/'.$getMessageData4444['username'].'">'.$getMessageData4444['username'].'</a>
						<i>'.$getMessageData4444['ScoreGame'].' eventos ganhos</i>
						</div>
						<div class="img"></div>
						</div>
						';}?>
					</div>
				</div>
				<div class="boox respects">
					<div class="title">
						Top 13 respeitos
					</div>
					<div class="content">
						<?php
						$getMessaged = $dbh->prepare("SELECT Respect,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `Respect` DESC  LIMIT 1");
						$getMessaged->execute();
						$getMessageDatad = $getMessaged->fetch();
						?>
						<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatad['Respect'];?> respeitos">
							<div class="number">
								1°
							</div>
							<div class="avatar">
								<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageDatad['look'];?>&size=l&direction=3&gesture=sml" />
							</div>
							<a href="../home/<?php echo $getMessageDatad['username'];?>">
								<?php echo $getMessageDatad['username'];?></a>
							</div>
							<?php
							$getMessage22d = $dbh->prepare("SELECT Respect,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `Respect` DESC  LIMIT 1, 2 ");
							$getMessage22d->execute();
							$getMessageData22d = $getMessage22d->fetch();
							?>
							<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22d['Respect'];?> respeitos">
								<div class="number">
									2°
								</div>
								<div class="avatar">
									<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData22d['look'];?>&head_direction=2&gesture=sml" />
								</div>
								<a href="../home/<?php echo $getMessageData22d['username'];?>">
									<?php echo $getMessageData22d['username'];?></a>
								</div>
								<?php
								$getMessage223d = $dbh->prepare("SELECT Respect,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `Respect` DESC  LIMIT 2, 1 ");
								$getMessage223d->execute();
								$getMessageData223d = $getMessage223d->fetch();
								?>
								<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223d['Respect'];?> respeitos">
									<div class="number">
										3°
									</div>
									<div class="avatar">
										<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData223d['look'];?>&direction=4&head_direction=4&gesture=sml" />
									</div>
									<a href="../home/<?php echo $getMessageData223d['username'];?>">
										<?php echo $getMessageData223d['username'];?></a>
									</div>
									<?php
									$getMessage44444d = $dbh->prepare("SELECT Respect,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `Respect` DESC  LIMIT 3, 10 ");
									$getMessage44444d->execute();
									while ($getMessageData4444d = $getMessage44444d->fetch())
										{echo'

									<div class="bloc">
									<div class="avatar">
									<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444d['look'].'" />
									</div>
									<div class="info">
									<a href="../home/'.$getMessageData4444d['username'].'">'.$getMessageData4444d['username'].'</a>
									<i>'.$getMessageData4444d['Respect'].' respeitos</i>
									</div>
									<div class="img"></div>
								</div>';}?>


							</div>
						</div>
						<div class="boox connexionTime">
							<div class="title">
								TOP 13 ativos
							</div>
							<div class="content">
								<?php
								$getMessagedd = $dbh->prepare("SELECT OnlineTime,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `OnlineTime` DESC  LIMIT 1");
								$getMessagedd->execute();
								$getMessageDatadd = $getMessagedd->fetch();
								$total = $getMessageDatadd['OnlineTime'];
								$horas = floor($total / 3600);
								$minutos = floor(($total - ($horas * 3600)) / 60);
								$segundos = floor($total % 60);
								?>
								<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $horas;?> horas">
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
									$getMessage22dd = $dbh->prepare("SELECT OnlineTime,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `OnlineTime` DESC  LIMIT 1, 2 ");
									$getMessage22dd->execute();
									$getMessageData22dd = $getMessage22dd->fetch();

									$total2 = $getMessageData22dd['OnlineTime'];
									$horas2 = floor($total2 / 3600);
									$minutos2 = floor(($total2 - ($horas2 * 3600)) / 60);
									$segundos2 = floor($total2 % 60);
									?>
									<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $horas2;?> horas">
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
										$getMessage223dd = $dbh->prepare("SELECT OnlineTime,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `OnlineTime` DESC  LIMIT 2, 1 ");
										$getMessage223dd->execute();
										$getMessageData223dd = $getMessage223dd->fetch();

										$total23 = $getMessageData223dd['OnlineTime'];
										$horas23 = floor($total23 / 3600);
										$minutos23 = floor(($total23 - ($horas23 * 3600)) / 60);
										$segundos23 = floor($total23 % 60);

										?>
										<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $horas23;?> horas">
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
											$getMessage44444dd = $dbh->prepare("SELECT OnlineTime,users.username,users.look,users.id from users, user_stats WHERE rank < 2 AND users.id = user_stats.id ORDER BY `OnlineTime` DESC  LIMIT 3, 10 ");
											$getMessage44444dd->execute();
											while ($getMessageData4444dd = $getMessage44444dd->fetch())
											{
												$total234 = $getMessageData4444dd['OnlineTime'];
												$horas234 = floor($total234 / 3600);
												$minutos234 = floor(($total234 - ($horas234 * 3600)) / 60);
												$segundos234 = floor($total234 % 60);
												echo'

												<div class="bloc">
												<div class="avatar">
												<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444dd['look'].'" />
												</div>
												<div class="info">
												<a href="../home/'.$getMessageData4444dd['username'].'">'.$getMessageData4444dd['username'].'</a>
												<i>'.$horas234.' horas.</i>
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