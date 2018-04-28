<?php
session_start();
include 'config_dbase.php';
include 'config.php';
//print_r($fetch_u['first_name']);
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
        
          <?php include('include/left_part.php');?>
          
        
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script> 
        <!--Category End --> 
        <!--Refine Search Start--> 
        
    </div>
    
      <div style="border:0px solid black; float:right; margin-right:180px; margin-top:40px; width:auto; height:auto;">
     <h1><span style="text-align:center">Your Account Has Been Created!</span></h1>
     <p>&nbsp;
     Congratulations! Your new account has been successfully created!
          </p>
        <a href="my_account.php" > <input type="submit" value="continue" class="button" style="margin-left:400px; margin-top:50px;"></a>
      </div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>