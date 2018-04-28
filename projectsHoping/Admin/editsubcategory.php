<?php
include 'config_dbase.php';
$id=$_REQUEST['id'];
$sqls2="select * from subcategory where id='$id'";
$qr1=mysql_query($sqls2);
$fetch=mysql_fetch_assoc($qr1);
//print_r($res);
$dvar['name']=$fetch['name'];
$dvar['category']=$fetch['category'];

$sql="SELECT id,name FROM category where status='1' ORDER BY name ASC " ;
$exec=mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($exec);
if(isset($_REQUEST['submit']))
{
$fg=1;
$id=$_REQUEST['hid'];
$name=$_REQUEST['name'];

 $dvar['category']=($_POST['category']);
 $dvar['name']=($_POST['name']);
$sqlf="select * from subcategory where name='$name'";
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
$sql7="UPDATE subcategory SET category='".$dvar['category']."',name='".$dvar['name']."' where id='".$id."'";
$qr=mysql_query($sql7);
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
$sqls2="select * from subcategory where id='$id'";
$qr1=mysql_query($sqls2);
$fetch=mysql_fetch_assoc($qr1);

$dvar["name"]=$fetch['name'];
	 $dvar['category']=$fetch['category'];
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
<!-------------------------------header starts----------------->
<div class="header">
<div class="header1">
  <div class="headera"><a href="images/image_11.png"></a></div>
  <div class="headerb"> ADMIN PANEL</div>
</div>
<div class="header2">
  <div class="header2a">
    <div class="header2a1"><a href= "#" style="color:#000;">Update profile</a></div>
    <div class="header2a2"><a href= "#" style="color:#000;">Logout</a></div>
  </div>
  <div class="header2a3" id="txt"> </div>
</div>
<!----------------------------header ends------------------------>
<!----------------------------ui starts------------------------>
<div class="content" >
<?php include 'ui.php'; ?>
<!----------------------------ui ends------------------------>

<div class="content1b">
<table border="0" vspace="100px;" style="margin-top:100px;">
  <form method="post">
    <tr>
      <td colspan="2" height="60px;" ><div style="border:0px solid blue; height:20px; width:250px; margin-left:105px;">
     <!----------------------------msg starts------------------------>
          <?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>
<!----------------------------msg ends------------------------>
        </div>
        <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Select Subcategory</u></span></td>
    </tr>
    <tr>
      <td><span style="font-size:20px;">Category*</span></td>
      <td><select style="width:250px; border-radius:8px; height:28px; border:1px solid #CCC; outline:none;" name="category">
          <?php while($fetch1=mysql_fetch_assoc($exec)) {?>
          <option value="<?php echo $fetch1["id"];?>" <?php if( $dvar['category']==$fetch1["id"]) { echo 'selected=selected';}?>><?php echo $fetch1["name"];?></option>
          <?php }?>
        </select></td>
    </tr>
    <tr >
      <td width="100px" ><span style="font-size:20px;">Name *</span></td>
      <td>
      <input type="hidden" value="<?php echo $id; ?>" name="hid" />

 <input type="hidden" value="<?php echo $fetch['name'];?>" name="hname"/> 
      <input type="text" name="name" value="<?php echo $fetch['name']?>" class="textbox" /></td>
    </tr>
    <tr >
      <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
        <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managesubcategory.php'" /></td>
    </tr>
  </form>
</table>
</div></div></div></div></div></div></body></html>