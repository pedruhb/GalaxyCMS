
<body>
	<div class="header">
		<div class="center">
			<div class="logo">
			</div>
			<div class="right">
				<a href="<?php echo $config['hotelUrl'];?>/hotel" style="width: 90px;float: left;">Flash</a>
				<a href="<?php echo $config['hotelUrl'];?>/hotelv2" style="float: right;width: 90px;margin-top: -50px; background: #6c9c14;">HTML</a>
				<a href="<?php echo $config['hotelUrl'];?>/sair"><?= $lang['Hsair'];?></a>
				<a href="#" style="background:#4080ff;line-height:21px"><?= Game::usersOnline();?> <?= $lang['Hons'];?></a>
			</div>
		</div>
		<div class="navigation">
			<ul class="center">
				<li href="javascript:void(0);">
					<div class="img">
						<img src="<?= $config['avatarImageUrl'];?>?figure=<?= User::userData('look') ?>&amp;head_direction=2&direction=2&amp;gesture=sml&size=b" style="margin-right: 10px;" />
					</div>
					<a href="<?php echo $config['hotelUrl'];?>/me" class="href"><?= User::userData('username') ?></a>
					<ul class="ssmenu">
						<li><a href="<?php echo $config['hotelUrl'];?>/config"><?= $lang['Hconfig'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/home/<?= User::userData('username') ?>"><?= $lang['Hmp'];?></a></li>
						<li class="hr"><a href="<?php echo $config['hotelUrl'];?>/pesquisar"><?= $lang['Hpu'];?></a></li>
					</ul>
				</li>
				<li href="javascript:void(0);">
					<div class="img little">
						<img src="/templates/galaxy/assets/img/menu_articles.png" />
					</div>
					<a class="href" href="<?php echo $config['hotelUrl'];?>/news"><?= $lang['HN'];?></a>
				</li>
				<li href="javascript:void(0);">
					<div class="img little">
						<img src="/templates/galaxy/assets/img/menu_comunity.png" />
					</div>
					<a href="javascript:void(0);" class="href"><?= $lang['HCmnd'];?></a>
					<ul class="ssmenu">
						<li><a href="<?php echo $config['hotelUrl'];?>/referidos"><?= $lang['HRef'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/equipe"><?= $lang['HEqp'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/etiqueta"><?= $lang['HEtiq'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/fotos"><?= $lang['HFoto'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/emojis"><?= $lang['HEm'];?></a></li>
					</ul>
				</li>
				<li href="javascript:void(0);">
					<div class="img little">
						<img src="/templates/galaxy/assets/img/menu_palmares.png" />
					</div>
					<a href="javascript:void(0);" class="href"><?= $lang['HFm'];?></a>
					<ul class="ssmenu">
						<li><a href="<?php echo $config['hotelUrl'];?>/topricos"><?= $lang['HRiq'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/topquartos"><?= $lang['HQua'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/topativos"><?= $lang['HAtv'];?></a></li>
						<li><a href="<?php echo $config['hotelUrl'];?>/topativos2"><?= $lang['HAtv2'];?></a></li>
					</ul>
				</li>
				<li href="javascript:void(0);">
					<div class="img little">
						<img src="/templates/galaxy/assets/img/vip.gif?" />
					</div>
					<a class="href" href="<?php echo $config['hotelUrl'];?>/vips"><?= $lang['HVP'];?></a>
				</li>
				<?php
				if (User::userData('rank') > $config["maintenancekMinimumRankLogin"])
					{
						echo'<li href="javascript:void(0);">
						<div class="img little">
						<img src="/templates/galaxy/assets/img/settings.gif" />
						</div>
						<a class="href" href="'.$config['hotelUrl'].'/adminpan/dash">'.$lang['HPan'].'</a>
					</li>';}?>
				</ul>
			</div>
			<noscript>
				<div class="error nojs">
					Voc?? precisa usar Javascript! / I need javascript
				</div>
			</noscript>
