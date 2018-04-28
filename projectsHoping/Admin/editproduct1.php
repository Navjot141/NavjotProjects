
<?php
error_reporting(0);
include 'config_dbase.php';
$sql5 = "SELECT * FROM product_image WHERE product_id='".$id."' AND status='1'";
 $exec5 = mysql_query($sql5) or die(mysql_error());
$sql2="SELECT * FROM product where id='".$id."'";
$exec2=mysql_query($sql2);
$fetch=mysql_fetch_assoc($exec2);
		if($_POST['submit']=='submit')
		{
	$dvar['subcategory']=($_POST['subcategory']);
	$dvar['name']=$_POST['name'];
	$dvar['description']=$_POST['description'];
	$dvar['price']=trim($_POST['price']);
	$dvar['availability']=$_POST['availability'];
	$dvar['quantity']=$_POST['quantity'];
	$name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];
$sql6="SELECT name from product where name='".$dvar['name']."'";
$exec6=mysql_query($sql6)or die(mysql_error());
$num=mysql_num_rows($exec6);
	
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
		
		{	$sql1="SELECT * FROM product where id='".$id."'";
			$exec1=mysql_query($sql1);
			$fetch=mysql_fetch_assoc($exec1);
			$sql4="UPDATE product SET subcategory='".$dvar['subcategory']."',name='".$dvar['name']."',description='".$dvar['description']."',availability='".$dvar['availability']."',quantity='".$dvar['quantity']."' where id='".$id."'";
     		$exec4=mysql_query($sql4) or die(mysql_error());
			if($exec4)
			{
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
		
			move_uploaded_file($tmp[$counter],$path);
			$counter++;	
			}
			}
		 	$msg="Record updated";
			$response="success";
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
       
	   <?php include('include/header.php');?>
       <!--header end-->
       <!--content start-->
        <div class="content" >
         <?php include('include/ui.php');?>
        
            <div class="clear"></div>
          <div class="content1b">
            <form method="post"  enctype="multipart/form-data">
              <table border="0" vspace="40px;" >
                <tr>
                  <td colspan="2" height="60px;" ><div style="border:0px solid blue; height:20px; width:250px; margin-left:105px;">
   <!-------------------------msg for printing error------------------------------------------>
                      <?php
				
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
						?>
                        
   <!-------------------------msg for printing error end------------------------------------------>

                    </div>
                    <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Select Products</u></span></td>
                </tr>
                <tr>
                  <td><span style="font-size:17px;">Subcategory <span style="color:#F00;">*</span></span></td>
      <!-------------------------selection list------------------------------------------>

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
   <!-----------------------------selection list-------------------------------------->

                </tr>
                <tr >
                  <td width="100px" ><span style="font-size:20px;">Name<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="name" value="<?php echo $fetch['name']?>" class="textbox" /></td>
                </tr>
                 <tr>
                  <td width="100px" ><span style="font-size:20px;"> Description</span></td>
                  <td><textarea name="description" id="address" rows="3" cols="15"  placeholder="Enter description" style="width:245px; height:55px; border-radius:4px;" ><?php echo $fetch['description']?></textarea></td>
                </tr>
                  <tr >
                  <td width="100px" ><span style="font-size:20px;">Price<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="price" value="<?php echo $fetch['price']?>" class="textbox" /></td>
                </tr>
                 <tr >
                  <td width="100px" ><span style="font-size:20px;">Availaibility</span></td>
                 <td style="width:200px"><span style="font-size:20px;"><input type="radio" name="availability"  checked="checked" value="1" <?php if($dvar['availability']=="1"){echo 'checked=checked';}?>  /> 
                <span style="color:green" >In stock</span>
      <input type="radio" name="availability"  value="0"<?php  if($dvar['availability']=="0"){echo 'checked=checked';}?> />
      <span style="color:red" >Out of  stock</span> </span></td>
                </tr>
                  <tr >
                  <td width="100px" ><span style="font-size:20px;">Quantity<span style="color:#F00;">*</span></span></td>
                  <td><input type="text" name="quantity" value="<?php echo $fetch['quantity']?>" class="textbox" /></td>
                </tr>
                <tr>
                  <td width="100px" ><span style="font-size:20px;">
                    <div style="width:50; height:50px;">
                      <label for="file">Filename</label>
                    </div>
                    </span></td>
                  <td><?php
					while($fetch_q = mysql_fetch_assoc($exec5)){
						//print_r($fetch_q)
				 ?>
                    <div style="width:100px; float:left; padding:2px;"> <img src="<?php if($fetch_q['image'] <> ""){echo '../uploadimage/'.$fetch_q['image'];}else{echo '../uploadimage/1.jpg';}?>" alt="" height="50;" width="50;" class="imageborder";> <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=edit&id=<?php echo $id;?>&del_id=<?php echo $fetch_q["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </div>
                    <?php $i++;}?>
                 
                  <input type="file" name="image[]" multiple/>
                    <img src="<?php if($name <> ""){echo '../uploadimage/'.$image_name;}else{echo '../uploadimage/1.png';} ?>" height="50" width="50">
                  <?php    ?>
                </tr>
                
                <tr >
                  <td width="100px" ><span style="font-size:20px;">Add new images</span></td>
                  <td><input type="file" name="image[]" multiple/></td>
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
			