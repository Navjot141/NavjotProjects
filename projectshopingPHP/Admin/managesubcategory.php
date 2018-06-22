
<?php
include 'config_dbase.php';
include_once ('function.php');
$sql="select * from subcategory";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);
$do = $_GET['do'];
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 8;
$startpoint = ($page * $limit) - $limit;
$search = $_GET['search'];
//to make pagination
 $statement1 = " `subcategory` where 1 = 1";
if(isset($search) && $search <> "" && $search <> 'search')
{
   $statement1.=" AND name like '%".$search."%'";
}
$statement = $statement1;
if($_GET['do']=="disable")
  {
	  $id=$_GET['id'];
	  $sql="UPDATE subcategory SET status='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	  
	  
	  }
	   if($_GET['do']=="enable")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE subcategory SET status='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	 }
/*$search=$_GET['search'];

	$sql="SELECT * FROM subcategory";
	if(isset($search) && $search <> "" && $search <> 'search')
	{
	  $sql.=" where name like '%".$search."%'";
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
<link href="CSS/managesubcategory.css" rel="stylesheet" type="text/css" />
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
        <?php include 'header.php'; ?>
        </div>
        <div class="content" >
             <?php include'ui.php'; ?>
      
            <div class="content1b">
              <div class="content1ba" >
                <div style="border:0px solid #999; width:100px; height:40px; float:left; font-size:18px; padding-top:8px; ">Subcategory</div>
                <div class="content1ba1 " ><a href="addsubcategory.php"><span class="add1"></span> <span class="head">Subcat</span></a> </div>
                <div class="search1">
                   <form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
                <input type="text" name="search" value="<?php echo $search;?>" class="textbox" placeholder="Search" />
                <input type="submit" name="submit" value="" class="submit" />
              </form>       </div>
                <div class="content1ba2"></div>
              </div>
              <div class="entry">
                <div class="entry1"></div>
                <div class="entry2"><span class="text">Name</span></div>
                <div class="position"><span class="text1">Displayed</span></div>
                <div class="position"><span class="text1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</span></div>
              </div>
               <?php
while($fetch=mysql_fetch_assoc($exec))
{
?>              <div class="entry">
                <div class="entry1">
                    <form method="post" action="deletesubcategory.php">
                  <input type="checkbox" name="chid[]" value="<?php echo $fetch['id']?>"/>
                </div>
                <div class="entry2"><span class="text"><?php echo $fetch['name']; ?></span></div>
                <div class="position"><span class="text">
                  <?php if($fetch['status']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=disable&id=<?php echo $fetch['id'];?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=enable&id=<?php echo $fetch['id'];?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="position"><span class="text1a"> &nbsp;<a href="view_subcat.php?id=<?php echo $fetch["id"];?>" style="color:#000;" title="view" ><img src="images/view.png" title="view" /> </a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="editsubcategory.php?do=edit&id=<?php echo $fetch["id"];?>" style="color:#6F6;"" title="edit" ><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="deletesubcategory.php?id=<?php echo $fetch["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </span></div>
               
              </div>
              <?php }?>
              <div style="float:left; margin-left:200px; "> <?php echo pagination($statement,$limit,$page);?>
             </div>
                          </div> 
            <input type="submit" name="delete" value="delete" class="delete"  />
             
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>