<!DOCTYPE html>
<html>
<head>
	<?php include 'assets/meta.php';?>
	<title><?php echo $config['hotelName']?> - <?= $lang['R'] ;?></title>
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/header.css?57" media="screen" />
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/emojis.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/templates/galaxy/assets/css/search.css?LVL254" media="screen" />
</head>
<body>
	<?php include 'assets/menu.php';?>
	<div class="page search">
		<div class="left cinquante">
			<div class="box">
				<div class="title black">
					<div class="img">
						<img src="/templates/galaxy/assets/img/box_title_search.png" />
					</div>
					<p>
						<?= $lang['R'] ;?>
					</p>
				</div>
				<?php
				$styleselect=
				"
				display: block;
				width:auto;  
				height: 34px;
				padding: 6px 12px;
				font-size: 14px;
				line-height: 1.42857143;
				color: #555;
				background-color: #eee;
				background-image: none;
				border: 1px solid #ccc;
				border-radius: 4px;
				-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
				box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
				-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
				-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
				transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
				text-transform: none;

				";
				?>
				<div class="content">
					<p>
						<?= $lang['Rp'];?>
					</p>
					<?php

					$postNews = $dbh->prepare("SELECT * FROM referrer WHERE refid = :refid");
					$postNews->bindValue(":refid", User::userData('id'));
					$postNews->execute();
					$teste2 =$postNews->RowCount();
				
					if (isset($_POST['refer'])) 
					{
						if(User::userData('online') == 1){
							echo '<center style="padding-top: 100px;"><div class="error" style="
							border-radius: 3px;
							overflow: auto;
							width: 80%;
							background: #d32f2f;
							line-height: 40px;
							color: #fff;
							text-align: center;">'.$lang['Rd'].'</div></center>';
						} else {

							if ($_POST['refer'] == '5'){

								if ($teste2 <= '4' ){ 
									echo '<center style="padding-top: 100px;"><div class="error" style="
									border-radius: 3px;
									overflow: auto;
									width: 80%;
									background: #d32f2f;
									line-height: 40px;
									color: #fff;
									text-align: center;">'.$lang['Rvcntps'].'</div></center>';
								} else {			

										$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 5");

										$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
										$postNews5->bindValue(":userid", User::userData('id'));
										$postNews5->bindValue(":item", 4468633);
										$postNews5->execute();

										$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '5', '1x 4468633', :data);");
										$postNews11->bindValue(":usuario", User::userData('id'));
										$postNews11->bindValue(":data", time());
										$postNews11->execute();
										
										echo '
										<center style="padding-top: 100px;"><div class="error" style="
										border-radiuS: 3px;
										overflow: auto;
										width: 80%;
										background: #6c9c14;
										line-height: 40px;
										color: #fff;
										text-align: center;">'.$lang['Rok'].'</div></center>';

									}	
								}


								if ($_POST['refer'] == '10'){
									if ($teste2 <= '9' ){
										echo '<center style="padding-top: 100px;"><div class="error" style="
										border-radius: 3px;
										overflow: auto;
										width: 80%;
										background: #d32f2f;
										line-height: 40px;
										color: #fff;
										text-align: center;">'.$lang['Rvcntps'].'</div></center>';
										} else {			

											$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 10");

											$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
											$postNews5->bindValue(":userid", User::userData('id'));
											$postNews5->bindValue(":item", 4468633);
											$postNews5->execute();

											$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
											$postNews5->bindValue(":userid", User::userData('id'));
											$postNews5->bindValue(":item", 4468633);
											$postNews5->execute();

											$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
											$postNews5->bindValue(":userid", User::userData('id'));
											$postNews5->bindValue(":item", 10342383);
											$postNews5->execute();
	
											$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '10', '2x 4468633, 1x 10342383', :data);");
											$postNews11->bindValue(":usuario", User::userData('id'));
											$postNews11->bindValue(":data", time());
											$postNews11->execute();
											
											echo '
											<center style="padding-top: 100px;"><div class="error" style="
											border-radiuS: 3px;
											overflow: auto;
											width: 80%;
											background: #6c9c14;
											line-height: 40px;
											color: #fff;
											text-align: center;">'.$lang['Rok'].'</div></center>';

										}	
									}

									if ($_POST['refer'] == '20'){
										if ($teste2 <= '19' ){
											echo '<center style="padding-top: 100px;"><div class="error" style="
										border-radius: 3px;
										overflow: auto;
										width: 80%;
										background: #d32f2f;
										line-height: 40px;
										color: #fff;
										text-align: center;">'.$lang['Rvcntps'].'</div></center>';
									} else {		
										
										$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 20");

										$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
										$postNews5->bindValue(":userid", User::userData('id'));
										$postNews5->bindValue(":item", 51418375);
										$postNews5->execute();

										$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '20', '1x 51418375', :data);");
										$postNews11->bindValue(":usuario", User::userData('id'));
										$postNews11->bindValue(":data", time());
										$postNews11->execute();
										
										echo '
										<center style="padding-top: 100px;"><div class="error" style="
										border-radiuS: 3px;
										overflow: auto;
										width: 80%;
										background: #6c9c14;
										line-height: 40px;
										color: #fff;
										text-align: center;">'.$lang['Rok'].'</div></center>';

												
											}	
										}	



										if ($_POST['refer'] == '30'){
											if ($teste2 <= '29' ){
												echo '<center style="padding-top: 100px;"><div class="error" style="
												border-radius: 3px;
												overflow: auto;
												width: 80%;
												background: #d32f2f;
												line-height: 40px;
												color: #fff;
												text-align: center;">'.$lang['Rvcntps'].'</div></center>';
											}
												else{			

													$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 30");

													$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
													$postNews5->bindValue(":userid", User::userData('id'));
													$postNews5->bindValue(":item", 44168334);
													$postNews5->execute();
			
													$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '30', '1x 44168334', :data);");
													$postNews11->bindValue(":usuario", User::userData('id'));
													$postNews11->bindValue(":data", time());
													$postNews11->execute();
													
													echo '
													<center style="padding-top: 100px;"><div class="error" style="
													border-radiuS: 3px;
													overflow: auto;
													width: 80%;
													background: #6c9c14;
													line-height: 40px;
													color: #fff;
													text-align: center;">'.$lang['Rok'].'</div></center>';

												}	
											}

											if ($_POST['refer'] == '35'){
												if ($teste2 <= '34' ){
													echo '<center style="padding-top: 100px;"><div class="error" style="
												border-radius: 3px;
												overflow: auto;
												width: 80%;
												background: #d32f2f;
												line-height: 40px;
												color: #fff;
												text-align: center;">'.$lang['Rvcntps'].'</div></center>';
											}
													else{			

														$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 35");

														$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
														$postNews5->bindValue(":userid", User::userData('id'));
														$postNews5->bindValue(":item", 1000021);
														$postNews5->execute();
				
														$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '35', '1x 1000021', :data);");
														$postNews11->bindValue(":usuario", User::userData('id'));
														$postNews11->bindValue(":data", time());
														$postNews11->execute();

														echo '
													<center style="padding-top: 100px;"><div class="error" style="
													border-radiuS: 3px;
													overflow: auto;
													width: 80%;
													background: #6c9c14;
													line-height: 40px;
													color: #fff;
													text-align: center;">'.$lang['Rok'].'</div></center>';
													}	
												}	



												if ($_POST['refer'] == '50'){
													if ($teste2 <= '49' ){
														echo '<center style="padding-top: 100px;"><div class="error" style="
												border-radius: 3px;
												overflow: auto;
												width: 80%;
												background: #d32f2f;
												line-height: 40px;
												color: #fff;
												text-align: center;">'.$lang['Rvcntps'].'</div></center>';
											}
														else{		
															
															
														$postNews4 = $dbh->query("DELETE FROM referrer WHERE refid = '".User::userData('id')."' LIMIT 50");

														$postNews5 = $dbh->prepare("INSERT INTO items (user_id, item_id) VALUES (:userid, :item)");
														$postNews5->bindValue(":userid", User::userData('id'));
														$postNews5->bindValue(":item", 4468634);
														$postNews5->execute();
				
														$postNews11 = $dbh->prepare("INSERT INTO `galaxycms_reftrocas` (`usuario`, `referidos`, `premio`, `timestamp`) VALUES (:usuario, '50', '1x 4468634', :data);");
														$postNews11->bindValue(":usuario", User::userData('id'));
														$postNews11->bindValue(":data", time());
														$postNews11->execute();

														echo '
													<center style="padding-top: 100px;"><div class="error" style="
													border-radiuS: 3px;
													overflow: auto;
													width: 80%;
													background: #6c9c14;
													line-height: 40px;
													color: #fff;
													text-align: center;">'.$lang['Rok'].'</div></center>';

														}	
													}	
												}
											}
											?>		
											<form name="resgatar" method="post">

												<center><select style="<?php echo $styleselect;?>" id="select2" name="refer"  onchange="alteraDivR()">
													<option value="5">10 diamantes por 5 referidos</option>
													<option value="10">25 diamantes por 10 Referidos</option>
													<option value="20">Serpa por 20 Referidos</option>
													<option value="30">Sorveteira por 30 Referidos</option>
													<option value="35">Bonnie por 35 Referidos</option>
													<option value="50">150 diamantes por 50 Referidos</option>
												</select>

												<br><br>
												<img id="5"  src="https://i.imgur.com/C3IZG8n.png">
												<img id="10"  style="display:none;margin-top: -1px;" src="https://i.imgur.com/JQt8GiZ.png">
												<img id="20"  style="display:none;margin-top: -1px;" src="https://i.imgur.com/REGoizK.png">
												<img id="30"  style="display:none;margin-top: -1px;" src="https://i.imgur.com/4hhRj6p.png">
												<img id="35"  style="display:none;margin-top: -1px;" src="https://i.imgur.com/cwZ6Ioc.png">
												<img id="50"  style="display:none;margin-top: -1px;" src="https://i.imgur.com/Uyk7zVW.png">
												<br><br>
												<center><input style="width: calc(30% - 5px);
												text-shadow: 0 1px 2px rgba(0,0,0,0.2);
												background: #6c9c14;
												color: #fff;
												transition: 200ms background;
												border: none;
												cursor: pointer;
												color: #fff;
												text-align: center;    padding: 9px 10px;
												border-radius: 3px;
												" type="submit" name="resgatar" value="<?= $lang['RR'] ;?>" /></center>
												<br><?= $lang['Rpi'];?>
											</center>
										</form>
									</div>
								</div>
							</div>
							<div class="cinquante right">
								<div class="box">
									<div class="title orange">
										<div class="img">
											<img src="/templates/galaxy/assets/img/box_title_search.png" />
										</div>
										<p>
											<?= $lang['RSI'] ;?>
										</p>
									</div>
									<div class="content">
										<?php
										$refCount = $dbh->prepare("SELECT refid FROM referrer WHERE refid = :refid");
										$refCount->bindParam(':refid', $_SESSION['id']);
										$refCount->execute();

										if ($refCount->RowCount() > 1){
											$pontos = $lang['Rponto'];
										}
										else if ($refCount->RowCount() == 0){
											$pontos = $lang['Rpontos'];
										}
										else
										{
											$pontos = $lang['Rponto'];
										}
										if ($refCount->RowCount() == 0){
											echo '<p>'.$lang['Rola'].' '.User::userData('username').', '.$lang['Rnenhumponto'].'</p><br>';
										} else {
											echo '<p>'.$lang['Rola'].' '.User::userData('username').', '.$lang['Rvctem'].' '.$refCount->RowCount().' '.$pontos.'!</p><br>';
										}
										?>

										
										<p><?= $lang['Rindicou'];?> <?php
										$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
										$bankCount->bindParam(':userid', $_SESSION['id']);
										$bankCount->execute();
										$bankCountData = $bankCount->fetch();
										if($bankCount->RowCount() == 0)
										{
											echo '0';
										}
										else
										{
											echo $bankCountData['diamonds'];
										}
										?> <?= $lang['Ru'];?></p><br><p><?= $lang['Rsl'];?> <?php echo $config['hotelUrl']?>/register/<?= User::userData('username') ?></p>


									</div>
								</div>
							</div>
							<div class="left cinquante">
								<div class="box">
									<div class="title black">
										<div class="img">
											<img src="/templates/galaxy/assets/img/box_title_search.png" />
										</div>
										<p>
											<?= $lang['RHT'] ;?>
										</p>
									</div>
								</div>
<?php 

$getArticles13 = $dbh->prepare('SELECT * FROM galaxycms_reftrocas where usuario = '.User::userData('id'));
$getArticles13->execute();
if ($getArticles13->rowCount() == 0){
	echo '<div class="error tctm ">'.$lang['Rst'].'</div> ';
}

while ($result1 = $getArticles13->fetch())
{ 

	echo '
	<div class="user">
	<div class="avatar">
	<center><img src="\templates\galaxy\assets\img\pk2.png" style="margin-top: 12px;"></center>
	</div>
	<div class="uinfo">
	<a>'.$result1['premio'].'</a>
	<p class="habbfont">'.$lang['Rha']." ".difer_data(date('Y-m-d G:i:s', $result1['timestamp'])).'</p>
	</div>
	</div>';

}

?>
</div>
</div>
<?php include 'assets/fundo.php';?>
<script src="/templates/galaxy/assets/js/jquery.min.js" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.cookyjs.min.js" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.tooltip.min.js" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.extend.js" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.BBCJS.js?4" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.share.min.js?v3" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/jquery.global.js?78" charset="utf-8"></script>
<script src="/templates/galaxy/assets/js/register.pushn.js" charset="utf-8"></script>
<script>
	alteraDivR = function (){

		if($('#select2').val() == 5){
			$("#5").show();
			$("#10").hide();
			$("#20").hide();
			$("#30").hide();
			$("#35").hide();
			$("#50").hide();
		}
		if($('#select2').val() == 10){
			$("#5").hide();
			$("#10").show();
			$("#20").hide();
			$("#30").hide();
			$("#35").hide();
			$("#50").hide();
		}
		if($('#select2').val() == 20){
			$("#5").hide();
			$("#10").hide();
			$("#20").show();
			$("#30").hide();
			$("#35").hide();
			$("#50").hide();
		}
		if($('#select2').val() == 30){
			$("#5").hide();
			$("#10").hide();
			$("#20").hide();
			$("#30").show();
			$("#35").hide();
			$("#50").hide();
		}
		if($('#select2').val() == 35){
			$("#5").hide();
			$("#10").hide();
			$("#20").hide();
			$("#30").hide();
			$("#35").show();
			$("#50").hide();
		}
		if($('#select2').val() == 50){
			$("#5").hide();
			$("#10").hide();
			$("#20").hide();
			$("#30").hide();
			$("#35").hide();
			$("#50").show();
		}
		
	}
</script>	
</body>
</html>