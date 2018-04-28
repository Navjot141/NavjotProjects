<?php
include 'config_dbase.php';
/*include_once ('../function.php');

$do = $_GET['do'];
//echo $_GET["page"];
$page = (int)(!isset($_GET["page"]) || $_GET["page"] == "") ? 1 : $_GET["page"];
$limit = 10;
$startpoint = ($page * $limit) - $limit;

$search = $_GET['search'];
//to make pagination
 $statement1 = " `product` where 1 = 1";
if(isset($search) && $search <> "" && $search <> 'search')
{
   $statement1.=" AND name like '%".$search."%'";
}
$statement = $statement1;

//serch code ends

//code for deleting through checkbox
if($_POST['delete1'] == 'delete')
{ 
    //print_r($_POST);
  $delete = $_POST['delete'];       
   // print_r($delete);
   $a=$delete;
   if(count($a)==0)
   { 
     $msg="Please select atleast one checkbox";
	 $response="error";
   }
   else{
	foreach($delete as $k=>$v)
	if(!empty($v))
	{ 
	   $sql5="DELETE  FROM product where id='".$v."'";
		$exec4=mysql_query($sql5);
	}
   }
  }
    if($_GET['go']=="del" && $_GET['id']<>"")
{
	
	$sql6="delete  from product where id=".$_GET['id']."";
     $exec6=mysql_query($sql6);
    if($exec6){
		$msg="deleted";
		$response="success";	
    }
    else
	{
		$msg=" not deleted";
		$response="error";	
    }
}
  
  if($_GET['do']=="disable" && $_GET['id']<>"")
  {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET status='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="Entry disabled";
		  $response="success";
      }
	  
	  }
	   if($_GET['do']=="enable"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET status='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="Entry enabled";
		  $response="success";
      }
 }
  if($_GET['do']=="featured"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET featured='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="product not featured";
		  $response="error";
      }
 }
  if($_GET['do']=="featured1"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET featured='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="product featured";
		  $response="success";
      }
 }
  if($_GET['do']=="avail"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET availability='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="product out of stock";
		  $response="error";
      }
 }
  if($_GET['do']=="avail1"&& $_GET['id']<>"")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE product SET availability='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	    if($exec)
	  {
		  $msg="product in stock";
		  $response="success";
      }
 }
 
/*$sql="SELECT * FROM product ";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);
*/

//get the function

/*$sql ="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
$exec = mysql_query($sql) or die(mysql_error());
$num=mysql_num_rows($exec);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php /*?><?php if($msg <> "" && $response == "success"){?>
<meta http-equiv="refresh" content="3; URL=manageproduct.php?do=<?php echo $do;?>&id=<?php echo $id;?>&page=<?php echo $page;?>">
<?php }?><?php */?>
<title>Untitled Document</title>
<link href="CSS/manageproduct.css" rel="stylesheet" type="text/css" />
<!--<link href="CSS/pagination.css" rel="stylesheet" type="text/css" />
	<link href="CSS/grey.css" rel="stylesheet" type="text/css" />-->
   <style type="text/css">
        .records {
            width: 510px;
            margin: 5px;
            padding:2px 5px;
            border:1px solid #B6B6B6;
        }
        
        .record {
            color: #474747;
            margin: 5px 0;
            padding: 3px 5px;
        	background:#E6E6E6;  
            border: 1px solid #B6B6B6;
            cursor: pointer;
            letter-spacing: 2px;
        }
        .record:hover {
            background:#D3D2D2;
        }
        
        
        .round {
        	-moz-border-radius:8px;
        	-khtml-border-radius: 8px;
        	-webkit-border-radius: 8px;
        	border-radius:8px;    
        }    
        
        p.createdBy{
            padding:5px;
            width: 510px;
        	font-size:15px;
        	text-align:center;
        }
        p.createdBy a {color: #666666;text-decoration: none;}        
    </style>  
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
<body onload="startTime()">
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
         <?php include('include/header.php');?>
        <div class="content" >
         <?php include('include/ui.php');?>
          <div class="content1aa">
           <?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
		?> </div>
          
            <div class="content1b">
              <div class="content1ba" >
                <div style="border:0px solid #999; width:100px; height:40px; float:left; font-size:22px; padding-top:8px; ">Products</div>
                <div class="content1ba1 " ><a href="addproduct.php"><span class="add1"></span> <span class="head">Products</span></a> </div>
                <div class="search1">
                  <form method="GET" >
                  <input type="text" name="search" value="<?php echo $search;?>" class="textbox" placeholder="Search" />
                  <input type="submit" name="submit" value="" class="submit" />
                </form>
                </div>
                <div class="content1ba2"><input type="button" value="Refresh " class="refresh" onclick="location.reload(true);" />
</div></div>
              <div style="float:left;">
                <form method="post">
               <div class="entry">
                <div class="entry1a"></div>
                <div class="entry2a"><span class="text">Name</span></div>
                <div class="position2"><span class="text1">Displayed</span></div>
                <div class="position2"><span class="text1">Discription</span></div>
                <div class="position1a"><span class="text1">Availability</span></div>
                <div class="position1a"><span class="text1">Quantity</span></div>
                <div class="position1a"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</span></div>
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
                <div class="entry1a">
                  <input type="checkbox" name="delete[]" value="<?php echo $fetch['id']?>"/>
                </div>
                <div class="entry2a"><span class="text"><?php echo $val2["name"]; ?></span></div>
                <div class="position2"><span class="text">
                  <?php if($fetch['status']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=disable&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=enable&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                    <div class="position2">
                 
                  </span></div>
                   <div class="position1a"><span class="text1">
                   <?php if($fetch['availability']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=avail&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=avail1&id=<?php echo $fetch['id'];?>&page=<?php echo $page;?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="position1a"><span class="text1"><?php echo $fetch['quantity']?></span></div>
                <div class="position1a"><span class="text1a"> &nbsp;<a href="view_prod.php?id=<?php echo $val2["id"];?>"  style="color:#000;" title="view" ><img src="images/view.png" title="view" /> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="add_editproduct.php?do=edit&id=<?php echo $val2["id"];?>" style="color:#6F6;"" title="edit" ><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="manageproduct.php?go=del&id=<?php echo $val2["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </span></div>
              </div>
              <?php $i++;}}?>
   <div style="float:left; margin-left:200px; margin-top:50px;"> <?php	echo pagination($statement,$limit,$page);?></div>
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

</body>
</html>