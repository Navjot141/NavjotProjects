<?php
error_reporting(0);
include 'config_db.php';
$id=$_GET['id'];
$do=$_GET['do'];
if($_GET['do'] =='edit'){
	$sql2="SELECT * FROM slider where id='".$id."'";
	$exec2=mysql_query($sql2);
	$fetch=mysql_fetch_assoc($exec2);
	$dvar['title']=$fetch['title'];
    $dvar['textarea']=$fetch['textarea'];
    $name=$fetch['image'];
	//echo $fetch['image'];
}
if($_POST['submit']=='submit')
{
 $dvar['title']=trim($_POST['title']);
 $dvar['textarea']=mysql_real_escape_string($_POST['textarea']);
 $name = $_FILES['image']['name'];
 $type = $_FILES['image']['type'];
 $size = $_FILES['image']['size'];
 $tmp = $_FILES['image']['tmp_name'];
//print_r($name);
  if($dvar['title']==''){
	$msg="Error:ENTER title";
	$response="error";
  }
   else{
	   // run when edit invoked
			if($_GET['do']=='edit'){
			$sql3="SELECT * FROM slider where id='".$id."'";
			$exec3=mysql_query($sql3);
			$fetch=mysql_fetch_assoc($exec3);
			if($fetch['image'] <> "" && $name <> "")
			{
				unlink('../pics/'.$fetch['image']);
			     $sql="UPDATE slider SET image='".$name."'  where id='".$id."'";
				 $exec=mysql_query($sql);
				 if($exec)
				 {
				 $upload = move_uploaded_file($tmp, '../pics/'.$name);
				 }
				 
			}
			 elseif($fetch['image']=="" && $name <> ""){
				 
				  $sql="UPDATE slider SET image='".$name."'  where id='".$id."'";
				  $exec=mysql_query($sql);
				  if($exec){$upload = move_uploaded_file($tmp, '../pics/'.$name);}
				 }
				 else{}
 				 $sql="UPDATE slider SET title='".$dvar['title']."',textarea='".$dvar['textarea']."' where id='".$id."'";
	         }
			else{ $sql="INSERT INTO slider(title,textarea,image,status,time)Values('".$dvar['title']."','".$dvar['textarea']."','".$name."','1','".time()."')";}	
			 $exec=mysql_query($sql)or die(mysql_error());
			 if($exec){
				 if($name!=''){ $upload = move_uploaded_file($tmp, '../pics/'.$name);}
				 $msg="Inserted";
				 $response="success";
			 }	
			 else{$msg="Not inserted ".mysql_error(); }
   }
}
if($_GET['do'] =='edit' && $msg <> ""){
	$sql2="SELECT * FROM slider where id='".$id."'";
	$exec2=mysql_query($sql2);
	$fetch=mysql_fetch_assoc($exec2);
	$dvar['title']=$fetch['title'];
    $dvar['textarea']=$fetch['textarea'];
    $name=$fetch['image'];
	$fetch['title'];
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
<body onload="startTime()">
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
              <form method="post" action="<?php  echo $_SERVER['PHP_SELF']?>?do=<?php echo $do ;?>&id=<?php echo $id;?>"enctype="multipart/form-data">
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
                  <td><input type="text" name="title" value="<?php echo $dvar['title']?>" class="textbox" /></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;"> Description</span></td>
                  <td><textarea name="textarea" id="address" rows="3" cols="15"  placeholder="Enter description" style="width:245px; height:55px; border-radius:4px;" ><?php echo $dvar['textarea']?></textarea></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;">
                    <label for="file">Filename:</label>
                    </span></td>
                  <td><input type="file" name="image">
                    <img src="<?php if($name <> ""){echo '../pics/'.$name;}else{echo '../pics/images.jpg';} ?>" height="50" width="50"></td>
                </tr>
                <tr >
                  <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
                    <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managesubcategory.php'" /></td>
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