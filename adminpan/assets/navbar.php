<?php
if (!defined("BRAIN_CMS")) {
	die("Você não pode acessar esse arquivo...");
}
?>
<nav class="navbar-custom">
	<ul class="list-unstyled topbar-nav mb-0">
		<li>
			<button class="button-menu-mobile nav-link waves-effect waves-light">
				<i class="dripicons-menu nav-icon"></i>
			</button>
		</li>
	</ul>
	<ul class="list-unstyled topbar-nav float-right mb-0">
		<li class="dropdown">
			<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
				<img src="<?= $config['avatarImageUrl']; ?>?figure=<?= User::userData('look'); ?>&action=std&gesture=std&direction=2&head_direction=2&size=&headonly=1&img_format=png" alt="profile-user" class="rounded-circle"> <span class="ml-1 nav-user-name hidden-sm"><?= User::userData('username'); ?> <i class="mdi mdi-chevron-down">
					</i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="/adminpan/editar-usuario/<?= User::userData('username'); ?>">
					<i class="dripicons-user text-muted mr-2"></i> Meu usuário</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="/index">
					<i class="dripicons-exit text-muted mr-2"></i> Voltar para o hotel</a>
			</div>
		</li>
	</ul>
	<!--end topbar-nav-->
</nav>