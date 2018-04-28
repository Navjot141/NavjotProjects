<?php
include 'config_dbase.php';
include 'config.php';
if($_POST['submit']=='Continue')
{
	
	$dvar['npassword']=$_POST['npassword'];
	//echo $_POST['npassword'];
	$dvar['cpassword']=$_POST['cpassword'];
    $dvar['copassword']=$_POST['copassword'];
	 $sql="SELECT * FROM users ";
	$exec=mysql_query($sql) or die(mysql_error()) ;
	$num=mysql_num_rows($exec);
	//print_r($num);
    $fetch=mysql_fetch_assoc($exec);
	
		if($dvar['cpassword']=='')
	     {

		$msg="Please enter Current password";
		$response="error";
	     }
		elseif($dvar['cpassword']==$fetch_u['password'])
		{
			if($dvar['npassword']=='')
			{
				$msg="Please enter new password";
				$response="error";
			}
			elseif($dvar['copassword']=='')
			{
				$msg="Please confirm password";
				$response="error";
			}
			elseif($dvar['npassword']==$dvar['copassword'])
		    {
		  $sql2="UPDATE users SET password='".$dvar['npassword']."' where id='".$fetch_u['id']."'";
		  $exec2=mysql_query($sql2) or die(mysql_error());
		  $msg="Password changed";
		  $response="success";
             }
			else
			{$msg="Password do not match";
			$response="error";}
		}
		else
		{
			$msg="Wrong password";
			$response="error";
		}
}






?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Register - Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
     <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <!--Account Links Start-->
         <?php include"include/left_login.php" ?>
         
         
        <!--Account Links End-->
        <!--Latest Product Start-->
        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <?Php
				$countid="";
				 $sql_LATEST="select product.*,product_image.image from product inner join product_image on
				 product.id=product_image.product_id where product.status='1' order by time DESC LIMIT 0,10";
					$exec_LATEST=mysql_query($sql_LATEST);
					while($fetch_LATEST=mysql_fetch_assoc($exec_LATEST)) 
					{
					if($countid!=$fetch_LATEST['id'])	
					{
					?>
                  <li>
                    <div class="slide-inner">
                      <div class="image" style="width:45px; height:45px;"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>"><img src="uploadimage/<?php echo $fetch_LATEST['image'];?>" alt="Friendly Jewelry" height="45px" width="45px"/></a></div>
                      <div class="name"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>">
                      <?Php echo $fetch_LATEST['name']?>
                      </a></div>
                      <div class="price"><?php echo $fetch_LATEST['price'];?></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <?Php
					}
					$countid=$fetch_LATEST['id'];
					}
				  ?>
                 <!-- <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-45x45.jpg" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                      <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-45x45.jpg" alt="iPad Classic" /></a></div>
                      <div class="name"><a href="product.html">iPad Classic</a></div>
                      <div class="price">$119.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-45x45.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="product.html">Lotto Sports Shoes</a></div>
                      <div class="price">$589.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price">$131.25</div>
                      <div class="clear"></div>
                    </div>
                  </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Account</a> » <a href="register.html">Register</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Change Password</h1>
         <div style="border:0px solid black; width:auto; height:auto;margin-left:171px; font-size:12px;"><?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
						?></div>
       
        <form  method="post" action="change_password.php">
          <h2>Your Password</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> Password:</td>
                  <td><input class="large-field" type="password"value="<?php echo $dvar['cpassword']?>"  name="cpassword"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> New Password:</td>
                  <td><input class="large-field" type="password" value="<?php echo $dvar['npassword']?>" name="npassword"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Password Confirm:</td>
                  <td><input class="large-field" type="password" value="<?php echo $dvar['copassword']?>" name="copassword"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="content">
            
          </div>
          <div class="buttons">
            <div class="left">
              
              <input type="submit" class="button" value="Continue" name="submit">
            </div>
          </div>
        </form>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
   <?php include"include/footer.php" ?>
  <!--Footer Part End-->
</div>
</body>
</html>