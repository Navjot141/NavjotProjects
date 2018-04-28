<?php
include 'config_dbase.php';
if($_POST['submit']=='submit')
{
$fl=1;
$hemail=$_REQUEST['hemail'];
$dvar['first_name']=$_POST['first_name'];
$dvar['last_name']=$_POST['last_name'];
$dvar['email']=$_POST['email'];
$dvar['phone_no']=$_POST['phone_no'];
$dvar['fax']=$_POST['fax'];
$dvar['company']=$_POST['company'];
$dvar['company_id']=$_POST['company_id'];
$dvar['address_1']=$_POST['address_1'];
$dvar['address_2']=$_POST['address_2'];
$dvar['city']=$_POST['city'];
$dvar['postcode']=$_POST['postcode'];
$country = $_POST['country'];
$state = $_POST['state'];
$dvar['region']=$_POST['region'];
$dvar['password']=$_POST['password'];
$dvar['confirm']=$_POST['confirm'];
$sqlf="select email from users where email='".$dvar['email']."'";
$qr1=mysql_query($sqlf);
$res=mysql_fetch_assoc($qr1);
$num=mysql_num_rows($qr1);
if($num > 0)
{
echo "emailid already exist";
}
else
{
$sql_re="INSERT into users(first_name,last_name,email,phone_no,fax,company,company_id,address_1,address_2,city,postcode,country,region,password,status,time)VALUES('".$dvar['first_name']."','".$dvar['last_name']."','".$dvar['email']."','".$dvar['phone_no']."','".$dvar['fax']."','".$dvar['company']."','".$dvar['company_id']."','".$dvar['address_1']."','".$dvar['address_2']."','".$dvar['city']."','".$dvar['postcode']."','".$country."','".$state."','".$dvar['password']."','1','".time()."')";		
$exec_re=mysql_query($sql_re) or die(mysql_error());
}
}
?>
<?php ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Register - Polishop eCommerce HTML Template</title>
<?php include('include/head.php');?>
<script>
function getstate(cid)
{
$(document).ready(function(){
  //$("button").click(function(){
    $.ajax({url:"getstate.php?cid="+cid,success:function(result)
	{	
      $("#state").html(result);
    }});
  //});
});
}
</script>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
  <?php include('include/header.php');?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <?php 
	  include('include/left_login.php');
	  ?>
       <!--Latest Product Start-->
        <?php include('include/header_left.php');?>
        <!--Latest Product End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Account</a> » <a href="register.html">Register</a> </div>
        <!--Breadcrumb Part End-->
<h1>Register Account</h1>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="function val()" >
         <input type="hidden" id="def_state" value="<?php echo $state ?>"  />
          <h2>Your Personal Details</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                <td></td>
                  <td colspan="2"><?php
                      if(isset($msg) && $msg <> "" && $response=="error"){
	                echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
                     }
                      if(isset($msg) && $msg <> "" && $response=="success")
                     {echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

                  ?></td>
                </tr>

                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['first_name']?>" id="fname" onblur="valfname()" name="first_name"></td>
                </tr>
                <tr>
                <td></td>
                <td colspan="2">
                <label id="msg1" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['last_name']?>" id="lname" onblur="vallname()" name="last_name"></td>
                </tr>
                   <tr>
                <td></td>
                <td colspan="2">
                <label id="msg2" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> E-Mail:</td>
                    <input type="hidden" value="<?php echo  $res['email'];?>" name="hemail"/>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['email']?>" id="email" onblur="valemail()" name="email"></td>
                </tr>
                 <tr>
                <td></td>
                <td colspan="2">
                <label id="emailmsg" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Telephone:</td>
                  <td><input class="large-field" type="text" id ="t1" maxlength="10" value="<?php echo $dvar['phone_no']?>" onblur="valmobile()" name="phone_no"></td>
                </tr>
                <tr>
                <td></td>
                <td colspan="2">
                <label id="msg4" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td>Fax:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['fax']?>" id="fax"  onBlur="valfax()" name="fax"></td>
                </tr>
                 <tr>
                <td></td>
                <td colspan="2">
                <label id="msg5" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Your Address</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td>Company:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['company']?>" name="company"></td>
                </tr>
                <tr id="company-id-display">
                  <td>Company ID:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['company_id']?>" name="company_id"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Address 1:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['address_1']?>" id="address"  onBlur="valaddress()" name="address_1"></td>
                </tr>
                 <tr>
                <td></td>
                <td colspan="2">
                <label id="addmsg" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td>Address 2:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['address_2']?>" name="address_2"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> City:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['city']?>" id="city"  onBlur="valcity()"  name="city"></td>
                </tr>
                 <tr>
                <td></td>
                <td colspan="2">
                <label id="citymsg" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required" id="postcode-required">*</span> Post Code:</td>
                  <td><input class="large-field" type="text" value="<?php echo $dvar['postcode']?>" id="post"  onBlur="valpostcode()"  name="postcode"></td>
                </tr>
                  <tr>
                <td></td>
                <td colspan="2">
                <label id="pcmsg" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Country:</td>
                  <td><select name='country' onchange="getstate(this.value)" id="slelect_country_id" >
                      <option value=""> --- Please Select --- </option>
                      <?php
					  $j=1;
					 $exec_country=mysql_query('select * from regions');
					  while($fetch_country =mysql_fetch_assoc($exec_country)){?>
                      <option value="<?php echo $fetch_country['id'];?>"<?php if($country == $fetch_country['id']){echo 'selected="selected"' ;}?>><?php echo $fetch_country['country'];?></option>
                      <?php $j++;}?>
                     
                    </select></td>
                </tr> 
                <tr>
                  <td><span class="required">*</span> Region / State:</td>
                  <td><div id="slelect_state_id"> <select name="State" id="state">
                      <option value=""> --- Please Select --- </option>
                    </select></div></td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Your Password</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> Password:</td>
                  <td><input class="large-field" type="password" value="<?php $dvar['password']?>"    id="pwd"  onBlur="valpwd()"   name="password"></td>
                </tr>
                  <tr>
                <td></td>
                <td colspan="2">
                <label id="pwdmsg" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Password Confirm:</td>
                  <td><input class="large-field" type="password" value="<?php $dvar['confirm']?>"  id="cpwd" onkeyup="valcpwd()" name="confirm"></td>
                </tr>
                  <tr>
                <td></td>
                <td colspan="2">
                <label id="sp" style="color:#F00; font-size:14px;"></label>
                </td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Newsletter</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <!--<tr>
                  <td>Subscribe:</td>
                  <td><input type="radio" value="1" name="newsletter">
                    Yes
                    <input type="radio" checked="checked" value="0" name="newsletter">
                    No </td>
                </tr>-->
              </tbody>
            </table>
          </div>
          <div class="buttons">
            <div class="left">
              <p>
                <input type="checkbox" value="1" name="agree">
                &nbsp; I have read and agree to the <a alt="Privacy Policy" href="#" class="colorbox cboxElement"><b>Privacy Policy</b></a> </p>
              <input type="submit" name="submit" class="button" value="submit">
            </div>
          </div>
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