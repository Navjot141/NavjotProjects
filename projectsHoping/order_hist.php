<?php
//include 'init.php';
include 'config_dbase.php';
include 'config.php';
 $sql_order="SELECT * from place_order where user_id='".$fetch_u['id']."'";
$exec_order=mysql_query($sql_order);
$sql_od="SELECT place_order.shipping_id,billing_details.first_name,place_order.user_id from billing_details left outer join place_order        on(place_order.shipping_id=billing_details.id)  where place_order.user_id='".$fetch_u['id']."'";
 $exec_o=mysql_query($sql_od);
$fetch_o=mysql_fetch_assoc($exec_o);


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
    <div id="content">  <div class="breadcrumb">
        <a href="index.php">Home</a>
         &raquo; <a href="my_account.php">Account</a>
         &raquo; <a href="order_hist.php">Order History</a>
      </div>
  <h1>Order History</h1>
 <?php  while($fetch_order=mysql_fetch_assoc($exec_order)) {?>
       <table class="list">
    <thead>
      <tr>
      <td class="left">Order ID</td>
        <td class="left">Date Added</td>
        <td class="left">Status</td>
         <td class="left">Action</td>
      </tr>
    </thead>
    <tbody>
            <tr>
        <td class="left"><?php echo $fetch_order['id'];?></td>
        <td class="left"><?php echo date('F j Y g:i:s a', $fetch_order['time']); ?></td>
        <td class="left"> <?php 
			if($fetch_order['status']==1){?>
			<span style="color:green"><?php echo complete ?></span>
            <?php }else{
			   ?>
               	<span style="color:red"><?php  echo Pending ?></span>
                   <?php 
			  }
			  ?></td>
          <td class="left"><a href="view_order.php?id=<?php echo $fetch_order['id'] ?>"><img src="Admin/images/view.png" title="view" /> </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="" style="color:#F00;;" title="delete" ><img src="Admin/images/delete.png" title="delete" /></a></td>
      </tr>
          </tbody>
  </table>

<?php } ?>

<div class="clear"></div> 
</div>
</div>
</div>
  <!--Footer Part Start-->
 <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>