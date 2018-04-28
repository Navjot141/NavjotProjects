<?php
error_reporting(0);
include 'config_dbase.php';
if($_POST['submit']=='submit')
{
	
	$dvar['npassword']=$_POST['npassword'];
	//echo $_POST['npassword'];
	$dvar['cpassword']=$_POST['cpassword'];
    $dvar['copassword']=$_POST['copassword'];
	 $sql="SELECT * FROM login ";
	$exec=mysql_query($sql) or die(mysql_error()) ;
	$num=mysql_num_rows($exec);
	//print_r($num);
    $fetch=mysql_fetch_assoc($exec);
	
		if($dvar['cpassword']=='')
	     {
		$msg="Please enter Current password";
	     }
		elseif($dvar['cpassword']==$fetch['password'])
		{
			if($dvar['npassword']=='')
			{
				$msg="Please enter new password";
			}
			elseif($dvar['copassword']=='')
			{
				$msg="Please confirm password";
			}
			elseif($dvar['npassword']==$dvar['copassword'])
		    {
		  $sql2="UPDATE login SET password='".$dvar['npassword']."' where id='1'";
		  $exec2=mysql_query($sql2) or die(mysql_error());
		  $msg="Password changed";
             }
			else
			{$msg="Password do not match";}
		}
		else
		{
			$msg="Wrong password";
		}
}






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/updateprofile.css" rel="stylesheet" type="text/css" />
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
<body  onload="startTime()" style="background-color:#ededed" >
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
         <?php include('include/header.php');?>
        <div class="content" >
           <?php include('include/ui.php');?>
          <div class="content1b">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
              <table border="0" vspace="50px">
               <tr>
               <td>
               </td>
                  <td  > <?php
if(isset($msg) && $msg <> ""){
	echo "<div style='color:red; font-size:17px; '>".$msg."</div>";
}
?></td>
                </tr>
                <tr>
                  <td width="260px" colspan="2"><span style="color:#000; font-size:18px;">* Required fields</span></td>
                </tr>
                <tr>
                  <td width="230px" height="40px" ><span style="color:#000; font-size:20px;"><b>Current Password:</b></span></td>
                  <td width="380px" height="50px"><input type="password" name="cpassword" class="textbox" value="<?php echo $dvar['cpassword']?>" />
                    <span style="color:#F00;">*</span></td>
                </tr>
           
                <tr>
                  <td width="230px" height="70px" ><span style="color:#000; font-size:20px;"><b>New Password:</b></span></td>
                  <td width="340px" height="50px"><input type="password" name="npassword" class="textbox" value="<?php echo $dvar['npassword']?>" />
                    <br />
                    <span style="font-size:17px">(Leave blank ,if u dont want to change password)</span></td>
                </tr>
                <tr>
                  <td width="230px" height="70px" ><span style="color:#000; font-size:20px;"><b>Confirm Password:</b></span></td>
                  <td width="340px" height="50px"><input type="password" name="copassword" class="textbox" value="<?php echo $dvar['copassword']?>" />
                    <br />
                    <span style="font-size:17px">(Leave blank, if u dont want to change password)</span></td>
                </tr>
                <tr>
                  <td width="260px" colspan="2"><input type="submit" value="submit" name="submit" class="submit" /></td>
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