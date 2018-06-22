<?php
//include 'init.php';
include 'config_dbase.php';
include 'config.php';
include 'include/smtpgmail.php';
$id=$_GET['id'];
$do=$_GET['do'];
   // $sql="SELECT * FROM users  ";
	//$exec=mysql_query($sql) or die(mysql_error()) ;
	//$num=mysql_num_rows($exec);
	//print_r($num);
   
//echo $id;
if($_POST['submit']=='Submit')
{
	//echo "hii";
	$dvar['email']=$_POST['email'];

    $sql="SELECT * FROM users  where email='".$dvar['email']."'";
	$exec=mysql_query($sql) or die(mysql_error()) ;
	$num=mysql_num_rows($exec);
	$fetch=mysql_fetch_assoc($exec);
	//print_r($fetch['password']);
	if($dvar['email']=='')
	   {
		$msg="Please enter email ";
		$response="error";
	     }
		elseif($num==0)
		{	
		$msg="This email id not exists in our records";
		$response="error";
		 }
		else
			{ 
			if(send_mail($dvar['email'],"navjotnagra13@gmail.com","navjot","Your password is",$fetch['password']))
			{
				
				$msg="Mail have been sent to your emailid along with password";
			 $response="success";
		    }
			else
			{ 
				$msg=" mail not sent";
				$response="error";
			}
}
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Register - Polishop eCommerce HTML Template</title>
<?php include('include/head.php');?>

</head>
<?php if($msg <> "" && $response == "success"){?>
<meta http-equiv="refresh" content="3; URL=forget_pass.php">
<?php }?>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
  <?php include('include/header.php');?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <div id="column-left">
        <!--Account Links Start-->
        <div class="box">
          <div class="box-heading">Account</div>
          <div class="box-content">
            <ul class="list-item">
              <li><a href="login.php">Login</a></li>
              <li><a href="regi1.php">Register</a></li>
              <li><a href="forget_pass.php">Forgotten Password</a></li>
              <li><a href="my_account.php">My Account</a></li>
            <!--  <li><a href="#">Wish List</a></li>-->
              <li><a href="order_hist.php">Order History</a></li>
              <!--<li><a href="#">Downloads</a></li>-->
              <!--<li><a href="return.php">Returns</a></li>-->
              <li><a href="transcation.php">Transactions</a></li>
            <!--  <li><a href="#">Newsletter</a></li>-->
            </ul>
          </div>
        </div>
        <!--Account Links End-->
        <!--Latest Product Start-->
        <?php include('include/header_left.php');?>
        <!--Latest Product End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="login.php">Login</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Forgot password</h1>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="function val()" >
         <input type="hidden" id="def_state" value="<?php echo $state ?>"  />
          <h2>Your Details</h2>
          <div class="content">
            <table class="form">
              <tbody>
             
                  <tr>
                  <td></td>
                  <td>
                  <?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
					?>
                  </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Enter Your emailid </td>
                  <td><input class="large-field" type="text" name="email" value="<?php echo $dvar['email']?>" ></td>
                </tr>
                 </tbody>
            </table>
          </div>
           <a href="my_account.php" ><input type="submit" name="submit" class="button" value="Submit" onClick="my_account.php" style="width:80px; border-radius:2px; float:right; margin-top:7px;"></a>
           
        </form>
             <a href="Login.php" ><input type="submit" name="submit" class="button" value="Back" onClick="login.php" style="width:80px; border-radius:2px;"></a>
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
        
        </div></body></html>