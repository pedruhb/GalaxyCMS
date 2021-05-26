<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<?php
	$pegaNoticia = $dbh->prepare("SELECT * FROM cms_news WHERE id = :newsid");
	$pegaNoticia->bindValue(':newsid', $_GET['id']);
	$pegaNoticia->execute();
	$noticia = $pegaNoticia->fetch();
	if (!isset($_GET['id']) || empty($_GET['id']) || $noticia['id'] == null) {
		$pegaUltimaNoticia = $dbh->prepare("SELECT id FROM cms_news ORDER BY id DESC LIMIT 1");
		$pegaUltimaNoticia->execute();
		if ($pegaUltimaNoticia->rowCount() == 0) {
			header('Location: ' . $config['hotelUrl'] . '/me');
			return;
		} else {
			$ultimaNoticia = $pegaUltimaNoticia->fetch();
			header('Location: ' . $config['hotelUrl'] . '/news/' . $ultimaNoticia['id']);
			return;
		}
	}
	?>
	<title><?php echo $config['hotelName'] ?> - <?php echo $noticia['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/news.css?LVL254" media="screen" />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page news">
		<div class="right">
			<div class="box">
				<div class="title green">
					<div class="img"><img src="/templates/galaxy/assets/img/box_title_forum.png" /></div>
					<p><?= $lang['NUN']; ?></p>
				</div>
				<div class="content">
					<?php
					for ($i = 0; $i < 6; $i++) {
						$sectionName = "";
						$sectionCutoffMax = 0;
						$sectionCutoffMin = 0;
						switch ($i) {
							case 0:
								$sectionName = $lang['NHJ'];
								$sectionCutoffMax = time();
								$sectionCutoffMin = time() - 86400;
								break;
							case 1:
								$sectionName = $lang['NON'];
								$sectionCutoffMax = time() - 86400;
								$sectionCutoffMin = time() - 172800;
								break;
							case 2:
								$sectionName = $lang['NES'];
								$sectionCutoffMax = time() - 172800;
								$sectionCutoffMin = time() - 604800;
								break;
							case 3:
								$sectionName = $lang['NSP'];
								$sectionCutoffMax = time() - 604800;
								$sectionCutoffMin = time() - 1209600;
								break;
							case 4:
								$sectionName = $lang['NEM'];
								$sectionCutoffMax = time() - 1209600;
								$sectionCutoffMin = time() - 2592000;
								break;
							case 5:
								$sectionName = $lang['NMP'];
								$sectionCutoffMax = time() - 2592000;
								$sectionCutoffMin = time() - 5184000;
								break;
						}
						$getArticles = $dbh->prepare("SELECT id,date,title FROM cms_news WHERE date >= :sectionCutoffMin AND date <= :sectionCutoffMax ORDER BY date DESC");
						$getArticles->bindParam(':sectionCutoffMin', $sectionCutoffMin);
						$getArticles->bindParam(':sectionCutoffMax', $sectionCutoffMax);
						$getArticles->execute();
						if ($getArticles->RowCount() > 0) {
							echo '<p>' . $sectionName . '</p>';
							while ($a = $getArticles->fetch()) {
								echo '<a class="normal" href="/news/' . filter($a['id']) . '">' . $a['title'] . '</a>';
							}
						}
					}
					?>
				</div>
			</div>
		</div>
		<?= newsLike() ?>
		<?php
		$tlike = $lang['NUC'];
		$datapost = difer_data(date('Y-m-d G:i:s', $noticia['date']));

		$newsLikeUser22 = $dbh->prepare("SELECT count(id) as total FROM cms_news_like WHERE userid = :id AND newsid = :newsid");
		$newsLikeUser22->bindParam(':id', $_SESSION['id']);
		$newsLikeUser22->bindParam(':newsid', $_GET['id']);
		$newsLikeUser22->execute();
		$newsLike22 = $newsLikeUser22->fetch();

		$contarlikesnoticia = $dbh->prepare("SELECT count(id) as total FROM cms_news_like WHERE newsid = :newsid");
		$contarlikesnoticia->bindParam(':newsid', $_GET['id']);
		$contarlikesnoticia->execute();
		$contarlikesnoticia = $contarlikesnoticia->fetch();
		$likesno = $contarlikesnoticia['total'];

		$nickautor = $dbh->prepare("SELECT username from users where id = :id");
		$nickautor->bindParam(':id', $noticia["author"]);
		$nickautor->execute();
		$nickautor = $nickautor->fetch();
		$nickauto = $nickautor['username'];
		newsLike();
		if ($newsLike22['total'] == 0) {
			$botaolike = '<form method="post">
			<a class="newlike" id="6383" totalikes="4">
			<input style="background: #eee;
			margin-right: 10px;
			float: left;
			padding: 9px 13px;
			border-radius: 3px;
			font-size: 12px;
			line-height: 20px;" tooltip-direction="top" tooltip-content="'.$lang['Ncpc'].'" tooltip="true" type="submit" value="' . $likesno . ' ' . $tlike . ' ' . $lang['NEN'] . '" name="likenews"></a>
			</form>';
		} else {
			$outros = $likesno - 1;
			$botaolike = '<a class="newlike ilike" id="6383" totalikes="10"><img src="/templates/galaxy/assets/img/like.gif">' . $lang['NVO'] . ' ' . $outros . ' ' . $tlike . ' ' . $lang['NEN'] . '</a>';
		}
		echo '
		<div class="left">
		<div class="box">
		<div class="title blue">
		<div class="img"><img src="/templates/galaxy/assets/img/menu_articles.png" /></div>
		<p>' . $noticia["title"] . '</p>
		</div>
		<style>
		u * {border-bottom: 1px solid!important}
		</style>
		<div class="content">
		' . html_entity_decode($noticia['longstory']) . '
		<div class="bottom">
		' . $botaolike . '
		<p>' . $lang['NPA'] . ' ' . $datapost . ' '.$lang['Npor'].' ' . $nickauto . '</p>
		<div class="share"></div>
		</div>
		</div>
		</div>
		';

		?>
		<div class="box">
			<div class="title red">
				<div class="img"><img src="/templates/galaxy/assets/img/box_title_lastcomments.png" /></div>
				<p><?= $lang['NC'];?></p>
			</div>
			<div class="content comments">
				<?= newsComment() ?>
				<form action="" method="POST">
					<input type="hidden" name="type" value="comment" />
					<p>
						<img id="comentarios" src="<?= $config['avatarImageUrl'] ;?>?figure=<?= User::userData('look') ?>&amp;size=s&amp;headonly=1" />
						<?= $lang['NCc'];?> <?= User::userData('username') ?>!
						<input type="submit" value="<?= $lang['NE'];?>" name="newscomment">
					</p>
					<input type="hidden" name="articleid" class="articleid" value="6383" />
					<textarea name="message" class="articlecomment" placeholder="<?= $lang['Nsm'];?>"></textarea>
				</form>
				<?php

				if (isset($_POST['likecomment'])) {
					$newsLikeUser22 = $dbh->prepare("SELECT id FROM cms_news_comments_likes WHERE userid = :id AND commentid = :commentid");
					$newsLikeUser22->bindValue(':id', User::userData('id'));
					$newsLikeUser22->bindValue(':commentid', $_POST['idcomment']);
					$newsLikeUser22->execute();
					if ($newsLikeUser22->rowCount() == 0) {
						$apagaref1 = $dbh->prepare("INSERT INTO `cms_news_comments_likes` (`userid`, `commentid`) VALUES (:uidd, :cid);");
						$apagaref1->bindValue(":uidd", User::userData('id'));
						$apagaref1->bindValue(":cid", $_POST['idcomment']);
						$apagaref1->execute();
					} else {
						echo '<script>alert("'.$lang['Nvsjcm'].'")</script>';
					}
				}

				$getMessage = $dbh->prepare("SELECT id,userid,newsid,date,message,hash FROM cms_news_message WHERE newsid = :id order by id desc");
				$getMessage->bindParam(':id', $_GET['id']);
				$getMessage->execute();
				if ($getMessage->RowCount() > 0) {
					while ($getMessageData = $getMessage->fetch()) {
						$datacomment = $lang['Ncmha']." ".difer_data(date('Y-m-d G:i:s', $getMessageData['date']));
						$getMessageUser = $dbh->prepare("SELECT id,username,look,rank,online FROM users WHERE id = :id");
						$getMessageUser->bindValue(':id', $getMessageData['userid']);
						$getMessageUser->execute();
						$user = $getMessageUser->fetch();
						//// like comment
						$newsLikeUser22 = $dbh->prepare("SELECT id FROM cms_news_comments_likes WHERE userid = :id AND commentid = :commentid");
						$newsLikeUser22->bindValue(':id', $_SESSION['id']);
						$newsLikeUser22->bindValue(':commentid', $getMessageData['id']);
						$newsLikeUser22->execute();
						$newsLike22 = $newsLikeUser22->rowCount();
						////
						$contarlikesnoticia = $dbh->prepare("SELECT id FROM cms_news_comments_likes WHERE commentid = :commentid");
						$contarlikesnoticia->bindValue(':commentid', $getMessageData['id']);
						$contarlikesnoticia->execute();
						$likesno = $contarlikesnoticia->rowCount();
						////
						$nickautor = $dbh->prepare("SELECT username from users where id = :id");
						$nickautor->bindValue(':id', $noticia["author"]);
						$nickautor->execute();
						$nickautor = $nickautor->fetch();
						$nickauto = $nickautor['username'];
						////
						if ($newsLike22['total'] == 0) {
							$botaolike22 = $likesno . ' '.$lang['Nctds'] .'<form method="post" name="likecomment" class="none" style="position: initial;">
							<input type="hidden" name="idcomment" value="' . $getMessageData['id'] . '"><input value="'.$lang['Ncm'].'" type="submit" name="likecomment" style=" width:170%;margin-top: -15px;"> </form>';
						} else {
							$outros = $likesno - 1;
							if ($outros == 0) {
								$botaolike22 = $lang['Nav'];
							} else {
								if ($likesno == 2) {
									$tlike = $lang['NUC'];
									$kk22 = $lang['No'];
								} else {
									$tlike = $lang['Nusc'];
									$kk22 = $lang['Nos'];
								}
								$botaolike22 = $lang['Nvce'].' ' . $kk22 . ' ' . $outros . ' ' . $tlike . '';
							}
						}
						/////
						echo '
						<div class="MSG intern" id="19184">
						<div class="message">
						<div class="avatar">
						<img src="'.$config['avatarImageUrl'] .'?figure=' . filter($user["look"]) . '&amp;headonly=1" />
						</div>
						<div class="info ">
						<p class="top">' . strip_tags($getMessageData['message']) . '</p>
						<hr>
						<p> <a href="../home/' . filter($user["username"]) . '">' . filter($user["username"]) . '</a> - ' . $datacomment . ' - ' . $botaolike22 . '</p>
						</div>
						</div>
						</div>';
					}
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
	<script src="/templates/galaxy/assets/js/jquery.news.js?LVL254" charset="utf-8"></script>
</body>

</html>