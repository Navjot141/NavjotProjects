<?php
include 'config_dbase.php';
$name=$_REQUEST['name'];
$id=$_REQUEST['id'];
$sqls1="select * from subcategory";
$execs1=mysql_query($sqls1);
$fetch=mysql_fetch_assoc($execs1);
//$dvar['name']=$fetch['name'];
$dvar['category']=$fetch['category'];
//print_r( $dvar['category']);
$sql="SELECT id,name FROM category where status='1' ORDER BY name ASC " ;
$exec=mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($exec);
if(isset($_REQUEST['submit']))
{
	
     $dvar['category']=($_POST['category']);
if($name=='')
{
$msg="Please enter name";
$response="error";
}
else
{
$sql7="INSERT into subcategory(category,name,status,time)Values('".$dvar['category']."','".$name."','".'1'."','".time()."')";
$exec7=mysql_query($sql7) or die(mysql_error());
	if($exec7)
		{
		
		$msg="record inserted";
		$response="success";
		
			}
		else
		
		{
			
			$msg="record not inserted";		
		}
	}
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
<div class="header">
 <?php include 'header.php'; ?>
</div>
<div class="content" >
<?php include 'ui.php'; ?>
<div class="content1b">
<table border="0" vspace="100px;" style="margin-top:100px;">
  <form method="post">
    <tr>
      <td colspan="2" height="60px;" ><div style="border:0px solid blue; height:20px; width:250px; margin-left:105px;">
          <?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>
        </div>
        <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Select Subcategory</u></span></td>
    </tr>
    <tr>
      <td><span style="font-size:20px;">Category*</span></td>
      <td><select style="width:250px; border-radius:8px; height:28px; border:1px solid #CCC; outline:none;" name="category">
          <?php while($fetch1=mysql_fetch_assoc($exec)) {?>
          <option value="<?php echo $fetch1["id"];?>"<?php if( $dvar['category']==$fetch1["id"]) { echo 'selected=selected';}?>><?php echo $fetch1["name"];?></option>
          <?php }?>
        </select></td>
    </tr>
    <tr >
      <td width="100px" ><span style="font-size:20px;">Name *</span></td>
      <td><input type="text" name="name" value="<?php echo $name?>" class="textbox" /></td>
    </tr>
    <tr >
      <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
        <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managesubcategory.php'" /></td>
    </tr>
  </form>
</table>
</div></div></div></div></div></div></body></html>