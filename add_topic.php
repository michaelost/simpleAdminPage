<?php
$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);
$query =
"INSERT INTO topic(parent_id,topic_by,title,body) VALUES(".$_POST['parent_id'].",".$_POST['topic_by'].","."'".$_POST['title']."','".$_POST['body']."')";

$result = mysql_query($query,$link);

?>