<!DOCTYPE html>
<html>
<head>
    <?php include 'assets/meta.php';?>
    <title><?php echo $config['hotelName']?> - VIP's</title>
    <link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
    <link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/scam.css?LVL254" media="screen" />
</head>
<body>
    <?php include 'assets/menu.php';?>
                    <div class="page scam">
                        <div class="left">
                            <div class="box">
                                <div class="title green">
                                    <p>VIP's Mercúrio</p>
                                </div>
                                <div class="content">
                                    <?php
                                    $getMessage = $dbh->prepare("SELECT * from users where rank_vip = '3'");
                                    $getMessage->bindParam(':cargo', $cargo);
                                    $getMessage->execute();
                                    while ($getMessageData = $getMessage->fetch())
                                    {
                                        if ($getMessageData['online'] == 0){
                                            $img = 'offline';
                                        } 
                                        else { $img = 'online';
                                    }
                                    $getArticles = $dbh->prepare("SELECT * FROM vipshabby where nick = :nick");
                                    $getArticles->bindParam(':nick', $getMessageData['id'], PDO::PARAM_STR); 
                                    $getArticles->execute();
                                    $news = $getArticles->fetch();
                                    $restante = difer_data(date('Y-m-d G:i:s', $news["expira"]));
                                    echo'<div class="user blue">
                                    <div class="avatar">
                                    <img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData['look'].'&gesture=sml" />
                                    </div>
                                    <div class="right">
                                    <a href="home/'.$getMessageData['username'].'">'.$getMessageData['username'].'</a>
                                    <p><b>VIP '.$restante.' </b></p>
                                    <img src="/templates/galaxy/assets/img/'.$img.'.gif" /> </div>
                                    </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="box">
                            <div class="title blue">
                                <p>VIP's Netuno</p>
                            </div>
                            <div class="content">

                                <?php
                                $getMessage = $dbh->prepare("SELECT * from users where rank_vip = '2'");
                                $getMessage->bindParam(':cargo', $cargo);
                                $getMessage->execute();
                                while ($getMessageData = $getMessage->fetch())
                                {
                                    if ($getMessageData['online'] == 0){
                                        $img = 'offline';
                                    } 
                                    else { $img = 'online';
                                }
                                $getArticles = $dbh->prepare("SELECT * FROM vipshabby where nick = :nick");
                                $getArticles->bindParam(':nick', $getMessageData['id'], PDO::PARAM_STR); 
                                $getArticles->execute();
                                $news = $getArticles->fetch();
                                $restante = difer_data(date('Y-m-d G:i:s', $news["expira"]));
                                echo'<div class="user blue">
                                <div class="avatar">
                                <img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData['look'].'&gesture=sml" />
                                </div>
                                <div class="right">
                                <a href="home/'.$getMessageData['username'].'">'.$getMessageData['username'].'</a>
                                <p><b>VIP '.$restante.' </b></p>
                                <img src="/templates/galaxy/assets/img/'.$img.'.gif" /> </div>
                                </div>
                                ';
                            }
                            ?>

                        </div>
                    </div>

                    <div class="box">
                        <div class="title red">
                            <p>VIP's Júpiter</p>
                        </div>
                        <div class="content">

                            <?php
                            $getMessage = $dbh->prepare("SELECT * from users where rank_vip = '1'");
                            $getMessage->bindParam(':cargo', $cargo);
                            $getMessage->execute();
                            while ($getMessageData = $getMessage->fetch())
                            {
                                if ($getMessageData['online'] == 0){
                                    $img = 'offline';
                                } 
                                else { $img = 'online';
                            }
                            $getArticles = $dbh->prepare("SELECT * FROM vipshabby where nick = :nick");
                            $getArticles->bindParam(':nick', $getMessageData['id'], PDO::PARAM_STR); 
                            $getArticles->execute();
                            $news = $getArticles->fetch();
                            $restante = difer_data(date('Y-m-d G:i:s', $news["expira"]));
                            echo'<div class="user blue">
                            <div class="avatar">
                            <img src="https://habbo.city/habbo-imaging/avatarimage?figure='.$getMessageData['look'].'&gesture=sml" />
                            </div>
                            <div class="right">
                            <a href="home/'.$getMessageData['username'].'">'.$getMessageData['username'].'</a>
                            <p><b>VIP '.$restante.' </b></p>
                            <img src="/templates/galaxy/assets/img/'.$img.'.gif" /> </div>
                            </div>
                            ';
                        }
                        ?>

                    </div>
                </div>
            </div>



            <div class="right">
                <div class="box">
                    <div class="title blue">
                        <div class="img">
                            <img src="/templates/galaxy/assets/img/box_title_fansites.png" />
                        </div>
                        <p>Por que eles são VIP?</p>
                    </div>
                    <div class="content">
                        Os VIP's são usuários que fizeram doações para a ajudar os gastos do hotel, onde retribuímos a
                        gentileza com o VIP.
                    </div>
                </div>
                <div class="box">
                    <div class="title blue">
                        <div class="img">
                            <img src="/templates/galaxy/assets/img/box_title_fansites.png" />
                        </div>
                        <p>Quais são as vantagens se der VIP?</p>
                    </div>
                    <div class="content">
                        Os usuários VIP, podem trocar de nome quando quiser e quantas vezes quiser, tem comandos especiais, e além disso ganham emblemas, raros, meteoritos, diamantes e outros... <br>Para ver os planos clique <a href="contribuicao/vip">aqui</a>.
                    </div>
                </div>
                <div class="box">
                    <div class="title blue">
                        <div class="img">
                            <img src="/templates/galaxy/assets/img/box_title_fansites.png" />
                        </div>
                        <p>Como posso me tornar VIP?</p>
                    </div>
                    <div class="content">
                     Para você ser VIP, clique <a href="contribuicao/">aqui</a> para acessar a central de contribuição do <?php echo $config['hotelName']?>
                 </div>
             </div>
         </div>
     </div>
     <?php include 'assets/fundo.php';?>
     <script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.cookyjs.min.js" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.BBCJS.js?4" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.share.min.js?v3" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.cookiebar.js?2" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/jquery.global.js?78" charset="utf-8"></script>
     <script src="/templates/galaxy/assets/js/register.pushn.js" charset="utf-8"></script>
 </body>
 </html>