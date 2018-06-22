<?php
error_reporting(0);
include 'config_dbase.php';
$id=$_GET['id'];
$do=$_GET['do'];
$fl=1;
$sqlf="select * from slider where id='$id'";
$ql1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($ql1);
if($_POST['submit']=='submit')
{
$id=$_REQUEST['hid'];
$htitle=$_REQUEST['htitle'];
 $dvar['title']=$_POST['title'];
 $dvar['textarea']=$_POST['textarea'];
    $name=$_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $tmp=$_FILES['image']['tmp_name'];
	$sr=explode('.',$name);
$path="../uploadimage/".time().".".$sr[1];
$image_name=time().".".$sr[1];
//echo $image_name;
$sqlf="select title from slider where title='$title'";
$ql1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($ql1);
  if($dvar['title']==''){
	$msg="Error:ENTER title";
	$response="error";
  }
/*  elseif($htitle!=$title)
{
if($dvar['title']!='')
{	
$msg='Error: name all ready exist....';
$response="error";
$fl=2;
}
}*/
if($fl==1)
{
if($name=='')
{		
$sql="update slider set title='".$dvar['title']."',textarea='".$dvar['textarea']."' where id='$id'";
$qr=mysql_query($sql);
if(!$qr) die('not update slider'.mysql_error());		
//move_uploaded_file($imgetmp,$path);
}
else
{
//echo "yes";
$sqlf="select * from slider where id='$id'";	
$ql1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($ql1);
$image_namep=$fetch['image'];	
echo $fetch['image'];
$sql="update slider set title='".$dvar['title']."',textarea='".$dvar['textarea']."',image='$image_name' where id='$id'";
unlink('../uploadimage/'.$image_namep);
$qr=mysql_query($sql);
if(!$qr)
{
die(mysql_error());
}
//echo '../uploadimage/'.$image_namep;
move_uploaded_file($tmp,'../uploadimage/'.$image_name);
header("location:manage_slider.php");	
}
}
/*$sqlf="select * from slider where id='$id'";
$qr1=mysql_query($sqlf);
$fetch=mysql_fetch_assoc($qr1);*/
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if($msg!=''){?>
<meta http-equiv="refresh" content="3; URL=manage_slider.php">
<?php }?>
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
<body onload="startTime()" style="background-color:#ededed"">
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
        <div class="header1">
          <div class="headera"><a href="images/image_11.png"></a></div>
          <div class="headerb"> ADMIN PANEL</div>
        </div>
        <div class="header2">
          <div class="header2a">
            <div class="header2a1"><a href= "javascript:void(0);" style="color:#000;">Update profile</a></div>
            <div class="header2a2"><a href= "#" style="color:#000;">Logout</a></div>
          </div>
          <div class="header2a3" id="txt"> </div>
        </div>
        <div class="content" >
          <div class="content1a">
            <ul >
              <li><a href="#">Home</a>
                <ul>
                  <li><a href="managecategory.php"><span style="width:120px; height:40px; font-size:21px;">Manage category</span> </a></li>
                  <li><a href="managesubcategory.php"><span style=" font-size:19px;">Manage Sucategory</span></a></li>
                  <li><a href="manageproduct.php"><span style=" font-size:21px;">Manage Products</span></a></li>
                </ul>
              </li>
              <li><a href="#">SLider</a>
                <ul>
                  <li><a href="manage_slider.php">Manage slider</a></li>
                </ul>
              </li>
              <li><a href="#">Blogs</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="content1b">
            <table border="0" vspace="100px;" style="margin-top:100px;">
              <form method="post" enctype="multipart/form-data">
                <tr>
                  <td colspan="2" height="60px;" ><?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?></td>
                </tr>
                <tr >
                  <td width="100px" ><span style="font-size:20px;">Title</span></td>
                  <td>
                  <input type="hidden" value="<?php echo $fetch['id']?>" name="hid"/>
                  <input type="hidden" value="<?php echo $fetch['title'];?>" name="htitle"/>
                  <input type="text" name="title" value="<?php echo $fetch['title']?>" class="textbox" /></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;"> Description</span></td>
                  <td><textarea name="textarea" id="address" rows="3" cols="15"  placeholder="Enter description" style="width:245px; height:55px; border-radius:4px;" ><?php echo $fetch['textarea']?></textarea></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;">
                    <label for="file">Filename:</label>
                    </span></td>
                  <td><input type="file" name="image" multiple="multiple">
                     <img src="../uploadimage/<?php echo $fetch['image'];?>" height="100px" width="100px"  />
                <tr >
                  <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
                    <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='manage_slider.php'" /></td>
                </tr>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>