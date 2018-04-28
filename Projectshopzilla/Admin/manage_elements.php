
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Manage About Us</title>
<link href="CSS/addeditcategory.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
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
<div class="header">
<?php include 'header.php';; ?>
<div class="content" >
<div class="content1a">
<?php include 'ui.php';; ?>
</div>
<div class="content1b">
<form method="post" >
<table border="0" vspace="30px;" >
<tr>
<td colspan="2">

</td>
</tr>
<tr>

<td>



</td>

<td height="60px;"><span style="font-size:20px"><div style="border:0px solid blue; height:20px; width:250px;">


</div><u>About Us</u></span>
</td>
</tr>
<tr >
<td width="100px" align="right" ><span style="font-size:20px">Title *</span>
</td>
<td>
<input type="text" name="title" class="textbox" />
</td>
</tr>
<tr>
<td width="120px"  align="right"><span style="font-size:20px">Description*</span>
</td>
<td>
<textarea class="ckeditor" name="description"></textarea></td>
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



