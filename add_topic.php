<?php
$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);
/*
$_POST['parent_id']=1;
$_POST['topic_by']=2;
$_POST['title']='dasads';
$_POST['body']='dsasaddasdsadasda';
*/
$query =
"INSERT INTO topic(parent_id,topic_by,title,body) VALUES(".$_POST['parent_id'].",".$_POST['topic_by'].",".$_POST['title'].",".$_POST['body'].")";
	


echo $query;
/*
$result = mysql_query($query,$link);
*/
?>