/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `brain_config_galaxy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chave` varchar(250) DEFAULT NULL,
  `tipo` enum('config','hotel','email') DEFAULT 'config',
  `tipo_valor` enum('texto','bool','int') DEFAULT 'texto',
  `valor` varchar(250) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  UNIQUE KEY `chave` (`chave`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `brain_config_galaxy` DISABLE KEYS */;
INSERT INTO `brain_config_galaxy` (`id`, `chave`, `tipo`, `tipo_valor`, `valor`, `descricao`) VALUES
	(1, 'avatarImageUrl', 'config', 'texto', 'https://avatar.galaxyservers.host/habbo-imaging/avatarimage', 'Link de onde as imagens de avatares são puxadas.'),
	(2, 'idHotel', 'config', 'int', '14', 'Definido automaticamente pelo GalaxyPanel, não altere.'),
	(3, 'galaxyApiUrl', 'config', 'texto', 'https://painel.galaxyservers.host/system/api/', 'Definido automaticamente pelo GalaxyPanel, não altere.'),
	(4, 'galaxyApiKey', 'config', 'texto', '1ba8fe6bdcff5b4c92aae3081edf5a06', 'Definido automaticamente pelo GalaxyPanel, não altere.'),
	(5, 'nitroUrl', 'config', 'texto', 'https://cdn.galaxyservers.host/nitro/index.html', 'Link do iframe do nitro.'),
	(6, 'hotelEmu', 'config', 'texto', 'arcturus', 'arcturus ou plus'),
	(7, 'hotelUrl', 'config', 'texto', 'http://galaxycms.localhost', 'Link do hotel'),
	(8, 'skin', 'config', 'texto', 'brain', 'Template da cms'),
	(9, 'lang', 'config', 'texto', 'auto', 'pt, en, es ou auto'),
	(10, 'hotelName', 'config', 'texto', 'Sandbox', 'Nome do hotel'),
	(11, 'favicon', 'config', 'texto', '/favicon.ico', 'Link para o favicon'),
	(12, 'staffCheckHk', 'config', 'bool', 'false', NULL),
	(13, 'staffCheckHkMinimumRank', 'config', 'int', '3', NULL),
	(14, 'maintenance', 'config', 'bool', 'false', 'Manutenção'),
	(15, 'maintenancekMinimumRankLogin', 'config', 'int', '3', NULL),
	(16, 'groupBadgeURL', 'config', 'texto', 'https://cdn.galaxyservers.host/groupbadges/badge.php?b=', 'Link para emblemas de grupo'),
	(17, 'badgeURL', 'config', 'texto', 'https://cdn.galaxyservers.host/swf/c_images/album1584/', 'Link do album1584'),
	(18, 'userLikeEnable', 'config', 'bool', 'true', NULL),
	(19, 'newsCommandEnable', 'config', 'bool', 'true', NULL),
	(20, 'newsCommandFilter', 'config', 'bool', 'true', NULL),
	(21, 'alertReferrer', 'config', 'bool', 'true', NULL),
	(22, 'alert', 'config', 'texto', ' ', NULL),
	(23, 'brainversion', 'config', 'texto', '1.8.1', NULL),
	(24, 'emuHost', 'hotel', 'texto', '51.222.225.151', 'Não altere'),
	(25, 'emuPort', 'hotel', 'int', '3500', 'Não altere'),
	(26, 'staffCheckClient', 'hotel', 'bool', 'false', NULL),
	(27, 'staffCheckClientMinimumRank', 'hotel', 'int', '3', NULL),
	(28, 'homeRoom', 'hotel', 'int', '0', 'ID do quarto inicial'),
	(29, 'external_Variables', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/external_variables.php?id=%idhotel%', 'Não altere'),
	(30, 'external_Variables_Override', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/override/external_override_variables.txt', 'Não altere'),
	(31, 'external_Texts', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/external_flash_texts.php?id=%idhotel%&lang=%lang%', 'Não altere'),
	(32, 'external_Texts_Override', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/override/external_flash_override_texts.php?id=%idhotel%', 'Não altere'),
	(33, 'productdata', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/productdata.txt', 'Não altere'),
	(34, 'furnidata', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/furnidata.xml', 'Não altere'),
	(35, 'figuremap', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/figuremap.xml', 'Não altere'),
	(36, 'figuredata', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gamedata/figuredata.xml', 'Não altere'),
	(37, 'swfFolder', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gordon/GALAXYSERVERS', 'Não altere'),
	(38, 'swfFolderSwf', 'hotel', 'texto', 'https://cdn.galaxyservers.host/swf/gordon/GALAXYSERVERS/Habbo.swf', 'Não altere'),
	(39, 'onlineCounter', 'hotel', 'bool', 'false', NULL),
	(40, 'diamonds.enabled', 'hotel', 'bool', 'true', NULL),
	(41, 'facebookLogin', 'config', 'bool', 'false', NULL),
	(42, 'facebookAPPID', 'config', 'texto', '334162590sdaf292528', NULL),
	(43, 'facebookAPPSecret', 'config', 'texto', 'ce2504ff5adsfa3ff7a6a2fa6d984cd8836', NULL),
	(44, 'mailServerHost', 'email', 'texto', 'smtp.gmail.com', NULL),
	(45, 'mailServerPort', 'email', 'int', '587', NULL),
	(46, 'SMTPSecure', 'email', 'texto', 'TLS', NULL),
	(47, 'mailUsername', 'email', 'texto', 'gmail@gmail.com', NULL),
	(48, 'mailPassword', 'email', 'texto', '*****', NULL),
	(49, 'mailLogo', 'email', 'texto', 'http://127.0.0.1/templates/brain/style/images/logo/logo.png', NULL),
	(50, 'mailTemplate', 'email', 'texto', '/system/app/plugins/PHPmailer/temp/resetpassword.html', NULL),
	(51, 'facebook', 'config', 'texto', 'https://www.facebook.com/Habbo/', 'Link do facebook'),
	(52, 'facebookEnable', 'config', 'bool', 'true', 'Ativar ou não o facebook'),
	(53, 'twitter', 'config', 'texto', 'https://twitter.com/Habbo', 'Link do twitter'),
	(54, 'twitterEnable', 'config', 'bool', 'false', 'Ativar ou não o twitter'),
	(55, 'startMotto', 'config', 'texto', 'Sandbox ƒ|', 'Missão inicial'),
	(56, 'credits', 'config', 'int', '10000', 'Créditos iniciais dado no registro'),
	(57, 'duckets', 'config', 'int', '20000', 'Duckets iniciais dado no registro'),
	(58, 'diamonds', 'config', 'int', '10', 'Diamantes iniciais dados no registro'),
	(59, 'diamondsRef', 'config', 'int', '10', NULL),
	(60, 'registerEnable', 'config', 'bool', 'true', 'Ativa/desativa o registro'),
	(61, 'recaptchaSiteKey', 'config', 'texto', '6LdzewwUAAAAABkJ3vsdfCDca9qmLGDaWAHqMRtFEs2', 'Google recaptcha Site Key  \r\n    Go to this website to create a recaptcha Site Key: https://www.google.com/recaptcha/intro/index.html'),
	(62, 'recaptchaSiteKeyEnable', 'config', 'bool', 'false', NULL),
	(63, 'vipCost', 'config', 'int', '25', NULL),
	(64, 'vipRankToGet', 'config', 'int', '3', NULL),
	(65, 'vipBadge', 'config', 'texto', 'vip', NULL);
/*!40000 ALTER TABLE `brain_config_galaxy` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
