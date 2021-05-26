<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - <?= $lang['Emojis'];?></title>
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/photos.css?LVL254" media="screen" />
</head>
<body ondragstart='return false'>
	<?php include 'assets/menu.php';?>
	<div class="page photos">
		<div class="title">
			<?php echo $config['hotelName']?> <?= $lang['Emojis'];?>!
		</div>
		<div class="photos">
			<?php
			$i = 1;
			while( $i <= 189){
				echo'
				<div class="photo">
				<div class="image">
				<img draggable="false" oncontextmenu="return false" src="https://cdn.galaxyservers.host/swf/c_images/phbplugin_emojis/'.$i.'.png" width="40%" style="margin-left: 50%;">
				</div>
				<div class="desc">
				<div class="right" style="width: 100px;">
				<span style="text-overflow: unset !important;">
				:emoji '.$i.'
				</span>
				</div>
				</div>
				</div>
				';
				$i++;
			}
			?>
			 
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
<script src="/templates/galaxy/assets/js/jquery.cookiebar.js?2" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.global.js?78" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/register.pushn.js" charset="utf-8"></script>
<script data-cfasync="false" src="/templates/galaxy/assets/js/jquery.photos.js?LVL25" charset="utf-8"></script>
</body>
</html>