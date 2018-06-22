<?php
error_reporting(0);
include 'config_db.php';
 $id=$_GET['id'];
 $sql="Select * FROM category where id='$id'";
 $exec=mysql_query($sql);
 $num=mysql_num_rows($exec);
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
<body onload="startTime()"  style="background-color:#ededed">
<div align="center">
<div class="outerdiv">
<div class="innerdiv">
<div class="header">
<?php include 'header.php'; ?>
<div class="content" >
<?php include 'ui.php'; ?>
<div class="content1b">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?do=<?php echo $do;?>&id=<?php echo $id;?>">
<table border="0" style="margin-top:100px; align:left;">

<tr>



<td colspan="2"><span style="font-size:20px">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<u>Category</u></span>
</td>
</tr>
   
  <?php $i=0;
      if($num==0){
     echo '<div style="width: 235px;font-weight: bold;padding-top: 9px;padding-left: 300px;float: left;font-size: 14px;color: #333;"> No request found </div>';
    }
    else{
		$i=0;
     while($fetch = mysql_fetch_assoc($exec)){
		 $val2=$fetch;
     ?>

<tr >
<td width="200px" ><span style="font-size:20px">Category name:</span>
</td>
<td width="200px;"><span style="font-size:20px">
<?php echo $val2['name']?></span>
</td>
</tr>
<tr >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<td height="30px"><span style="font-size:20px">Status :</span>
</td>
<td><span style="font-size:20px; color:#0F3;">
<?php if($val2["status"] ==1){ echo "<span style='color:green'>Active</span>";} else{ echo "<span style='color:red'>Inactive</span>";}  ?></span>
</td>
</tr>
<tr>
<td colspan="2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Close" value="Close" class="cancel"  onclick="window.location='managecategory.php'" />
</td>
</tr>
   <?php $i++;}}?>
</table>
</form>

</div>
</div>
</div></div></div></div></body></html>