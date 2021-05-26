<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	session_start();
	ob_start();
	define('Z', $_SERVER['DOCUMENT_ROOT'].'/');
	define('A', Z . 'system/');
	define('B', 'app/');
	define('C', 'classes/');
	define('E', 'languages/');
	define('G', 'content/');
	define('H', 'templates/');
	define('I', 'maintenance/');
	define('J', Z . 'adminpan/');
	define('K', 'plugins/');
	require_once A . '/brain-config.php';
	
	if($config['lang'] == "auto"){
     $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $linguasAceitas = ['es', 'en', 'pt'];
    if (in_array($lang, $linguasAceitas)) {
         require_once A . E . '/'.$lang.'.php';
    }
	} else {
	require_once A . E . '/'.$config['lang'].'.php';
	}
	
	require_once A . B . C . '/functions.php';
	require_once A . B . C . '/class.game.php';
	require_once A . B . C . '/class.user.php';
	require_once A . B . C . '/class.html.php';
	require_once A . B . C . '/class.admin.php';
	require_once A . B . C . '/class.db.php';
	define('S', "galaxy");
	Html::loadPlugins();
	function difer_data($data)
		{
			global $lang;
			$agora = new DateTime();
			try {
				$data_ref = new DateTime($data);
			} catch (Exception $e) {
				echo $e->getMessage();
				return NULL;
			}
			$intervalo = $data_ref->diff($agora);
			extract((array) $intervalo);
			if ($y >= 1) {
				$sufixo = "{$y} " . ($y == 1 ? $lang['ano'] : $lang['anos']);
			} else if ($m >= 1) {
				$sufixo = "{$m} " . ($m == 1  ? $lang['mes'] : $lang['meses']);
			} else if ($d > 7) {
				$sufixo = floor($d / 7) . " " . ($d <= 14 ? $lang['semana'] : $lang['semanas']);
			} else if ($d >= 1) {
				$sufixo = "{$d} " . ($d == 1  ? $lang['dia'] : $lang['dias']);
			} else if ($h >= 1) {
				$sufixo = "{$h} " . ($h == 1  ? $lang['hora'] : $lang['horas']);
			} else if ($i >= 1) {
				$sufixo = "{$i} " . ($i == 1  ? $lang['minuto'] : $lang['minutos']);
			} else {
				$sufixo = "{$s} " . $lang['segundos'];
			}
			return "{$sufixo}";
		}