<?php
header("Content-type: image/png");
define('BRAIN_CMS', 1);	
include_once $_SERVER['DOCUMENT_ROOT'].'/global.php';
$phb = $dbh->prepare('SELECT look FROM users where username = :username');
$phb->bindValue(':username', $_GET['user']);
$phb->execute();
$figure = $phb->fetch()['look'];
if($figure == ''){
	header("Location: ".$config['hotelUrl'].'/templates/galaxy/assets/img/ghost.png');
}
else {
	$home = imagecreatefrompng($config['avatarImageUrl'].'?figure='.$figure.'&action=std&gesture=sml&size=m&direction=4&head_direction=4&headonly=0&img_format=png');
	$imagem = imagecreate(64,110);
	imagecopy($imagem, $home, 0, 0, 0, 0, 110, 110);
	ImagePng($imagem);
	ImageDestroy($imagem);
}