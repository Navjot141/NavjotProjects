<?php
include 'config_dbase.php';
include 'config.php';
$id=$_GET['id'];
$do=$_GET['do'];
if($do=="edit")
{
 $sql1="SELECT * FROM users where id='".$id."' ";
$exec=mysql_query($sql1);
$fetch=mysql_fetch_assoc($exec);
$dvar["first_name"]=$fetch['first_name'];
$dvar["last_name"]=$fetch['last_name'];
$dvar["email"]=$fetch['email'];
$dvar["phone_no"]=$fetch['phone_no'];
$dvar["fax"]=$fetch['fax'];
$dvar["address_1"]=$fetch['address_1'];
//print_r($fetch['address_1'])
$dvar["address_2"]=$fetch['address_2'];
$dvar["city"]=$fetch['city'];
$dvar["postcode"]=$fetch['postcode'];


}
if($_POST['submit']=='Continue')
{
	$dvar['first_name']=trim($_POST['first_name']);
	$dvar['last_name']=trim($_POST['last_name']);
	$dvar['email']=trim($_POST['email']);
	$dvar['phone_no']=$_POST['phone_no'];
	$dvar['fax']=trim($_POST['fax']);
	$dvar['address_1']=trim($_POST['address_1']);
	$dvar['address_2']=trim($_POST['address_2']);
	$dvar['city']=trim($_POST['city']);
	$dvar['postcode']=trim($_POST['postcode']);
		
$sql_update="UPDATE  users SET  first_name='".$dvar['first_name']."',last_name='".$dvar['last_name']."',email='".$dvar['email']."',phone_no='".$dvar['phone_no']."',fax='".$dvar['fax']."',address_1='".$dvar['address_1']."',address_2='".$dvar['address_2']."',city='".$dvar['city']."',postcode='".$dvar['postcode']."' where id='".$id."' " ;
		$exec_update=mysql_query($sql_update) or die(mysql_error());
		if($exec_update)
		{
			$msg="ACCOUNT SUCCESSFULLY UPDATED";
			$response="success";
			
			} 
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Register - Polishop eCommerce HTML Template</title>
<?php include('include/head.php');?>
<script>
$(document).ready(function(e) {
    select_state_registration();
});
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
   
        <!--Account Links Start-->
         <?php include"include/left_login.php" ?>
         
        <!--Account Links End-->
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
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>?do=edit&id=<?php echo $id; ?>" onSubmit="function val()" >
         <input type="hidden" id="def_state" value="<?php echo $state ?>"  />
          <h2>Your Personal Details</h2>
          <div class="content">
            <table class="form">
              <tbody>
             
                  <tr>
                  <td></td>
                  <td>
                  <?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
					?>
                  </td>
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
              </tbody>
            </table>
          </div>
        
           

            
         
     <input type="submit" name="submit" class="button" value="Continue"  style="width:80px; border-radius:2px; float:right; margin-top:0px;">
           
        </form>
             <a href="my_account.php" ><input type="submit" name="submit" class="button" value="Back" style="width:80px; border-radius:2px;"></a>
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