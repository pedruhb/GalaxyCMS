<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - TOP Ricos</title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/palmares.css?LVL254" media="screen" />
</head>
<body>
	<?php include 'assets/menu.php';?>
	<div class="page palmares">

		<div class="boox CityCash">
			<div class="title">
				TOP 13 Referências
			</div>
			<div class="content">
				<?php
				$getMessage = $dbh->prepare("SELECT refid,count(id) as referencias from referrer group by refid order by referencias desc limit 1");
				$getMessage->execute();
				$getMessageData = $getMessage->fetch();
				$getMessage4444467 = $dbh->prepare("SELECT look,username from users where id =".$getMessageData['refid']);
				$getMessage4444467->execute();
				$getMessageData444467 = $getMessage4444467->fetch();

				?>
				<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData['referencias'];?> referências">
					<div class="number">
						1°
					</div>
					<div class="avatar">

						<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData444467['look'];?>&size=l&direction=3&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData444467['username'];?>"><?php echo $getMessageData444467['username'];?></a>
				</div>

				<?php
				$getMessage22 = $dbh->prepare("SELECT refid,count(id) as referencias from referrer group by refid order by referencias desc limit 1, 2 ");
				$getMessage22->execute();
				$getMessageData22 = $getMessage22->fetch();
				$getMessage44444678 = $dbh->prepare("SELECT look,username from users where id =".$getMessageData22['refid']);
				$getMessage44444678->execute();
				$getMessageData4444678 = $getMessage44444678->fetch();
				?>
				<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22['referencias'];?> referências">
					<div class="number">
						2°
					</div>
					<div class="avatar">
						<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData4444678['look'];?>&head_direction=2&gesture=sml" />
					</div>
					<a href="../home/<?php echo $getMessageData4444678['username'];?>">
						<?php echo $getMessageData4444678['username'];?></a>
					</div>

					<?php
					$getMessage223 = $dbh->prepare("SELECT refid,count(id) as referencias from referrer group by refid order by referencias desc limit 2, 1 ");
					$getMessage223->execute();
					$getMessageData223 = $getMessage223->fetch();
					$getMessage444446785 = $dbh->prepare("SELECT look,username from users where id =".$getMessageData223['refid']);
					$getMessage444446785 ->execute();
					$getMessageData44446785 = $getMessage444446785->fetch();
					?>
					<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223['referencias'];?> referências">
						<div class="number">
							3°
						</div>
						<div class="avatar">
							<img src="https://habbo.city/habbo-imaging/avatarimage?figure=<?php echo $getMessageData44446785['look'];?>&direction=4&head_direction=4&gesture=sml" />
						</div>
						<a href="../home/<?php echo $getMessageData44446785['username'];?>">
							<?php echo $getMessageData44446785['username'];?></a>
						</div>
						<?php
						$getMessage44444 = $dbh->prepare("SELECT refid,count(id) as referencias from referrer group by refid order by referencias desc limit 3, 10");
						$getMessage44444->execute();
						while ($getMessageData4444 = $getMessage44444->fetch())
						{
							if($getMessageData4444['referencias'] == 1)
								$rrrrr = '<i>'.$getMessageData4444['referencias'].' referência</i>';
							else 
								$rrrrr = '<i>'.$getMessageData4444['referencias'].' referências</i>';

							$getMessage444446 = $dbh->prepare("SELECT look,username from users where id =".$getMessageData4444['refid']);
							$getMessage444446->execute();
							$getMessageData44446 = $getMessage444446->fetch();

							echo'
							<div class="bloc">
							<div class="avatar">
							<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData44446['look'].'" />
							</div>
							<div class="info">
							<a href="../home/'.$getMessageData44446['username'].'">'.$getMessageData44446['username'].'</a>
							'.$rrrrr.'
							</div>
							<div class="img"></div>
							</div>
							';}?>
						</div>
					</div>
					<div class="boox diamants">
						<div class="title">
							TOP 13 Diamantes
						</div>
						<div class="content">
							<?php
							$getMessaged = $dbh->prepare("SELECT * from users where rank = '1' order by vip_points desc limit 1");
							$getMessaged->execute();
							$getMessageDatad = $getMessaged->fetch();
							?>
							<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatad['vip_points'];?> diamantes">
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
								$getMessage22d = $dbh->prepare("SELECT * from users where rank = '1' order by vip_points  desc limit 1, 2 ");
								$getMessage22d->execute();
								$getMessageData22d = $getMessage22d->fetch();
								?>
								<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22d['vip_points'];?> diamantes">
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
									$getMessage223d = $dbh->prepare("SELECT * from users where rank = '1' order by vip_points  desc limit 2, 1 ");
									$getMessage223d->execute();
									$getMessageData223d = $getMessage223d->fetch();
									?>
									<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223d['vip_points'];?> diamantes">
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
										$getMessage44444d = $dbh->prepare("SELECT * from users where rank = '1' order by vip_points  desc limit 3, 10 ");
										$getMessage44444d->execute();
										while ($getMessageData4444d = $getMessage44444d->fetch())
											{echo'

										<div class="bloc">
										<div class="avatar">
										<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444d['look'].'" />
										</div>
										<div class="info">
										<a href="../home/'.$getMessageData4444d['username'].'">'.$getMessageData4444d['username'].'</a>
										<i>'.$getMessageData4444d['vip_points'].' diamantes</i>
										</div>
										<div class="img"></div>
									</div>';}?>


								</div>
							</div>
							<div class="boox CityClub">
								<div class="title">
									TOP 13 Meteoritos
								</div>
								<div class="content">
									<?php
									$getMessagedd = $dbh->prepare("SELECT * from users where rank = '1' order by gotw_points desc limit 1");
									$getMessagedd->execute();
									$getMessageDatadd = $getMessagedd->fetch();
									?>
									<div class="center caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageDatadd['gotw_points'];?> meteoritos">
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
										$getMessage22dd = $dbh->prepare("SELECT * from users where rank = '1' order by gotw_points  desc limit 1, 2 ");
										$getMessage22dd->execute();
										$getMessageData22dd = $getMessage22dd->fetch();
										?>
										<div class="left caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData22dd['gotw_points'];?> meteoritos">
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
											$getMessage223dd = $dbh->prepare("SELECT * from users where rank = '1' order by gotw_points  desc limit 2, 1 ");
											$getMessage223dd->execute();
											$getMessageData223dd = $getMessage223dd->fetch();
											?>
											<div class="right caz" tooltip tooltip-direction="top" tooltip-content="<?php echo $getMessageData223dd['gotw_points'];?> meteoritos">
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
												$getMessage44444dd = $dbh->prepare("SELECT * from users where rank = '1' order by gotw_points  desc limit 3, 10 ");
												$getMessage44444dd->execute();
												while ($getMessageData4444dd = $getMessage44444dd->fetch())
													{echo'

												<div class="bloc">
												<div class="avatar">
												<img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData4444dd['look'].'" />
												</div>
												<div class="info">
												<a href="../home/'.$getMessageData4444dd['username'].'">'.$getMessageData4444dd['username'].'</a>
												<i>'.$getMessageData4444dd['gotw_points'].' meteoritos</i>
												</div>
												<div class="img"></div>
											</div>';}?>

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