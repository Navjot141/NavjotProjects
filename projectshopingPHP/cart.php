
<?php 
include ('config_dbase.php');
include ('config.php');
?>
<?php 
if($_REQUEST['do']=='deletecart' and $_REQUEST['pid']>0)
{
$pid=$_REQUEST['pid'];	
remove_product($pid);		
}
if(isset($_REQUEST['Update_cart']))
{
$tqt=$_REQUEST['tqt'];
$gqt=$_REQUEST['gqt'];
$pid=$_REQUEST['pid'];
if($gqt>$tqt)
{
$msg="ERROR:Total Quantity is Less Then Given Quantity";	
}
else
{	
$max=count($_SESSION['cart']);
for($i=0;$i<$max;$i++)
{
$pid1=$_SESSION['cart'][$i]['productid'];
if($pid==$pid1)
{
$_SESSION['cart'][$i]['qty']=$gqt;
break;		
} 
}
header("location:cart.php");
}
}
if($_REQUEST['do']=='clearcart')
{	
session_unset($_SESSION['cart']);		
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Shopping Cart - Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
     <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
    
      <!--Middle Part Start-->
      <div id="content">
     
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.php">Home</a> » <a href="#">Shopping Cart</a></div>
        <!--Breadcrumb Part End-->
        <h1>Shopping Cart </h1>
       <h3 style="color:#F00; text-align:center"><?php echo $msg;?></h3>
          <div class="cart-info">
         
            <table>
              <thead>
                <tr>
                  <td class="image">Image</td>
                  <td class="name">Product Name</td>
                 <td class="quantity">Total Quantity</td>
                  <td class="quantity">Quantity</td>
                  <td class="price">Unit Price</td>
                  <td class="total">Total</td>
                </tr>
              </thead>
              <tbody>
 <?Php
$cont=1;
$total_price=""; 			
foreach($_SESSION['cart'] as $k=>$v)
{
$pid1=$v['productid'];
$qty=$v['qty'];
$qr=mysql_query("select * from product where id='$pid1'");
;
$fetch=mysql_fetch_assoc($qr);
$qr=mysql_query("select image from product_image where product_id='$pid1'");
$fetchimage=mysql_fetch_assoc($qr);
$p_name=get_product_name($pid1);
$uprice=get_price($pid1);
$tprice=get_price($pid1,$qty);
$tquantity=get_quantity($pid1);
$total_price=$total_price+$tprice;					  
?> 
 <tr>
 <td class="image"><a href="product.php?prod_id=<?php echo $pid1;?>&sub_id=<?php echo $fetch['subcategory']?>"><img src="uploadimage/<?php echo $fetchimage['image']?>" height="45px" width="45px" /></a></td>
                  <td class="name"><a href="product.php?prod_id=<?php echo $pid1;?>&sub_id=<?php echo $fetch['subcategory']?>"><?php echo $p_name;?></a></td>
                <td class="quantity">
                <?php echo $tquantity;?>
                </td>
                  <td class="quantity">
                  <form name="form<?php echo $cont;?>">
                  <input type="hidden" value="<?php echo $tquantity?>" name="tqt">
                  <input type="hidden" value="<?php echo $pid1?>" name="pid">
                  <input type="text" size="3" value="<?php echo $qty;?>" name="gqt" class="w30">
                    &nbsp;
                 <input type="submit"value="Update Cart" name="Update_cart">
                 </form>
                    &nbsp;<a href="cart.php?do=deletecart&pid=<?php echo $pid1;?>"><img title="Remove" alt="Remove" src="image/remove.png"></a></td>
                  <td class="price"><?php echo $uprice;?></td>
                  <td class="total"><?php echo $tprice;?> </td>
                </tr>
                <?php
				$cont++;
			  }
			   ?>
 
              </tbody>
            </table>
          </div>
        </form>                           
        <div class="cart-total">
          <table id="total">
            <tbody>
              <tr>
                <td class="right"><b>Total:</b></td>
                <td class="right"><?Php echo $total_price; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="buttons">
          <div class="right"><a class="button" href="checkout.php">Checkout</a></div>
          <div class="center"><a class="button" href="index.php">Continue Shopping</a></div>
          <div class="center" style="margin-left:320px; margin-top:-32px;"><a class="button" href="cart.php?do=clearcart">Clear cart</a></div>
        </div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
   <?php include"include/footer.php"; ?>
  <!--Footer Part End-->
</div>
</body>
</html>