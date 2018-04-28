<?php
session_start();
include 'config_dbase.php';
include 'config.php';
if($_POST["submit"]=='Login')
{
	//echo "hiiii";
    $dvar['email']=trim($_POST['email']);
	$dvar['password']=trim($_POST['password']);
	//echo "<pre>";
	//print_r($_POST);
	//die;
	if($dvar['email']=='')
	{
		$msg="ERROR:Please enter emailid";
		 $response="error";
	}
	
else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $dvar['email']))
	{
		$msg="email id format not correct";
		 $response="error";
	}
	else if($dvar['password']=='')
		{
		$msg="Error:Please Enter password";
		 $response="error";
		}
	else
	{
	
		 $sql_session="SELECT * FROM users where email='".$dvar['email']."' AND password='".$dvar['password']."'";
		$exec_session=mysql_query($sql_session)or die(mysql_error());
		 $num_session=mysql_num_rows($exec_session);
		// echo $num_session;
		if($num_session > 0)
		{ 
		 
		  $fetch=mysql_fetch_assoc($exec_session);
		  //print_r($fetch);
		  $_SESSION['user']=$fetch['id'];
		  echo $_SESSION['user'];
		  header("Location:my_account.php");   
		 exit();
		}
		
	}}
	

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Account Login - Polishop eCommerce HTML Template</title>
<?php include('include/head.php');?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
   <?php include('include/header.php');?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
   <?php include('include/left_login.php');?>
   </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.php">Home</a> » <a href="#">Account</a> » <a href="login.php">Login</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Account Login</h1>
        <div class="login-content">
          <div class="left">
            <h2>New Customer</h2>
            <div class="content">
              <p><b>Register Account</b></p>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <a class="button" href="register.php">Continue</a></div>
          </div>
          <div class="right">
            <h2>Returning Customer</h2>
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
              <div class="content">
                <p>I am a returning customer</p>
                <div style="border:0px solid black; width:auto; height:auto; font-size:12px;"><?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
						?></div><br>
                <b>E-Mail Address:</b><br>
                <input type="text" value="<?php echo $dvar['email']?>" name="email">
                <br>
                <br>
                <b>Password:</b><br>
                <input type="password" value="<?php echo $dvar['password']?>" name="password">
                <br>
                <a href="forget_pass.php">Forgotten Password</a><br>
                <br>
                <input type="submit" class="button" value="Login" name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
  <!--Footer Part End-->
</div>
</body>
</html>