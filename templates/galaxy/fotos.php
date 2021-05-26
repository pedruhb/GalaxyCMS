<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - <?= $lang['Ftitulo'];?></title>
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/photos.css?LVL254" media="screen" />
	<link rel="stylesheet" type="text/css" href="templates/galaxy/assets/css/lightbox.css?" media="screen" />
</head>
<body ondragstart='return false'>
	<?php include 'assets/menu.php';?>
	<div class="page photos">
		<div class="title">
			<?= $lang['Fufr'];?>
		</div>
		<div class="photos">
<?php

$getArticles = $dbh->prepare("SELECT items.extra_data, users.username, users.look FROM items, users WHERE users.id = items.user_id AND items.item_id = 1100001495 ORDER BY items.id DESC LIMIT 21");
$getArticles->execute();

while($news = $getArticles->fetch())
{
	$json = json_decode($news['extra_data']);

	if($json->t == null)
	continue;

	echo'
	<div class="photo">
	<div class="image">
	<a href="'.$json->w.'" data-lightbox="image-'.$news['picture_id'].'" data-title="Fotografia de '.$news['username'].' - '.difer_data(date('Y-m-d G:i:s', $json->t)).'" style="position: inherit;padding: 0 0px;"><img src="'.$json->w.'" /></a>
	</div>
	<div class="desc">
	<div class="avatar">
	<img src="'.$config['avatarImageUrl'].'?figure='.$news['look'].'">
	</div>
	<div class="right">
	<span>
	'.$lang['Fde'].' <a href="../home/'.$news['username'].'">'.$news['username'].'</a>
	</span>
	<i>'.$lang['Frha'].' '.difer_data(date('Y-m-d G:i:s',  $json->t)).'</i>
	</div>
	</div>	
	</div>
	';
}
?>



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
<script data-cfasync="false" src="templates/SPACE/assets/js/lightbox.js?" charset="utf-8"></script>
</body>
</html>