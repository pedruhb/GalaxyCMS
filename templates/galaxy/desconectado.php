<title><?php echo $config['hotelName']?> - Desconectado!</title>
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
<link rel="dns-prefetch" href="//fonts.googleapis.com"><link rel="dns-prefetch" href="//fonts.gstatic.com"><script>!function(){var e=document.createElement("link"),t=document.getElementsByTagName("script")[0];e.href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold|Ubuntu+Condensed:regular",e.rel="stylesheet",t.parentNode.insertBefore(e,t)}()</script><link rel="stylesheet" href="https://images.habbo.com/habbo-web/america/pt/app.78b4e6e9.css"><habbo-client-reload ng-if="ClientController.isOpen &amp;&amp; ClientController.flashEnabled &amp;&amp; !ClientController.running" reload="ClientController.reload()"><h1 translate="RELOAD_TITLE">Desconectado!</h1><form action="../hotel" method="get"><button  class="client-reload__button"   type="submit" translate="RELOAD_BUTTON">Recarregar</button></form></habbo-client-reload>