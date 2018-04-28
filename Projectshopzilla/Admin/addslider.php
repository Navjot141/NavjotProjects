<?php
error_reporting(0);
include 'config_dbase.php';
$id=$_GET['id'];
$do=$_GET['do'];
if($_POST['submit']=='submit')
{
 $dvar['title']=$_POST['title'];
 $dvar['textarea']=$_POST['textarea'];
$name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $tmp=$_FILES['image']['tmp_name'];
	
	$sr=explode('.',$name);

$path="../uploadimage/".time().".".$sr[1];
$image_name=time().".".$sr[1];
//echo $image_name;
  if($dvar['title']==''){
	$msg="Error:ENTER title";
	$response="error";
  }
   else{
	   
			 $sql="INSERT INTO slider(title,textarea,image,status,time)Values('".$dvar['title']."','".$dvar['textarea']."','".$image_name."','1','".time()."')";}	
			 $exec=mysql_query($sql)or die(mysql_error());
			 if($exec){
				 if($name!=''){
			   $upload = move_uploaded_file($tmp, $path);}
				 $msg="Inserted";
				 $response="success";
			 }	
			 else{$msg="Not inserted ".mysql_error(); }
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
<body onload="startTime()"  style="background-color:#ededed">
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
         <?php include 'header.php'; ?>
        <div class="content" >
        <?php include'ui.php'; ?>
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
                    </td>
                </tr>
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