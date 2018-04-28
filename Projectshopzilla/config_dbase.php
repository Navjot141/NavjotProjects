<?php
error_reporting('ERROR');
 session_start();
$con=mysql_connect('localhost','root','');
if(!$con)
{
die('mysql data base not connected'.mysql_error());		
}
$sdb=mysql_select_db('database');
if(!$sdb)
{
die('database not selected'.mysql_error());		
}
include("include/functions.php");
?>