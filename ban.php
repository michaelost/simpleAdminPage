<?php
$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);


$query =
"UPDATE users SET isbanned =".$_POST['ban']." WHERE id =".$_POST['id'];
echo $query;

$result = mysql_query($query,$link);



?>