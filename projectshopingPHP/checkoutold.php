<?php
include 'config_dbase.php';
include 'config.php';

$fl=1;
if($_REQUEST['do']=='addtocart' && $_REQUEST['pid']>0){
	 $pid=$_REQUEST['pid'];
	 addtocart($pid,1);
    }
if(is_array($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k=>$v)
{
$pid1=$v['productid'];
$qty=$v['qty'];
$tprice=get_price($pid1,$qty);
$total_price=$total_price+$tprice;			
}	
$total=count($_SESSION['cart']);	
}		
if($_POST['submit']=='Continue')
{
	$dvar['first_name']=trim($_POST['first_name']);
	// $dvar['first_name'];
	$dvar['last_name']=trim($_POST['last_name']);
	$dvar['company']=trim($_POST['company']);
	$dvar['company_id']=trim($_POST['company_id']);
	$dvar['address_1']=trim($_POST['address_1']);
	//echo $_POST['address_1'];
	$dvar['address_2']=trim($_POST['address_2']);
	$dvar['city']=trim($_POST['city']);
	$dvar['postcode']=trim($_POST['postcode']);
    $country = mysql_real_escape_string($_POST['country']);
    $state = mysql_real_escape_string($_POST['State']);
	$dvar['f_name']=trim($_POST['f_name']);
	$dvar['l_name']=trim($_POST['l_name']);
	$dvar['comp']=trim($_POST['comp']);
	$dvar['comp_id']=trim($_POST['scomp_id']);
	$dvar['add_1']=trim($_POST['add_1']);
	$dvar['add_2']=trim($_POST['add_2']);
	$dvar['cit']=trim($_POST['cit']);
	$dvar['pcode']=trim($_POST['pcode']);
    $count = mysql_real_escape_string($_POST['count']);
    $state1 = mysql_real_escape_string($_POST['state1']);
	
	if($dvar['first_name']=="")
	{
		$msg="Please enter first name";
		$response="error";
	}
	else if($dvar['last_name']=="")
	{
		$msg="Please enter last name";
		$response="error";
	}
	 else if($dvar['address_1']=="")
	{
		$msg="Please enter address";
		$response="error";
	}
	else if($dvar['city']=="")
	{
		$msg="Please enter city";
		$response="error";
	}
	else if($dvar['postcode']=="")
	{
		$msg="Please enter postcode";
		$response="error";
	}
	else if($country=="")
	{
		$msg="Please select country";
		$response="error";
	}
	
	else if($dvar['f_name']=="")
	{
		$msg1="Please enter first name";
		$response1="error";
	}
	else if($dvar['l_name']=="")
	{
		$msg1="Please enter last name";
		$response1="error";
	}
	 else if($dvar['add_1']=="")
	{
		$msg1="Please enter address";
		$response1="error";
	}
	else if($dvar['cit']=="")
	{
		$msg1="Please enter city";
		$response1="error";
	}
	else if($dvar['pcode']=="")
	{
		$msg1="Please enter postcode";
		$response1="error";
	}
	else if($count=="")
	{
		$msg1="Please select country";
		$response1="error";
	}
	else{
		//echo "hi";
 $sql_insert="INSERT into  billing_details (uid,first_name,last_name,company,company_id,address_1,address_2,city,postcode,country,region,s_firstname,s_lastname,s_company,s_company_id,s_address_1,s_address_2,s_city,s_postcode,s_country,s_region,status,time)VALUES('".$fetch_u['id']."','".$dvar['first_name']."','".$dvar['last_name']."','".$dvar['company']."','".$dvar['company_id']."','".$dvar['address_1']."','".$dvar['address_2']."','".$dvar['city']."','".$dvar['postcode']."','".$country."','".$state."','".$dvar['f_name']."','".$dvar['l_name']."','".$dvar['comp']."','".$dvar['comp_id']."','".$dvar['add_1']."','".$dvar['add_2']."','".$dvar['cit']."','".$dvar['pcode']."','".$count."','".$state."','1','".time()."')"; //echo "<br>";
    $exec_insert=mysql_query($sql_insert) or die(mysql_error());
	$last_id = mysql_insert_id();
		$fl=2;
	 }
   }
if($fl==2)
{
foreach($_SESSION['cart'] as $k=>$v)
{
$pid1=$v['productid'];
$qty=$v['qty'];
$tprice=get_price($pid1,$qty);
$tquantity=get_quantity($pid1);	  
 $sql_place="INSERT into place_order(shipping_id,pro_id,user_id,total,quantity,status,time)
VALUES('".$last_id."','".$pid1."','".$fetch_u['id']."','".$tprice."','".$qty."','0','".time()."')";
$exec_place=mysql_query($sql_place);   
}
header("location:payment.php?do=payment&shipping_id=$last_id");
} 
$sql_country = "select * from regions order by country ASC";
$exec_country = mysql_query($sql_country);	
$sql_country1 = "select * from regions order by country ASC";
$exec_country1 = mysql_query($sql_country1);	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Checkout - Polishop eCommerce HTML Template</title>
 <?php include('include/head.php');?> 
 <script>
function getstate(cid,id)
{
$(document).ready(function(){
  //$("button").click(function(){
    $.ajax({url:"getstate.php?cid="+cid,success:function(result)
	{	
      $(id).html(result);
    }});
  //});
});
}
</script>
</head>

 
<script type="text/javascript">
$(document).ready(function(){
	$('#register').click(function(){
		$('#login').hide();
		$('#billing_details').show();
		$('#shipping_details').show();
		})
   })</script>
    
     
    
<script type="text/javascript">
/*$(document).ready(function(){
	$('#register').click(function(){
		$('#login').show();
		$('#billing_details').show();
		$('#shipping_details').show();
		})
		$('#guest').click(function(){
		$('#login').hide();
		$('#billing_details').show();
		$('#shipping_details').show();
		
		})
   })*/
   function validate()
   { 
 var fname= $('#fname').val();
 if(fname=="")
 {
	$('#error').html("Please enter first name");
	return false;
 }
 var lname= $('#lname').val();
 if(lname=="")
 {
	$('#error1').html("Please enter last  name");
	return false;
 }
  var address_1= $('#address_1').val();
 if(address_1=="")
 {
	$('#error2').html("please enter address  ").hide(10);
	return false;
 }
  var city= $('#city').val();
 if(city=="")
 {
	$('#error3').html("Please enter city ");
	return false;
 }
  var postcode= $('#postcode').val();
 if(postcode=="")
 {
	$('#error4').html("Please enter postcode ");
	return false;
 }

 
 }
  
</script>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
    <?php include('include/header.php');?>
  
    <?Php 

	?>
    <!--Header Part End-->
    <div id="container">
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Shopping Cart</a></div>
        <!--Breadcrumb Part End-->
        <h1>Checkout</h1>
        <div class="checkout">
          <div class="checkout-heading">Step 1: Checkout Options</div>
          <div class="checkout-content" style="display: block;">
            <div class="left">
              <h2>New Customer</h2>
              <p>Checkout Options:</p>
              <label for="register">
                <input type="radio"  id="register" value="register" name="account">
                <b>Register Account</b></label>
              <br>
             <!-- <label for="guest">
                <input type="radio" id="guest" value="guest" name="account">
                <b>Guest Checkout</b></label>
              <br>
              <br>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>-->
              <!--<input type="button" class="button" id="button-account" value="Continue">-->
              <br>
              <br>
            </div>
            <div class="right" id="login" style="display:none;">
              <h2>Returning Customer</h2>
              <p>I am a returning customer</p>
              <b>E-Mail:</b><br>
              <input type="text" value="<?php echo $dvar['email']?>" name="email">
              <br>
              <br>
              <b>Password:</b><br>
              <input type="password" value="<?php echo $dvar['password']?>" name="password">
              <br>
              <a href="#">Forgotten Password</a><br>
              <br>
              <input type="button" class="button" id="button-login" value="Login" name="submit">
              <br>
              <br>
            </div>
          </div>
        </div>
        <form action="<?php echo $PHP_SELF;?>" method="post" onSubmit="return validate('this.value');">
        <input type="hidden" id="def_state" value="<?php echo $state ?>"  />
        <input type="hidden" id="def_state" value="<?php echo $state1 ?>"  />
        <div class="checkout" id="billing_details" style="display:none;">
          <div class="checkout-heading">Step 2: Account & Billing Details</div>
          <div class="checkout-content">
            <table class="form">
              <tbody>
              <tr>
				<?php
                if(isset($msg) && $msg <> "" && $response=="error"){
                echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
                }
                if(isset($msg) && $msg <> "" && $response=="success")
                {echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
                
                ?>
              </tr>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['first_name']  ?>" id="fname" name="first_name"></td>
                  
                </tr>
                <tr><td></td><td> <div id="error" style="color:red; font-size:16px;"></div></td></tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['last_name']  ?>" id="lname" name="last_name"></td>
                </tr>
                 <tr><td></td><td> <div id="error1" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td>Company:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['company']  ?>" id="company" name="company"></td>
                </tr>
                
                <tr>
                  <td> Company ID:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['company_id']  ?>"  id="company_id" name="company_id"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Address 1:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['address_1']  ?>" id="address_1" name="address_1"></td>
                </tr>
                 <tr><td></td><td> <div id="error2" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td>Address 2:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['address_2']  ?>" id="address_2" name="address_2"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> City:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['city']  ?>" id="city" name="city"></td>
                </tr>
                    <tr><td></td><td> <div id="error3" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td><span class="required" id="payment-postcode-required">*</span> Post Code:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['postcode']  ?>" id="postcode" name="postcode"></td>
                </tr>
                    <tr><td></td><td> <div id="error4" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td><span class="required">*</span> Country:</td>
                  
					  
                      <td><select class="large-field" name="country" onchange="getstate(this.value,'#state')" id="slelect_country_id">
                      <option value=""> --- Please Select --- </option>
                       <?php
					  $j=0;while($fetch_country = mysql_fetch_assoc($exec_country)){?>
                      <option value="<?php echo $fetch_country['id'];?>"<?php if($country == $fetch_country['id']){echo                       'selected=selected' ;}?>><?php echo $fetch_country['country'];?></option>
                      <?php $j++;}?>
                      
                     
                    </select></td>
                </tr>
                    <tr>
                  <td><span class="required">*</span> Region / State:</td>
                  <td><div id="slelect_state_id"> <select name="State" id="state" >
                      <option value=""> --- Please Select --- </option>
                    </select></div></td>
                </tr>
                     
                 
              </tbody>
            </table>
            <div class="buttons">
              <div class="right">
               
              </div>
            </div>
          </div>
        </div>
      
         <div class="checkout" id="shipping_details" style="display:none;">
          <div class="checkout-heading">Step 3: Shipping Details</div>
          <div class="checkout-content">
            <table class="form">
              <tbody>
              <tr>
				<?php
                if(isset($msg1) && $msg1 <> "" && $response1=="error"){
                echo "<div style='color:red; font-size:15px;'>".$msg1."</div>";
                }
                if(isset($msg1) && $msg1 <> "" && $response1=="success")
                {echo "<div style='color:green; font-size:15px;'>".$msg1."</div>";}
                
                ?>
              </tr>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['f_name']  ?>" id="fname" name="f_name"></td>
                  
                </tr>
                <tr><td></td><td> <div id="error" style="color:red; font-size:16px;"></div></td></tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['l_name']  ?>" id="lname" name="l_name"></td>
                </tr>
                 <tr><td></td><td> <div id="error1" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td>Company:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['com']  ?>" id="company" name="comp"></td>
                </tr>
                
                <tr>
                  <td> Company ID:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['comp_id']  ?>"  id="company_id" name="comp_id"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Address 1:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['add_1']  ?>" id="address_1" name="add_1"></td>
                </tr>
                 <tr><td></td><td> <div id="error2" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td>Address 2:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['add_2']  ?>" id="saddress_2" name="add_2"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> City:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['cit']  ?>" id="city" name="cit"></td>
                </tr>
                    <tr><td></td><td> <div id="error3" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td><span class="required" id="payment-postcode-required">*</span> Post Code:</td>
                  <td><input type="text" class="large-field" value="<?php echo $dvar['pcode']  ?>" id="spostcode" name="pcode"></td>
                </tr>
                    <tr><td></td><td> <div id="error4" style="color:red; font-size:20px;"></div></td></tr>
                <tr>
                  <td><span class="required">*</span> Country:</td>
                  
					  
                      <td><select class="large-field" name="country" onchange="getstate(this.value,'#state1')" id="slelect_country_id">
                      <option value=""> --- Please Select --- </option>
                       <?php
					  $j=0;while($fetch_country1 = mysql_fetch_assoc($exec_country1)){?>
                      <option value="<?php echo $fetch_country1['id'];?>"<?php if($count == $fetch_country1['id']){echo                       'selected="selected"' ;}?>><?php echo $fetch_country1['country'];?></option>
                      <?php $j++;}?>
                      
                     
                    </select></td>
                </tr>
                    <tr>
                  <td><span class="required">*</span> Region / State:</td>
                  <td><div id="slelect_state_id"> <select name="state1" id="state1" >
                      <option value=""> --- Please Select --- </option>
                    </select></div></td>
                </tr>
                   
                 
              </tbody>
            </table>
            <div class="buttons">
              <div class="right">
               
              </div>
            </div>
          </div>
        </div>
         <input type="submit" name="submit" class="button" style="margin-left:900px;"  id="button-payment-address" value="Continue">
          </form>
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
