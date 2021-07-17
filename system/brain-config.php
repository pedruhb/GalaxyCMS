<?php
if (!defined('BRAIN_CMS')) {
    die('Sorry but you cannot access this file!');
}

/* Configurações do Banco de Dados */
$db['host'] = 'localhost'; //Mysql's Host
$db['port'] = '3306'; //Mysql's port
$db['user'] = "root"; //Mysql's user
$db['pass'] = '92712296'; //Mysql's password
$db['db'] = "galaxy"; //Mysql's database

/* Obtém configurações diretamente da database */
try {
    $dbh = new PDO('mysql:host=' . $db['host'] . ':' . $db['port'] . ';charset=utf8;dbname=' . $db['db'] . '', $db['user'], $db['pass']);
} catch (PDOException $e) {
    die("Erro ao conectar no servidor MySQL!");
}

$obtemBrainConfig = $dbh->prepare("SELECT * FROM brain_config_galaxy ORDER BY tipo");
$obtemBrainConfig->execute();
while ($brainConfig = $obtemBrainConfig->fetch()) {

    if ($brainConfig['valor'] == "true")
        $brainConfig['valor'] = true;
    else if ($brainConfig['valor'] == "false")
        $brainConfig['valor'] = false;

    switch ($brainConfig['tipo']) {
        case "config":
            $config[$brainConfig['chave']] = $brainConfig['valor'];
            break;
        case "hotel":
            $hotel[$brainConfig['chave']] = str_replace("%idhotel%", $config['idHotel'], str_replace("%lang%", $config['lang'], $brainConfig['valor']));
            break;
        case "email":
            $email[$brainConfig['chave']] = $brainConfig['valor'];
            break;
    }
}

switch ($config['hotelEmu']) {
    case "arcturus":
        $emuUse['user_wardrobe']  = 'users_wardrobe';
        $emuUse['ip_last'] = 'ip_current';
        $emuUse['respect'] = 'respects_received';
        $emuUse['user_stats'] = 'users_settings';
        $emuUse['user_stats_user_id'] = 'user_id';
        $emuUse['OnlineTime'] = 'online_time';
        break;
    case "plusemu":
        $emuUse['user_wardrobe']  = 'user_wardrobe';
        $emuUse['ip_last'] = 'ip_last';
        $emuUse['respect'] = 'Respect';
        $emuUse['user_stats'] = 'user_stats';
        $emuUse['user_stats_user_id'] = 'id';
        $emuUse['OnlineTime'] = 'OnlineTime';
        break;
    default:
        //Nothing
        break;
}
