<?php
$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);
$query =
"UPDATE topic SET topic_by ='".$_POST['topic_by']."', parent_id = ".$_POST['parent_id'].",title = '".$_POST['title']."',body = '".$_POST['body']."' WHERE topic_id =".$_POST['topic_id'];
echo $query;
$result = mysql_query($query,$link);
?>