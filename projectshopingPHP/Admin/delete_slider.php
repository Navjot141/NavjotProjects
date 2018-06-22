<?php
include 'config_dbase.php' ;
$id=$_GET['id'];
$sql="delete  from slider where id=".$id."";
$exec=mysql_query($sql);
if(!$exec)
{
die('user not deleted'.mysql_error());		
}
header('location:manage_slider.php?do=delete');
?>