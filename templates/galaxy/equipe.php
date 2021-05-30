<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - <?= 	$lang['Stitulo'];?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/team.css?LVL254" media="screen" />
</head>
<?php include 'assets/menu.php';?>
<div class="page staff">
	<div class="left">
		<div class="team">
<?php
$selectPermissions = $dbh->prepare("SELECT * FROM permissions WHERE id > 2 order by id desc");
$selectPermissions->execute();
while($permission = $selectPermissions->fetch()){
	?>
			<div class="box">
				<div class="title green">
					<p><?= utf8_encode($permission['rank_name']);?></p>
				</div>
				<div class="content">
				<?php
					 $getMessageUser = $dbh->prepare("SELECT * FROM users WHERE rank = :rank");
						$getMessageUser->bindValue(':rank', $permission['id']);
						$getMessageUser->execute();
						while($user = $getMessageUser->fetch()){

						if ($user['online'] == 0)
						{
							$img = 'offline';
						} 
						else { 
							$img = 'online';
						}

						echo'
						<div class="staff orange direction" action="actions/" id="4" id="4" >
						<div class="avatar">
						<img src="'.$config['avatarImageUrl'].'?figure='.$user['look'].'&head_direction=2&direction=2&gesture=sml" style="max-width: 67px;"/>
						</div>
						<div class="right">
						<a href="../home/'.$user['username'].'">'.$user['username'].'</a>
						<p><b>'.$lang['Smissao'].' </b> '.utf8_encode($user['motto']).'</p>
						<img src="/templates/galaxy/assets/img/'.$img.'.gif" /> </div>
						</div>
						';
					}
					?>
				</div>
			</div>
<?php }?>
		</div>
	</div>
	<div class="right">
		<div class="box">
			<div class="title orange">
				<div class="img"><img src="/templates/galaxy/assets/img/box_title_croco.png" /></div>
				<p><?= $lang['Soq'];?></p>
			</div>
			<div class="content">
				<?= $lang['Soqc'];?>
				<br>
				<center><img style="padding-top: 10px" src="https://cdn.galaxyservers.host/swf/c_images/album1584/ADM.gif"></center>
			</div>
		</div>
		<br>

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