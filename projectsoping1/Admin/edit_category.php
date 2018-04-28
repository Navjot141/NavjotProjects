<?php
include 'config_dbase.php';
$id=$_REQUEST['id'];
$sqlf="select * from category where id='$id'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);
//print_r($res);
if(isset($_REQUEST['submit']))
{
$fg=1;
$id=$_REQUEST['hid'];
$hname=$_REQUEST['hname'];
$name=$_REQUEST['name'];
$sqlf="select * from category where name='$name'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);
if($name=='')
{
$msg="Please enter name";
$response="error";
}
else if($fetch['name']!='')
{
$msg='name all ready exist';
$response="error";
$fg=2;
}
elseif($fg==1)
{	
$sql="UPDATE category SET name='".$name."' where id='$id'";	
$qr=mysql_query($sql);
if($qr)
{
$msg="record updated";
$response="success";
}
else
{
$msg="record not updated";die(mysql_error());
}			
}
$sqlf="select * from category where id='$id'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/addeditcategory.css" rel="stylesheet" type="text/css" />
<script>
function startTime()
{
var today=new Date();
 months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
var d=today.getDate();
 var month=today.getMonth();
 var day = today.getDay();
 days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
var year = today.getFullYear();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);

document.getElementById('txt').innerHTML=' '+days[day]+' '+d+' '+months[month]+' '+year+'   '+h+':'+m+':'+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
</head>
<body onload="startTime()" style="background-color:#ededed">
<div align="center">
<div class="outerdiv">
<div class="innerdiv">
<!--------------------------------header starts--------------------->
<div class="header">
<?php include 'header.php'; ?>
</div>
<!--------------------------------header ends----------------------->
<div class="content" >
<?php include 'ui.php';; ?>

<div class="content1b">
<form method="post" >
<table border="0" vspace="100px;" style="margin-top:100px;">

<tr>

<td>



</td>

<td height="60px;"><span style="font-size:20px"><div style="border:0px solid blue; height:20px; width:250px;">
<?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>


</div><u>Category</u></span>
</td>
</tr>
<tr >
<td width="100px" ><span style="font-size:20px">Name *</span>
</td>
<td>
<input type="hidden" value="<?php echo $id; ?>" name="hid" />

 <input type="hidden" value="<?php echo $fetch['name'];?>" name="hname"/> 
<input type="text" name="name" value="<?php echo $fetch['name']?>" class="textbox" />

</td>
</tr>
<tr >
<td colspan="2">
<input type="submit" name="submit" value="submit" class="submit" />
<input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managecategory.php'" />
</td>
</tr>

</table>
</form>

</div>
</div>
</div></div></div></div></body></html>



