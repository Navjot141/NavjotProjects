<?php
include 'config_dbase.php';

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
         <div id="content">
        <div class="breadcrumb"> <a href="index.php">Home</a> » <a href="#">Account</a> » <a href="login.php">Login</a> </div>
           </div>
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script> 
        <!--Category End --> 
        <!--Refine Search Start--> 
        
      </div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>