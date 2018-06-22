<?php
error_reporting(0);






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/updateprofile.css" rel="stylesheet" type="text/css" />
</head>
<body >
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
<div class="header2a1"><a href= "update.php" style="color:#000;">Update profile</a></div>
<div class="header2a2"><a href= "login.php" style="color:#000;">Logout</a></div>
</div>
<div class="header2a3"> </div>
</div>
<div class="content" >
<div class="content1a">
<div class="content1a1"></div>
<div class="content1a1"></div>
<div class="content1a1"></div>
</div>
<div class="content1b">
<table border="0" vspace="50px">
<tr>
<td width="260px" colspan="2"><span style="color:#000; font-size:18px;">* Required fields</span></td>
</tr>
<tr>
<td width="230px" height="40px" ><span style="color:#000; font-size:20px;"><b>Current Password:</b></span></td>
<td width="380px" height="50px"><input type="password" name="cpassword" class="textbox" value="<?php echo $dvar['cpassword']?>" />
<span style="color:#F00;">*</span></td>
</tr>
<tr>
<td width="230px" height="70px" ><span style="color:#000; font-size:20px;"><b>New User Id:</b></span></td>
<td width="340px" height="50px"><input type="text" name="nuser" class="textbox" value="<?php echo $dvar['nuser']?>" />
<br /><span style="font-size:17px">(Leave blank ,if u dont want to change userid)</span> 
</td>
</tr>
<tr>
<td width="230px" height="70px" ><span style="color:#000; font-size:20px;"><b>New Password:</b></span></td>
<td width="340px" height="50px"><input type="password" name="npassword" class="textbox" value="<?php echo $dvar['npassword']?>" />
<br /><span style="font-size:17px">(Leave blank ,if u dont want to change password)</span> 
</td>
</tr>
<tr>
<td width="230px" height="70px" ><span style="color:#000; font-size:20px;"><b>Confirm Password:</b></span></td>
<td width="340px" height="50px"><input type="password" name="copassword" class="textbox" value="<?php echo $dvar['copassword']?>" />
<br /><span style="font-size:17px">(Leave blank, if u dont want to change password)</span> 
</td>
</tr>
<tr>
<td width="260px" colspan="2"><input type="submit" value="Submit" name="submit" class="submit" /></td>
</tr>

</table>


</div>
</div>
</div>



</div>
</div>
</div> 
</body>
</html>