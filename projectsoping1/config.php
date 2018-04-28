<?php
session_start();
if(isset($_SESSION['user']))
{
	$id=$_SESSION['user'];
	//echo $id;
	 $sql = "SELECT * FROM users where id='".$id."'";
	$exec = mysql_query($sql) or die(mysql_error());
	$num=mysql_num_rows($exec);
	if($num>0)
	{ 
	$user_status ='1';
	$fetch_u=mysql_fetch_assoc($exec);  
	}
}
else
{
$user_status ='';	
}
  ?>