<?php
include 'config_dbase.php';
$id=$_GET['id'];
$do=$_GET['do'];
if($_GET['do'] =='edit'){
	$sql2 = "SELECT * FROM contact where id='".$id."'";
	$exec2 = mysql_query($sql2);
	$fetch = mysql_fetch_assoc($exec2);
	$dvar['address'] = $fetch['address'];
	$dvar['phoneno'] = $fetch['phoneno'];
	$dvar['fax'] = $fetch['fax'];
	$dvar['email'] = $fetch['email'];
	//echo $fetch['description'];
	
}
if($_POST['submit']=='submit')
{
	
	$dvar['address'] = trim($_POST['address']);
	$dvar['phoneno'] = trim($_POST['phoneno']);
	$dvar['fax'] = trim($_POST['fax']);
	$dvar['email'] = trim($_POST['email']);
	if($dvar['address']=='')
	{
		$msg="Please enter address";
		$response="error";
	}
	elseif($dvar['phoneno']=='')
	{
		$msg="Please enter phoneno";
		$response="error";
	}
	elseif(!strlen($dvar['phoneno'] >'10'))
	{
		$msg="Please enter valid phone no";
		$response="error";
	}
	elseif($dvar['fax']=='')
	{
		$msg="Please enter fax";
		$response="error";
	}
	elseif($dvar['email']=='')
	{
		$msg="Please enter email";
		$response="error";
	}
	else
	
	{
		if($_GET['do'] =='edit'){
	   			 $sql="UPDATE contact SET address='".$dvar['address']."' ,phoneno='".$dvar['phoneno']."',fax='".$dvar['fax']."',email='".$dvar['email']."' where id='".$id."'";
			}
			else
			{
			 $sql="INSERT into contact(address,phoneno,fax,email,status,time)Values('".$dvar['address']."','".$dvar['phoneno']."','".$dvar['fax']."','".$dvar['email']."','1','".time()."')";
			
		}
		$exec=mysql_query($sql) or die(mysql_error());
		if($exec)
		{
		
		$msg="Success";
		$response="success";
			}
		else
		
		{
			$msg="Error";die(mysql_error());
			$response="error";
		
			}
		}
}

if($_GET['do'] =='edit' && $msg <> "" ){
	$sql2="SELECT * FROM contact where id='".$id."'";
	$exec2=mysql_query($sql2);
	$fetch=mysql_fetch_assoc($exec2);
	$dvar['address'] = $fetch['address'];
	$dvar['phoneno'] = $fetch['phoneno'];
	$dvar['fax'] = $fetch['fax'];
	$dvar['email'] = $fetch['email'];
}
?>

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
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?do=<?php echo $do;?>&id=<?php echo $id;?>&page=<?php echo $page;?>">
              <table border="0" vspace="30px;" >
                <tr>
                  <td colspan="2"></td>
                </tr>
                <tr>
                  <td></td>
                  <td height="60px;"><span style="font-size:20px">
                    <div style="border:0px solid blue; height:20px; width:250px;">
                      <?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>
                    </div>
                    <u>About Us</u></span></td>
                </tr>
                <tr >
                  <td width="100px" align="right" ><span style="font-size:20px">Address</span></td>
                  <td><textarea name="address" style="width:240px; border-radius:4px;"><?php echo $dvar['address'];?></textarea></td></td>
                </tr>
                  <tr >
                  <td width="100px" align="right" ><span style="font-size:20px">Phone no</span></td>
                  <td><input type="text" name="phoneno" value="<?php echo $dvar['phoneno']?>" class="textbox" /></td>
                </tr>
                  <tr >
                  <td width="100px" align="right" ><span style="font-size:20px">Fax</span></td>
                  <td><input type="text" name="fax" value="<?php echo $dvar['fax']?>" class="textbox" /></td>
                </tr>
                  <tr >
                  <td width="100px" align="right" ><span style="font-size:20px">Email</span></td>
                  <td><input type="text" name="email" value="<?php echo $dvar['email']?>" class="textbox" /></td>
                </tr>
              
                <tr >
                  <td colspan="2"><input type="submit" name="submit" value="submit" class="submit1" />
                    <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managecategory.php'" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
