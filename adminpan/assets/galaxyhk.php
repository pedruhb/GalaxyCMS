<?php
if(!defined('BRAIN_CMS')) 
{ 
	die('Você não pode acessar esse arquivo.'); 
}

class GalaxyHK 
{
	public static function GetUsernameFromId($id){
		global $dbh;
		$getUsername = $dbh->prepare("SELECT username FROM users WHERE id = :id LIMIT 1");
		$getUsername->bindParam(':id', $id);
		$getUsername->execute();
		return $getUsername->fetch()['username'];
	}

	public static function GetRankFromId($id){
		global $dbh;
		$getRank = $dbh->prepare("SELECT rank FROM users WHERE id = :id LIMIT 1");
		$getRank->bindParam(':id', $id);
		$getRank->execute();
		return $getRank->fetch()['rank'];
	}

	public static function GetRoomCaptionFromId($id){
		global $dbh;
		$getCaption = $dbh->prepare("SELECT caption FROM rooms WHERE id = :id LIMIT 1");
		$getCaption->bindParam(':id', $id);
		$getCaption->execute();
		return utf8_decode($getCaption->fetch()['caption']);
	}

	public static function Sucesso($mensagem){
		echo '<div class="alert alert-success" role="alert">'.$mensagem.'</div>';
		return;
	}

	public static function Error($mensagem){
		echo '<div class="alert alert-danger" role="alert">'.$mensagem.'</div>';
		return;
	}

	public static function Log($mensagem){
		global $dbh;
		global $_SESSION;
		
		$getUsername = $dbh->prepare("INSERT INTO `logs_hk` (`log`, `user`, `data`) VALUES (:log, :user, :data);");
		$getUsername->bindValue(':user', $_SESSION['id']);
		$getUsername->bindParam(':log', $mensagem);
		$getUsername->bindValue(':data', time());
		$getUsername->execute();
		GalaxyHK::DiscordWebhookSend($mensagem);
		return true;
	}

	public static function VerificaPermissao($permissao){
		global $_SESSION;
		if(GalaxyHK::ObtemValorConfig($permissao) < 1){
			die("Permissão inválida!");
		} else {
			if(GalaxyHK::GetRankFromId($_SESSION['id']) >= GalaxyHK::ObtemValorConfig($permissao)){
				/// Ok, permitido.
			} else {
				header("Location: /adminpan/dash");
				die("Você não tem permissão para acessar essa página.");
				return;
			}
		}
		return;
	}

	public static function ObtemValorConfig($permissao){
		global $dbh;
		$getPermi = $dbh->prepare("SELECT valor FROM config_hk_galaxy WHERE chave = :permissao");
		$getPermi->bindParam(':permissao', $permissao);
		$getPermi->execute();
		return $getPermi->fetch()['valor'];
	}

	public static function DiscordWebhookSend($mensagem){
		global $_SESSION;
		if(empty($_SESSION['id']))
			return;

		if(empty($mensagem))
			return;
		$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/adminpan/assets/config.json'));
		$discord_webhook = $json->discord_webhook;
		$link_webhook = $json->link_webhook;
		$imagem = $json->imagem_discord;

		if(!$discord_webhook)
			return;

		if(empty($link_webhook))
			return;

		$dataPacket = array(
			'content' => "",
			"avatar_url" => $imagem,
			'username' => "GalaxyHK",
			'embeds' => array(
				array(
					'timestamp' => date(DateTime::ISO8601),
					'description' => '',
					'color' => '5653183',
					'author' => array(
						'name' => $mensagem
					),
					'fields' => array(
						array(
							'name' => 'Usuário:',
							'value' => GalaxyHK::GetUsernameFromId($_SESSION['id']),
							'inline' => true
						)
					)
				)
			)
		);

		$dataString = json_encode($dataPacket);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $link_webhook);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $dataString);
		$output = curl_exec($curl);
		$output = json_decode($output, true);
		if (curl_getinfo($curl, CURLINFO_HTTP_CODE) != 204) {
			echo "Falha " . curl_getinfo($curl, CURLINFO_HTTP_CODE);
			print_r($output);
		}
		curl_close($curl);
		return;
	}



}