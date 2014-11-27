<?php


$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);






$query =
"INSERT INTO category (name,parent) VALUES('".$_POST['name']."'".",".$_POST['parent_id'].")";

$result = mysql_query($query,$link);



?>