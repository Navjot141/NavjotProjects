<?php
error_reporting(0);
include 'config_dbase.php';
$sql="SELECT id,name FROM category where status='1' ORDER BY name ASC" ;
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);
 if($_POST['submit']=='submit')
{
	//variables post start
	$dvar['subcategory']=($_POST['subcategory']);
	$dvar['name']=($_POST['name']);
	$dvar['description']=($_POST['description']);
	$dvar['price']=($_POST['price']);
	$dvar['availability']=$_POST['availability'];
	$dvar['quantity']=$_POST['quantity'];
	$name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $tmp=$_FILES['image']['tmp_name'];
	
$sql8="SELECT name from product where name='".$dvar['name']."'";
$exec8=mysql_query($sql8)or die(mysql_error());
$num=mysql_num_rows($exec8);
if($dvar['subcategory']=='')
	{
	  $msg="Please select subcategory";
	  $response="error";	
	}
	elseif($dvar['name']=="")
	{
	  $msg="Please enter name";
	  $response="error";	
	}
	elseif($num > 0)
	{
	  $msg="Name already exist";
	  $response="error";	
	}
	elseif($dvar['description']=='')
	{
	  $msg="Please enter description";
	  $response="error";	
	}
	
	elseif($dvar['price']=='')
	{
	  $msg="Please enter price";
	  $response="error";	
	}
	elseif(!(is_numeric($dvar['price'])))
	{
	  $msg="Please enter numeric value in price";
	  $response="error";
	}
	elseif($dvar['quantity']=='')
	{
	  $msg="Please enter quantity";
	  $response="error";	
	}
	elseif(!(is_numeric($dvar['quantity'])))
	{
	  $msg="Please enter numeric value in quantity";
	  $response="error";
	}
		else
	{
		$sql3="INSERT into product(subcategory,name,description,price,availability,featured,quantity,status,time)Values('".$dvar['subcategory']."','".$dvar['name']."','".$dvar['description']."','".$dvar['price']."','".$dvar['availability']."','".'1'."','".$dvar['quantity']."','".'1'."','".time()."')";
		   	$exec3=mysql_query($sql3) or die(mysql_error());
			if($exec3)
			{
		 	$msg="Record Inserted";
			$response="success";
			}
			$lastid=mysql_insert_id();
			//echo $lastid;
			$counter=0;
			foreach($name as $v)
			{
			$sr=explode('.',$v);
			$image_name=time()+$counter.".".$sr[1];
			$path="../uploadimage/".$image_name;
			//echo $image_name;
			//echo $path;
			$sql1="INSERT into product_image( product_id,image,status,time)Values('".$lastid."','".$image_name."','".'1'."','".time()."')";
		   	$exec3=mysql_query($sql1) or die(mysql_error());
			move_uploaded_file($tmp[$counter],$path);
			$counter++;		
			}	
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link href="CSS/addeditcategory.css" rel="stylesheet" type="text/css" />
<!--script for clock start-->
<script>
function startTime()
{
var today=new Date();
 months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
var d=today.getDate();
 var month=today.getMonth();
 var day = today.getDay();
 days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
var year = today.getFullYear();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);

document.getElementById('txt').innerHTML=' '+days[day]+' '+d+' '+months[month]+' '+year+'   '+h+':'+m+':'+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
<!--script for clock start-->
</head>
<body onload="startTime()"  style="background-color:#ededed">
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
      <!--header start-->
       <?php include'include/header.php';?>
       <!-- <div class="header1">
          <div class="headera"><a href="images/image_11.png"></a></div>
          <div class="headerb"> ADMIN PANEL</div>
        </div>
        <div class="header2">
          <div class="header2a">
            <div class="header2a1"><a href= "update.php" style="color:#000;">Update profile</a></div>
            <div class="header2a2"><a href= "login.php" style="color:#000;">Logout</a></div>
          </div>
          <div class="header2a3"id="txt"> </div>
        </div>-->
        
      <!--header end-->
      <!--content start-->
        <div class="content" >
         <?php include'include/ui.php';?>
        <!--  <div class="content1a">
            <ul >
              <li><a href="#">Home</a>
                <ul>
                  <li><a href="managecategory.php"><span style="width:120px; height:40px; font-size:21px;">Manage category</span> </a></li>
                  <li><a href="managesubcategory.php"><span style=" font-size:19px;">Manage Sucategory</span></a></li>
                  <li><a href="manageproduct.php"><span style=" font-size:21px;">Manage Products</span></a></li>
                </ul>
              </li>
              <li><a href="#">Slider</a>
        <ul><a href="manage_slider.php" target="_blank"><span style=" font-size:21px;">Manage Products</span></a></ul></li>
              <li><a href="#">Blogs</a></li>
           <li><a href="#">Configuration</a>
            
              <ul>
                <li><a href="manage_aboutUs.php?do=edit&id=1"><span style="width:120px; height:40px; font-size:21px;">About Us</span> </a></li>
                <li><a href="manage_deliveryinfo.php?do=edit&id=6"><span style=" font-size:19px;">Delivery Information</span></a></li>
                <li><a href="manage_privacy.php?do=edit&id=7"><span style=" font-size:21px;">Privacy policy</span></a></li>
                 <li><a href="manage_element.php?do=edit&id=8"><span style=" font-size:21px;">Elements</span></a></li>
                 
              </ul>
            
            </li>
            </ul>
          </div>-->
            <div class="clear"></div>
          <div class="content1b">
            <form method="post" enctype="multipart/form-data">
              <table border="0" vspace="40px;" >
                <tr>
                  <td colspan="2" height="60px;" ><div style="border:0px solid blue; height:20px; width:250px; margin-left:105px;">
                      <?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
						?>
                    </div>
                    <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Select Products</u></span></td>
                </tr>
                <tr>
                  <td><span style="font-size:17px;">Subcategory <span style="color:#F00;">*</span></span></td>
                  <td><select style="width:250px; border-radius:8px; height:28px; border:1px solid #CCC; outline:none;" name="subcategory">
                      <option value="">Select Subcategory</option>
					  <?php while($fetch = mysql_fetch_assoc($exec)){?>
                      <optgroup label="<?php echo $fetch['name'] ?>">
                      <?php 
						$sql1="select * from subcategory where category='".$fetch['id']."'";
						$exec1=mysql_query($sql1);
						while($fetch1 = mysql_fetch_assoc($exec1)){?>
                      <option value="<?php echo $fetch1['id'];?>"<?php if( $dvar['subcategory']==$fetch1['id']){echo 'selected=selected';}?>><?php echo  $fetch1['name'];?></option>
                      <?php }?>
                      </optgroup>
                      <?php }?>
                    </select></td>
                </tr>
                <tr >
                  <td width="100px" ><span style="font-size:20px;">Name<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="name" class="textbox"  value="<?php echo $dvar['name'] ?>"/></td>
                </tr>
                 <tr>
                  <td width="100px" ><span style="font-size:20px;"> Description</span></td>
                  <td><textarea name="description"  id="address" rows="3" cols="15"  placeholder="Enter description" style="width:245px; height:55px; border-radius:4px;"  ></textarea></td>
                </tr>
                  <tr >
                  <td width="100px" ><span style="font-size:20px;">Price<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="price" value="<?php echo $dvar['price'] ?>" class="textbox" /></td>
                </tr>
                 <tr >
                  <td width="100px" ><span style="font-size:20px;">Availaibility</span></td>
                 <td style="width:200px"><span style="font-size:20px;"><input type="radio" name="availability"  checked="checked" value="1" /> 
                <span style="color:green" >In stock</span>
      <input type="radio" name="availability"  value="0" />
      <span style="color:red" >Out of  stock</span> </span></td>
                </tr>
                  <tr >
                  <td width="100px" ><span style="font-size:20px;">Quantity<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="quantity" value="<?php echo $dvar['quantity'] ?>" class="textbox" /></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;">
                    <div style="width:50; height:50px;">
                      <label for="file">Filename</label>
                    </div>
                    </span></td>
                  <td>
                  <input type="file" name="image[]" multiple="multiple"/>
                   </td>
                  
                </tr>
                
               
             
                 <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
                    <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='manageproduct.php'" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
          <div class="clear"></div>
          
      <!--content end-->
      </div>
        <div class="clear"></div>
    </div>
      <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

</body>
</html>