<?php
include 'config_dbase.php';
include 'config.php';

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Account Login - Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
     <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <?php include"include/left_login.php" ?>
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Account</a> » <a href="#">Transaction</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Transaction</h1>
      <!--  <div class="login-content">
          <div class="left">
            <h2>New Customer</h2>
            <div class="content">
              <p><b>Register Account</b></p>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <a class="button" href="#">Continue</a></div>
          </div>
          <div class="right">
            <h2>Returning Customer</h2>
            <form enctype="multipart/form-data" method="post" action="#">
              <div class="content">
                <p>I am a returning customer</p>
                <b>E-Mail Address:</b><br>
                <input type="text" value="" name="email">
                <br>
                <br>
                <b>Password:</b><br>
                <input type="password" value="" name="password">
                <br>
                <a href="#">Forgotten Password</a><br>
                <br>
                <input type="submit" class="button" value="Login">
              </div>
            </form>
          </div>
        </div>-->
      <div class="content">
      <a class="button" style="float:right; margin-top:150px;" href="my_account.php">Continue</a></div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
   <?php include"include/footer.php" ?>
  <!--Footer Part End-->
</div>
</body>
</html>