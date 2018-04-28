<?php
require 'config_db.php' ;
$id=$_GET['id'];
$sql="delete  from category where id=".$id."";
$exec=mysql_query($sql);
if($exec)
{
	echo "delete";
}
else
{
	echo "not deleted";
}
?>