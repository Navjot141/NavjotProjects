<?php
include('config_dbase.php'); 
$id=$_REQUEST['id'];
$fl=1;
$sqlf="select * from category where id='$id'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);
//print_r($fetch);
if(isset($_REQUEST['submit']))
{
$id=$_REQUEST['hid'];
//$hmobile=$_REQUEST['hmobile'];
$name=$_REQUEST['name'];
//$mobile_nomber=$_REQUEST['mobile_nomber'];
//$date_join=$_REQUEST['date_join'];
//$sqlf="select mobile_nombar from emp where mobile_nombar='$mobile_nomber'";
//$qr1=mysql_query($sqlf);
//$res=mysql_fetch_assoc($qr1);
if($name=='')
{
echo 'fill all data.........';		
}
//elseif($hmobile!=$mobile_nomber)
//{
//if($res['mobile_nombar']!='')
//{
//echo 'mobile_nomber all ready exest....';
//$fl=2;
//}
//}
elseif($fl==1)
{	
$sql="update category set name='$name' where id='$id'";  	
$exec=mysql_query($sql) or die(mysql_error());
		if($exec)
		{
		
		$msg="record updated";
		$response="success";
		
			}
		else
		
		{
			
			$msg="record not updated";die(mysql_error());
		
			}
		}
			
//echo 'user edit........';
header('location:managecategory.php?do=edit');		
}
$sqlf="select * from category where id='$id'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);
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
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+":"+m+":"+s;
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
<body onload="startTime()" >
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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?do=<?php echo $do;?>&id=<?php echo $id;?>">
<table border="0" vspace="100px;" style="margin-top:100px;">
<tr>
<td colspan="2">

</td>
</tr>
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
<input type="hidden" value="<?php echo $id;?>" name="hid"/>
<input type="text" name="name" value="<?php echo $fetch['name'];?>" class="textbox" />
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



