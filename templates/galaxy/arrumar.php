<?php
$sql = "";
$pega = $dbh->prepare("SELECT * FROM items_base");
$pega->execute();
while($i = $pega->fetch()){
    $sql .= "UPDATE items_base SET allow_stack = '".$i['allow_stack']."', allow_sit = '".$i['allow_sit']."', allow_lay = '".$i['allow_lay']."', allow_walk = '".$i['allow_walk']."', allow_gift = '".$i['allow_gift']."', ";
    $sql .= "allow_trade = '".$i['allow_trade']."', allow_recycle = '".$i['allow_recycle']."', allow_marketplace_sell = '".$i['allow_marketplace_sell']."', allow_inventory_stack = '".$i['allow_inventory_stack']."' WHERE id = '".$i['id']."';";
    $sql .= "<br>";
}
echo str_replace("''", "'0'", $sql);