<?php
include 'config_db.php';
if($_POST['delete1'] == 'delete')
{ 
    //print_r($_POST);
  $delete = $_POST['delete'];       
   // print_r($delete);
   $a=$delete;
   if(count($a)==0)
   { 
     $msg="Please select atleast one checkbox";
   }
   else{
	foreach($delete as $k=>$v)
	{ 
	   $sql5="DELETE  FROM product where id='".$v."'";
		$exec4=mysql_query($sql5);
	}
   }
  }
  
  if($_GET['do']=="disable")
  {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET status='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	  
	  
	  }
	   if($_GET['do']=="enable")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET status='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	  
	  
	  }
$sql="SELECT * FROM product ";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/manage_category.css" rel="stylesheet" type="text/css" />
</head>
<body >
<?php
if(isset($msg)&& $msg<>'')
{
	echo "<div style='color:red;'>".$msg."</div>";
}
?>
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
        <div class="header1">
          <div class="headera"><a href="images/image_11.png"></a></div>
          <div class="headerb"> ADMIN PANEL</div>
        </div>
        <div class="header2">
          <div class="header2a">
            <div class="header2a1"><a href= "update.php" style="color:#000;">Update profile</a></div>
            <div class="header2a2"><a href= "login.php" style="color:#000;">Logout</a></div>
          </div>
          <div class="header2a3"> </div>
        </div>
        <div class="content" >
          <ul class="content1a">
            <li><a href="#">Home</a>
              <ul>
                <li><a href="managecategory.php"><span style="width:120px; height:40px; font-size:21px;">Manage category</span> </a></li>
                <li><a href="managesubcategory.php"><span style=" font-size:19px;">Manage Sucategory</span></a></li>
                <li><a href="manageproduct.php"><span style=" font-size:21px;">Manage Products</span></a></li>
              </ul>
            </li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="content1b">
              <div class="content1ba" >
                <div style="border:0px solid #999; width:100px; height:40px; float:left; font-size:22px; padding-top:8px; ">Products</div>
                <div class="content1ba1 " ><a href="add_editproduct.php"><span class="add1"></span> <span class="head">Products</span></a> </div>
                <div class="search1">
                  <input type="text" name="search" value="Search" class="textbox" placeholder="Search" />
                  <input type="submit" name="submit" value="" class="submit" />
                </div>
                <div class="content1ba2"></div>
              </div>
              <div class="entry">
                <div class="entry1"></div>
                <div class="entry2"><span class="text">Name</span></div>
                <div class="position"><span class="text1">Displayed</span></div>
                <div class="position"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</span></div>
              </div>
              <?php $i=0;
      if($num==0){
     echo '<div style="width: 235px;font-weight: bold;padding-top: 9px;padding-left: 300px;float: left;font-size: 14px;color: #333;"> No request found </div>';
    }
    else{
		$i=0;
     while($fetch = mysql_fetch_assoc($exec)){
		 $val2=$fetch;?>
              <div class="entry">
                <div class="entry1">
                  <input type="checkbox" name="delete[]" value="<?php echo $fetch['id']?>"/>
                </div>
                <div class="entry2"><span class="text"><?php echo $val2["name"]; ?></span></div>
                <div class="position"><span class="text">
                  <?php if($fetch['status']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=disable&id=<?php echo $fetch['id'];?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=enable&id=<?php echo $fetch['id'];?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="position"><span class="text1a"> &nbsp;<a href="view_product.php?id=<?php echo $val2["id"];?>"  style="color:#000;" title="view" ><img src="images/view.png" title="view" /> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="add_editproduct.php?do=edit&id=<?php echo $val2["id"];?>" style="color:#6F6;"" title="edit" ><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="delete_subcat.php?id=<?php echo $val2["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </span></div>
              </div>
              <?php $i++;}}?>
            </div>
            <input type="submit" name="delete1" value="delete" class="delete" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>