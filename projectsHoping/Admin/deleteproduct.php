<?php
include 'config_dbase.php' ;
$id=$_GET['id'];
$sql="delete  from product where id=".$id."";
$exec=mysql_query($sql);
if(!$exec)
{
die('user not deleted'.mysql_error());		
}
header('location:manageproduct.php?do=delete');
?>