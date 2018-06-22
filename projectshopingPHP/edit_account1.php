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
<div class="wrapper-box" >
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
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Account</a> » <a href="">Edit Information</a> </div>
        <!--Breadcrumb Part End-->
        <h1>My Account Information</h1>
        <form enctype="multipart/form-data" method="post" action="#">
          <h2>Your Personal Details</h2>
          <?php 
		  
$sql="select * from users ";
$exec=mysql_query($sql);
$fetch=mysql_fetch_assoc($exec);
		  ?>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input class="large-field" type="text" value="<?php echo $fetch_u['first_name']?>" name="first_name"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                  <td><input class="large-field" type="text" value="<?php echo $fetch_u['last_name']?>" name="last_name"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> E-Mail:</td>
                  <td><input class="large-field" type="text" value="<?php echo $fetch_u['email']?>" name="email"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Telephone:</td>
                  <td><input class="large-field" type="text" value="<?php echo $fetch_u['phone_no']?>" name="phone_no"></td>
                </tr>
                <tr>
                  <td>Fax:</td>
                  <td><input class="large-field" type="text" value="<?php echo $fetch_u['fax']?>" name="fax"></td>
                </tr>
              </tbody>
            </table>
                <h2></h2>
                
               </div>
  
         
        
            </form>
            
       <a class="button" style="float:left; margin-top:-30px; " href="my_account.php">Back</a></div>
      <a class="button" style="float:right; margin-top:-30px;" href="">Continue</a></div>
      <div style="height:20px">
      </div>
      
        
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  <!--Footer Part Start-->
<?php include('include/footer.php');?>
  <!--Footer Part End-->
</div>
</body>
</html>