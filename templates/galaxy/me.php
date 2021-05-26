<!DOCTYPE html>
<html>

<head>
	<?php include 'assets/meta.php'; ?>
	<title><?php echo $config['hotelName'] ?> - <?= User::userData('username') ?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/profil.css?LVL254" media="screen" />
</head>

<body>
	<?php include 'assets/menu.php'; ?>
	<div class="page profil">
		<div class="left">
			<div class="user">
				<div class="bottom">
					<img src="<?= $config['avatarImageUrl']; ?>?figure=<?= User::userData('look') ?>&amp;gesture=sml&amp;head_direction=2&direction=2&amp;size=l" />
					<div class="uinfo">
						<span><?= User::userData('username') ?></span>
						<i class="habbfont"><?= User::userData('motto'); ?></i>
					</div>
					<a href="hotel" onclick="OpenClient();return false;" target="_blank"><?= $lang['Mentrar']; ?></a>
				</div>
			</div>
			<div class="money">
				<span><?= User::userData('credits') ?> <?= $lang['Mcreditos']; ?></span>
				<span class="cc"><?= User::userData('gotw_points') ?> <?= $lang['Mestrelas']; ?></span>
				<span class="diams"><?= User::userData('vip_points') ?> <?= $lang['Mdiamantes']; ?></span>
			</div>
			<br>
			<?php
			$sql3 = $dbh->prepare("SELECT count(id) as noticiastotal FROM cms_news");
			$sql3->execute();
			$news13 = $sql3->fetch();
			$totalnotificas = $news13['noticiastotal'];
			if ($news13['noticiastotal'] >= 1) {
			?>
				<div class="news">
					<?php
					$valor = 0;
					$sql = $dbh->prepare("SELECT * FROM cms_news ORDER BY ID DESC LIMIT 10");
					$sql->execute();
					while ($news1 = $sql->fetch()) {
						echo '<div class="article" id="' . $valor . '" style="background:url(' . ($news1["image"]) . ') no-repeat left bottom;';
						if ($valor != 0) echo "display: none;";
						echo '">';
						echo '<div class="informations">
							  <h1>' . $news1["title"] . '</h1>
								<p>' . $news1["shortstory"] . '</p>
								</div>
								<div class="bottom">
								<a href="news/' . filter($news1["id"]) . '">' . $lang['Mvermais'] . '</a>
								</div>
								</div>';
						$valor++;
					}
					?>
					<div class="bulles">

						<div class="bubule slc" toid="0"></div>
						<?php
						if ($totalnotificas >= 2) {
							echo '<div class="bubule " toid="1"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 3) {
							echo '<div class="bubule " toid="2"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 4) {
							echo '<div class="bubule " toid="3"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 5) {
							echo '<div class="bubule " toid="4"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 6) {
							echo '<div class="bubule " toid="5"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 7) {
							echo '<div class="bubule " toid="6"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 8) {
							echo '<div class="bubule " toid="7"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 9) {
							echo '<div class="bubule " toid="8"></div>';
						} ?>
						<?php
						if ($news13['noticiastotal'] >= 10) {
							echo '<div class="bubule " toid="9"></div>';
						} ?>
					</div>
				</div>
			<?php } ?>
			<div class="box" style="margin-bottom:10px;">
				<div class="title blue">
					<div class="img">
						<font size="4"><i style="color:#ffff;margin-top: 15px;" class="fa fa-refresh" aria-hidden="true"></i></font>
					</div>
					<p><?= $lang['Multimasnovidades']; ?></p>
				</div>
				<div style="padding: 0px;" class="content efrettghj">
					<a class="twitter-timeline" href="<?= $config['twitter'];?>" data-tweet-limit="2">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
			</div>
		</div>
		<div class="right">

			<?php if (User::userData('rank') > 2) { ?>
				<div class="box">
					<div class="title blue">
						<div class="img">
							<font size="6"><i class="fa fa-line-chart" style="color:#ffff;margin-top: 10px;" aria-hidden="true"></i></font>
						</div>
						<p><?= $lang['Mestatisticas']; ?></p>
					</div>
					<div class="content forum">
						<?php
						/// Obtém o máximo de onlines de hoje.
						$obtemOnlinesHoje = $dbh->prepare("SELECT onlines FROM graficos_phbplugin WHERE TIMESTAMP >= :menor AND TIMESTAMP <= :maior ORDER BY onlines DESC LIMIT 1");
						$obtemOnlinesHoje->bindValue(":maior", strtotime(date('Y-m-d 23:59:00')));
						$obtemOnlinesHoje->bindValue(":menor", strtotime(date('Y-m-d 00:00:00')));
						$obtemOnlinesHoje->execute();
						if ($fetch = $obtemOnlinesHoje->fetch())
							$maxOnlinesHoje = $fetch['onlines'];
						else
							$maxOnlinesHoje = 0;

						$obtemOnlinesOntem = $dbh->prepare("SELECT onlines FROM graficos_phbplugin WHERE TIMESTAMP >= :menor AND TIMESTAMP <= :maior ORDER BY onlines DESC LIMIT 1");
						$obtemOnlinesOntem->bindValue(":maior", (strtotime(date('Y-m-d 23:59:00')) - 86400));
						$obtemOnlinesOntem->bindValue(":menor", (strtotime(date('Y-m-d 00:00:00')) - 86400));
						$obtemOnlinesOntem->execute();

						if ($fetch = $obtemOnlinesOntem->fetch())
							$maxOnlinesOntem = $fetch['onlines'];
						else
							$maxOnlinesOntem = 0;

						?>
						<div class="thread">
							<a href="" target="_blank"><?= $lang['MpicoOnHj']; ?> <?= $maxOnlinesHoje; ?>.</a>
						</div>
						<div class="thread">
							<a href="" target="_blank"><?= $lang['MpicoOnOn']; ?> <?= $maxOnlinesOntem; ?>.</a>
						</div>
						<p class="by">
							<a style="color: #fff">a</a>
						</p>
					</div>
				</div>
			<?php } ?>
			<div class="box">
				<div class="title blue">
					<div class="img">
						<img src="/templates/galaxy/assets/img/facebook.png">
					</div>
					<p><?= $lang['Mfacebook']; ?></p>
				</div>
				<div class="content forum">
					<div class="thread" style="height: 130px;">
						<center><iframe height="207px" src="https://www.facebook.com/plugins/page.php?href=<?php echo $config['facebook'] ?>&tabs&width=360&height=340&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="360" height="207" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="title blue">
					<div class="img">
						<img src="/templates/galaxy/assets/img/box_title_lastcomments.png">
					</div>
					<p><?= $lang['Mref'];?></p>
				</div>
				<?php
				$refCount = $dbh->prepare("SELECT refid FROM referrer WHERE refid = :refid");
				$refCount->bindValue(':refid', $_SESSION['id']);
				$refCount->execute();
				if ($refCount->RowCount() > 1) {
					$pontos = $lang['Mrefpontos'];
				} else {
					$pontos = $lang['Mrefponto'];
				}
				?>
				<div class="content forum">
					<div class="thread">
						<a><?php echo $config['hotelUrl'] ?>/register/<?= User::userData('username') ?></a>
						<a><?= str_replace("%a%", $refCount->RowCount().' '.$pontos, $lang['Mrefvc']);?></a>
						<p class="by"><?= $lang['Mrefinfo'];?></p>
						<div class="mek">
							<img src="<?= $config['avatarImageUrl'];?>?figure=<?= User::userData('look') ?>&amp;direction=3&amp;head_direction=4&amp;gesture=sml">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<iframe src="https://discord.com/widget?id=625788438460760095&theme=dark" width="370" height="580" allowtransparency="true" frameborder="0" data-bjppopads-handled="1" style="padding-left: 11px;"></iframe>
	</div>
	<?php include 'assets/fundo.php'; ?>
	<script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.cookyjs.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.BBCJS.js?4" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.share.min.js?v3" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.cookiebar.js?2" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/jquery.global.js?78" charset="utf-8"></script>
	<script src="/templates/galaxy/assets/js/register.pushn.js" charset="utf-8"></script>
	<script data-cfasync="false" src="/templates/galaxy/assets/js/jquery.profil.js?LVL254" charset="utf-8"></script>
</body>

</html>