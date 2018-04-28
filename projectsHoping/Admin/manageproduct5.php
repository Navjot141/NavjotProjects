<?php
include 'config_dbase.php';
include_once ('function.php');
$sql="SELECT * FROM product ";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);
$do = $_GET['do'];
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 8;
$startpoint = ($page * $limit) - $limit;
$search = $_GET['search'];
//to make pagination
 $statement1 = " `product` where 1 = 1";
if(isset($search) && $search <> "" && $search <> 'search')
{
   $statement1.=" AND name like '%".$search."%'";
}
$statement = $statement1;


/*$parpage=10;
$main_page='manageproduct.php';
$table='product';
include('include/pages.php');
$sql="select * from  $table ";
$sqr=mysql_query($sql);
*/
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
 if($_GET['do']=="avail"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET availability='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    
 }
  if($_GET['do']=="avail1"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET availability='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    
 }	 
 if($_GET['do']=="featured"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET featured='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    
 }
  if($_GET['do']=="featured1"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET featured='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    
 }
/*$sql="select * from  $table  order By time desc LIMIT $start_from,$parpage"; 
 $search=$_GET['search'];
	if(isset($search) && $search <> "" && $search <> 'search')
	{
	$sql="select * from  $table where name like'%".$search."%'  order By time desc LIMIT $start_from,$parpage";   

	}	  

$exec=mysql_query($sql);
$num=mysql_num_rows($exec);*/
$sql ="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
$exec = mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($exec);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/manageproduct1.css" rel="stylesheet" type="text/css" />
<link href="CSS/pagination.css" rel="stylesheet" type="text/css" />
<link href="CSS/grey.css" rel="stylesheet" type="text/css" />
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
</head>
<body onload="startTime()"  style="background-color:#ededed">
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
        <?php include('include/header.php');?>
        <div class="content" >
          <?php include 'include/ui.php'; ?>
            <div class="content1b">
              <div class="content1ba" >
                <div style="border:0px solid #999; width:100px; height:40px; float:left; font-size:22px; padding-top:8px; ">Products</div>
                <div class="content1ba1 " ><a href="add_product.php"><span class="add1"></span> <span class="head">Products</span></a> </div>
                <div class="search1">
  <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" name="search" value="<?php echo $search;?>" class="textbox" placeholder="Search" />
                <input type="submit" name="submit" value="" class="submit" />
              </form>        </div>
                <div class="content1ba2"></div>
              </div>
              <div class="entry">
                <div class="entry1"></div>
                <div class="entry2"><span class="text">Name</span></div>
                <div class="position"><span class="text1">Availability</span></div>
                 <div class="position"><span class="text1">Featured</span></div>
                <div class="position"><span class="text1">Displayed</span></div>
                
                <div class="positionAC"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</span></div>
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
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

                  <input type="checkbox" name="delete[]" value="<?php echo $fetch['id']?>"/>
                </div>
                <div class="entry2"><span class="text"><?php echo $val2["name"]; ?></span></div>
                <div class="position"><span class="text">
                   <?php if($fetch['availability']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=avail&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=avail1&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                   <div class="position"><span class="text">
                    <?php if($fetch['featured']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=featured&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=featured1&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="position"><span class="text">
                  <?php if($fetch['status']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=disable&id=<?php echo $fetch['id'];?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=enable&id=<?php echo $fetch['id'];?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="positionAC"><span class="text1a"> &nbsp;<a href="view_product.php?id=<?php echo $val2["id"];?>"  style="color:#000;" title="view" ><img src="images/view.png" title="view" /> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="editproduct.php?do=edit&id=<?php echo $val2["id"];?>" style="color:#6F6;"" title="edit" ><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="deleteproduct.php?id=<?php echo $val2["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </span></div>
              </div>
              
              <?php $i++;}}?>
              
              <div style="float:left; margin-left:200px; "> <?php echo pagination($statement,$limit,$page);?>
             </div>
                </div>
                <div class="clear"></div>
           
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