<?php
error_reporting(0);
include 'config_db.php';
$id=$_GET['id'];
$do=$_GET['do'];
if($_GET['do'] =='edit'){
	$sql2="SELECT * FROM subcategory where id='".$id."'";
	$exec2=mysql_query($sql2);
	$fetch=mysql_fetch_assoc($exec2);
	$dvar['name']=$fetch['name'];
	 $dvar['category']=$fetch['category'];
	 //print_r( $dvar['category']);
}
$sql="SELECT id,name FROM category where status='1' ORDER BY name ASC " ;
$exec=mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($exec);
if($_POST['submit']=='submit')
{
     $dvar['category']=($_POST['category']);
	$dvar['name']=mysql_real_escape_string(trim($_POST['name']));
	if($dvar['name']=='')
	{
		$msg="Please enter name";
		$response="error";
	}
	
	else
	
	{
		if($_GET['do'] =='edit')
		{
	
	   $sql3="UPDATE subcategory SET category='".$dvar['category']."',name='".$dvar['name']."' where id='".$id."'";
	  
			}
		else{
		$sql3="INSERT into subcategory(category,name,status,time)Values('".$dvar['category']."','".$dvar['name']."','".'1'."','".time()."')";
		
		}
		$exec3=mysql_query($sql3);
		if($exec)
		{
			$msg="Record updated";
			$response="success";
			}
		else
		{
			echo "Not Inserted";
			}
		
}}
	
	if($_GET['do'] =='edit'&& $msg<>""){
	$sql2="SELECT * FROM subcategory where id='".$id."'";
	$exec2=mysql_query($sql2);
	$fetch=mysql_fetch_assoc($exec2);
	$dvar["name"]=$fetch['name'];
	 $dvar['category']=$fetch['category'];
	 //print_r( $dvar['category']);
}
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/addeditcategory.css" rel="stylesheet" type="text/css" />
</head>
<body >
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
    <div class="header2a1"><a href= "#" style="color:#000;">Update profile</a></div>
    <div class="header2a2"><a href= "#" style="color:#000;">Logout</a></div>
  </div>
  <div class="header2a3"> </div>
</div>
<div class="content" >
<div class="content1a">
  <ul >
    <li><a href="#">Home</a>
      <ul>
        <li><a href="masnagecategory.php"><span style="width:120px; height:40px; font-size:21px;">Manage category</span> </a></li>
        <li><a href="managesubcategory.php"><span style=" font-size:19px;">Manage Sucategory</span></a></li>
        <li><a href="manageproduct.php"><span style=" font-size:21px;">Manage Products</span></a></li>
      </ul>
    </li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Blogs</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>
</div>
<div class="content1b">
<table border="0" vspace="100px;" style="margin-top:100px;">
  <form method="post" action="<?php  echo $_SERVER['PHP_SELF']?>?do<?php echo $do ;?>&id=<?php echo $id;?>">
    <tr>
      <td colspan="2" height="60px;" ><div style="border:0px solid blue; height:20px; width:250px; margin-left:105px;">
          <?php
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>
        </div>
        <span style="font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Select Subcategory</u></span></td>
    </tr>
    <tr>
      <td><span style="font-size:20px;">Category*</span></td>
      <td><select style="width:250px; border-radius:8px; height:28px; border:1px solid #CCC; outline:none;" name="category">
          <?php while($fetch1=mysql_fetch_assoc($exec)) {?>
          <option value="<?php echo $fetch1["id"];?>" <?php if( $dvar['category']==$fetch1["id"]) { echo 'selected=selected';}?>><?php echo $fetch1["name"];?></option>
          <?php }?>
        </select></td>
    </tr>
    <tr >
      <td width="100px" ><span style="font-size:20px;">Name *</span></td>
      <td><input type="text" name="name" value="<?php echo $dvar['name']?>" class="textbox" /></td>
    </tr>
    <tr >
      <td colspan="2"><input type="submit" name="submit" value="submit" class="submit" />
        <input type="button" name="cancel" value="Cancel"class="cancel"  onclick="window.location='managesubcategory.php'" /></td>
    </tr>
  </form>
</table>
</div></div></div></div></div></div></body></html>