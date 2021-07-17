		<?php
		if(!defined("BRAIN_CMS")) 
		{ 
			die("Você não pode acessar esse arquivo..."); 
		}

		include 'assets/permissoes.php';
		?>

		<li class="nav-item">
			<a class="nav-link" href="/adminpan/dash">
				<i class="mdi mdi-home"></i>
				<span class="w-100">Início</span>
			</a>
		</li>
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("noticias")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="far fa-newspaper"></i>
					<span class="w-100">Notícias</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<li>
						<a href="/adminpan/nova-noticia">Nova notícia</a>
					</li>
					<li>
						<a href="/adminpan/noticias">Ver notícias</a>
					</li>
				</ul>
			</li>
		<?php }?>
		<!--end nav-item-->
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("logs")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-account-convert">
					</i>
					<span class="w-100">Logs</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<li>
						<a href="/adminpan/chatlogs">Chatlogs</a>
					</li>
					<li>
						<a href="/adminpan/consolelogs">Consolelogs</a>
					</li>
					<li>
						<a href="/adminpan/paylogs">Paylogs</a>
					</li>
					<li>
						<a href="/adminpan/tradelogs">Logs de troca</a>
					</li>
					<li>
						<a href="/adminpan/ltdlogs">LTD Logs</a>
					</li>
					<li>
						<a href="/adminpan/stafflogs">Staff Logs</a>
					</li>
					<li>
						<a href="/adminpan/feiralogs">Feira livre logs</a>
					</li>
					<li>
						<a href="/adminpan/hklogs">HK Logs</a>
					</li>
				</ul>
			</li>
		<?php }?>
		<!--end nav-item-->
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("emblemas")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-sticker-emoji"></i>
					<span class="w-100">Emblemas</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<li>
						<a href="/adminpan/hospedar-emblema">Hospedar Emblema</a>
					</li>
					<li>
						<a href="/adminpan/emblemas-hospedados">Emblemas Hospedados</a>
					</li>
				</ul>
			</li>
		<?php }?>
		<!--end nav-item-->
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("bans") || User::userData('rank') >= GalaxyHK::ObtemValorConfig("filtro")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-security">
					</i>
					<span class="w-100">Moderação</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("bans")){ ?>
						<li>
							<a href="/adminpan/banimentos">Gerenciar banimentos</a>
						</li>
					<?php } if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("filtro")){ ?>
						<li>
							<a href="/adminpan/filtrodepalavras">Filtro de palavras</a>
						</li>
					<?php }?>
				</ul>
			</li>
		<?php }?>

		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("infracoes")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-security">
					</i>
					<span class="w-100">Infrações</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<li>
						<a href="/adminpan/infracoes">Gerenciar infrações</a>
					</li>
					<li>
						<a href="/adminpan/add_infra">Adicionar infração</a>
					</li>
				</ul>
			</li>
		<?php }?>

		<!--end nav-item-->
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("usuario") || User::userData('rank') >= GalaxyHK::ObtemValorConfig("quartos")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-settings"></i>
					<span class="w-100">Gerenciamento</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("usuario")){ ?>
						<li>
							<a href="/adminpan/usuario">Buscar usuário</a>
						</li>
						<li>
							<a href="/adminpan/usuarios">Usuários</a>
						</li>				
						<li>
							<a href="/adminpan/fakes">Contas fakes</a>
						</li>
					<?php } if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("quartos")){ ?>
						<li>
							<a href="/adminpan/quartos">Quartos</a>
						</li>
					<?php }?>
					<li>
						<a href="/adminpan/hospedar-ads">Hospedar ADS</a>
					</li>
				</ul>
			</li>
		<?php }?>
		<!--end nav-item-->
		<?php if(User::userData('rank') >= GalaxyHK::ObtemValorConfig("raros")){ ?>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="mdi mdi-star">
					</i>
					<span class="w-100">Raros LTD</span>
					<span class="menu-arrow">
						<i class="mdi mdi-chevron-right">
						</i>
					</span>
				</a>
				<ul class="nav-second-level mm-collapse" aria-expanded="false">
					<li>
						<a href="/adminpan/add-raro">Adicionar raro</a>
					</li>
					<li>
						<a href="/adminpan/raros">Gerenciar raros</a>
					</li>
				</ul>
			</li>
		<?php } ?>

		<!--end nav-item-->