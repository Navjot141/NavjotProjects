<?php
include 'config_dbase.php';
include 'config.php';
?>
<!DOCTYPE html>

<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Category(Grid) - Polishop eCommerce HTML Template</title>
<link href="image/favicon.png" rel="icon" />
<?php include('include/head.php');?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper"> 
    <!--Header Part Start-->
    <?php include('include/header.php');?>
    
    <!--Header Part End-->
    <div id="container">
      <div id="column-left"> 
        <!--Category Start -->
        
          <?php include('include/left_login.php');?>
          </div>
        
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script> 
        
        <!--Category End --> 
        <!--Refine Search Start--> 
        
      </div>
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="my_account.php">Account</a>  </div>
        <!--Breadcrumb Part End-->
        <h1>MY ACCOUNT</h1>
        <form enctype="multipart/form-data" method="post" action="">
          <h2>MY ACCOUNT</h2><br>
           <ul class="list-item" style="margin-left:40px;">
              <li><a href="edit_account.php?do=edit&id=<?php echo $fetch_u['id']; ?>">Edit your account information</a></li>
              <li><a href="change_password.php">Change the password</a></li>
              <li><a href="edit_address1.php?id=<?php echo $fetch_u['id']; ?>">Modify address entries</a></li>
              </ul><br><br>
          <h2>My orders</h2><br>
             <ul class="list-item" style="margin-left:40px;">
              <li><a href="order_hist.php">View your order history</a></li>
             <!-- <li><a href="edit_account.php">Your transcations</a></li>-->
              </ul>
       </form>
      </div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>