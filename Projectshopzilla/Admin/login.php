<?php
$alf= range("A","Z");
$num=range(1,350);
$alfs=range("a","z");
$sc=array("@","%","&","*");
$color=array('#C00','#66C','#FC3','#F0C','#063');
$fs=range(20,30);
$fst=array('Mistral','French Script MT','Matura MT Script Capitals','Brush Script Std','Algerian','Bauhaus 93','Blackadder ITC','Curlz MT','Snap ITC');
$alfr=array_rand($alf);
$alfsr=array_rand($alfs);
$numr=array_rand($num);
$scr=array_rand($sc);
$colorr=array_rand($color);
$fsr=array_rand($fs);
$fstr=array_rand($fst);
$res=$alf[$alfr].$num[$numr].$alfs[$alfsr].$sc[$scr];
?>
<?php 
error_reporting('ERROR');
include 'config_dbase.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
$ver=$_POST['ver'];
$hi=$_POST['hi'];
if(isset($_REQUEST['login']))
{
if($_POST['user']=='')
	{
		$msg="Please Enter Username";
	}
	elseif($_POST['pass']=='')
	{
		$msg="Please Enter Password";
	}
	else
	{
$sql="SELECT * FROM login WHERE username='$user'and password='$pass'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
//echo $count;
if($count==1){ 
header("location:loginnext.php");
}
else {
$msg= "Wrong Username or Password";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ecommerce site</title>
<link href="login1.css" rel="stylesheet" type="text/css" />
</head>
<!--<html>
<head>
<title>
Ecommerce site
</title>
<link href="login1.css" rel="stylesheet" type="text/css" />
</head>-->
<body>
<div align="center">
<div class="outerdiv">
<div class="innerdiv">
<div class="header">
<div class="header1"></div>
<div class="header2"> <span>ADMIN PANEL</span></div>

<div class="content">
 <div class="contentmsg"  > 
               <?php
if(isset($msg) && $msg <> ""){
	echo "<div style='color:red; font-size:17px; '>".$msg."</div>";
}
?>
              </div>
<div class="content1">
<div class="content1a">
<img src="images/image_11.png" style="margin-top:20px; margin-left:60px; " />
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']  ?>">
<div class="conteny1b">
Username
<input type="text" name="user"  value="<?php echo $_POST['user'] ?>" class="box" >
</div>
</div>
<div class="content1">
<div class="content1a">
<img src="images/lock1.jpg" style="margin-top:20px; margin-left:60px; " />
</div>
<div class="conteny1b">
Password
<input type="password" name="pass" value="<?php echo $_POST['pass'] ?>" class="box1" >
</div>
</div>
<div class="content1">
<div class="conteny1c">
Verification
<input type="text" name="ver" class="box1" >
<input type="hidden" value="<?php echo $res;?>" name="hi"><br>
</div>
</div>
<div class="content1">
<div class="content1d" style="color:<?php  echo $color[$colorr]?>; font-size:<?php echo $fs[$fsr]?>; font-family:<?php echo $fst[$fstr]?>"><?php  echo $res;
?>

</div>
</div>

<input type="submit" name="login" value="login" style="margin-left:240px; border:1px solid black; border-radius:4px;width:80px;
height:30px; margin-top:20px; color:#FFF; background-color:#06F; font-size:14px;"/>
</form>
<hr style=" width:520; ">
<span style="text-align:left; color:#CCC;">Powerered by solitaire infosys inc limited</span>
</div>
</div>
</div>
</div>
</div>
</body>
</html>