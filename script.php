<?php


$link =  mysql_connect('localhost','root','123qweasdzxcv');
mysql_select_db('laba',$link);

/*
$_POST['name']='flash';
$_POST['parent_id']=10;
$_POST['id']=7;
*/

$query =
"UPDATE category SET name ='".$_POST['name']."', parent = ".$_POST['parent_id']." WHERE category_id =".$_POST['id'];
echo $query;

$result = mysql_query($query,$link);



?>