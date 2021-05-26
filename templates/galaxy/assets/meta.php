    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index,follow,all" />
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
    <meta name="description" content="<?= $lang['Mdescription'];?>" />
    <meta name="keywords" content="<?= $lang['MKeywords'];?>" />
    <META NAME="language" CONTENT="<?= $lang['MLanguage'];?>"> 
	<meta name="robots" content="index, follow" />
	<meta name="gigabot" content="index, follow" />
	<meta name="googlebot" content="index, follow" />
    <meta name="geography" content="Rio de Janeiro">
    <meta name="city" content="Rio de Janeiro">
    <meta name="country" content="Brazil">
    <meta name="identifier-url" content="<?php echo $config['hotelUrl']?>" />
    <meta name="Copyright" content="<?php echo $config['hotelName']?> Hotel" />
    <meta name="language" content="pt_br" />
    <meta name="hreflang" content="pt_br" />
    <meta name="category" content="Website">
    <meta name="reply-to" content="contato@<?php $aa=str_replace('http://', '', $config['hotelUrl']); $bb = str_replace('https://', '', $aa); echo str_replace('/', '', $bb); ?>">
    <meta property="og:site_name" content="<?php echo $config['hotelName']?>" />
    <meta property="og:url" content="<?php echo $config['hotelUrl']?>" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="<?php echo $config['hotelName']?> Hotel - <?= $lang['Mtitle'];?>" />
    <meta property="og:description" content="<?= $lang['Mtitle'];?>" />
    <meta property="og:image" content="<?php echo $config['hotelUrl']?>/templates/galaxy/assets/img/og.png" />
    <meta property="og:locale" content="pt_br" />
    <meta name="twitter:title" content="<?php echo $config['hotelName']?> Hotel - <?= $lang['Mtitle'];?>" />
    <meta name="twitter:description" content="<?= $lang['Mtitle'];?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image:src" content="<?php echo $config['hotelUrl']?>/templates/galaxy/assets/img/og.png" />
    <meta name="twitter:domain" content="<?php echo $config['hotelUrl']?>" /> 