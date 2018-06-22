<?php
include 'config_dbase.php';
include 'config.php';
$id=$_REQUEST['id'];
$sql_order="select * from place_order where id='".$id."'";
$exec_order=mysql_query($sql_order);
$fetch_order=mysql_fetch_assoc($exec_order);
 $sql_od="SELECT place_order.*,billing_details.* from billing_details left outer join place_order on(place_order.shipping_id=billing_details.id)  where place_order.id='".$id."'";
 $exec_o=mysql_query($sql_od);
$fetch_o=mysql_fetch_assoc($exec_o);
 $sql_od1="SELECT place_order.*,product.name,product.price from product left outer join place_order on(place_order.pro_id=product.id)  where place_order.id='".$id."'";
 $exec_o1=mysql_query($sql_od1);
$fetch_o1=mysql_fetch_assoc($exec_o1);
 $sql_image="select  * from product_image where product_id='".$fetch_o1['pro_id']."' limit 0,1";
$exec_image=mysql_query($sql_image);
$fetch_image=mysql_fetch_assoc($exec_image);

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
        </div>
        <div id="content">  <div class="breadcrumb">
        <a href="http://demo.harnishdesign.net/opencart/polishop/index.php?route=common/home">Home</a>
         &raquo; <a href="http://demo.harnishdesign.net/opencart/polishop/index.php?route=account/account">Account</a>
         &raquo; <a href="http://demo.harnishdesign.net/opencart/polishop/index.php?route=account/order">Order History</a>
         &raquo; <a href="http://demo.harnishdesign.net/opencart/polishop/index.php?route=account/order/info&amp;order_id=108">Order Information</a>
      </div>
  <h1>Order Information</h1>
  <table class="list">
    <thead>
      <tr>
        <td class="left" colspan="2">Order Details</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left" style="width: 50%;">          <b>Order ID:</b> <?php echo $id;?><br />
          <b>Date Added:</b> <?php echo date('d/m/Y', $fetch_order['time']); ?></td>
        <td class="left" style="width: 50%;">          <b>Payment Method:</b> Online Payment<br />
                                      </td>
      </tr>
    </tbody>
  </table>
  <table class="list">
    <thead>
      <tr>
        <td class="left">Payment Address</td>
                <td class="left">Shipping Address</td>
              </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left"><?php echo $fetch_o['first_name']; ?>    <?php echo $fetch_o['last_name']; ?><br /><?php echo $fetch_o['address_1']; ?><br /><?php echo $fetch_o['city']; ?></td>
                <td class="left"><?php echo $fetch_o['s_firstname']; ?>  <?php echo $fetch_o['S_lastname']; ?> <br /><?php echo $fetch_o['s_address_1']; ?><br /><?php echo $fetch_o['s_city']; ?></td>
              </tr>
    </tbody>
  </table>
  <table class="list">
    <thead>
      <tr>
        <td class="left">Product Name</td>
         <td class="left">Image</td>
         <td class="right">Quantity</td>
        <td class="right">Price</td>
        <td class="right">Sub-Total</td>
                <!--<td style="width: 1px;"></td>-->
              </tr>
    </thead>
    <tbody>
            <tr>
        <td class="left"><?php echo $fetch_o1['name']; ?>         </td>
         <td class="left"><img src="uploadimage/<?php echo $fetch_image['image']; ?>" height="100" width="100"/>         </td>
        <td class="right"><?php echo $fetch_o1['quantity']; ?></td>
        <td class="right"><?php echo $fetch_o1['price']; ?></td>
        <td class="right"><?php echo $fetch_o1['total']; ?></td>
        <!--<td class="right"><a href="http://demo.harnishdesign.net/opencart/polishop/index.php?route=account/return/insert&amp;order_id=108&amp;product_id=46"></a></td>-->
      </tr>
                </tbody>
    <tfoot>
           <!-- <tr>
        <td colspan="3"></td>
        <td class="right"><b>Sub-Total:</b></td>
        <td class="right"><?php echo $fetch_o1['total']; ?></td>
                <td></td>
              </tr>
           <tr>
        <td colspan="3"></td>
        <td class="right"><b>Total:</b></td>
        <td class="right"><?php echo $fetch_o1['total']; ?></td>
                <td></td>
              </tr>-->
          </tfoot>
  </table>
  
      <h2>Order History</h2>
  <table class="list">
    <thead>
      <tr>
        <td class="left">Date Added</td>
        <td class="left">Status</td>
        
      </tr>
    </thead>
    <tbody>
            <tr>
        <td class="left"><?php echo date('d/m/Y', $fetch_order['time']); ?></td>
        <td class="left"><?php 
			if($fetch_order['status']==1){?>
			<span style="color:green"><?php echo complete ?></span>
            <?php }else{
			   ?>
               	<span style="color:red"><?php  echo Pending ?></span>
                   <?php 
			  }
			  ?></td>
     
      </tr>
          </tbody>
  </table>
    <div class="buttons">
    <div class="right"><a href="my_account.php" class="button">Continue</a></div>
  </div>
  </div>


<div class="clear"></div> 
</div>
</div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>