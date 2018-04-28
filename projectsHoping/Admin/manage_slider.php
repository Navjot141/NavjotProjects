<?php
include 'config_dbase.php';
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
	   $sql5="DELETE  FROM slider where id='".$v."'";
		$exec4=mysql_query($sql5);
	}
   }
  }
   if($_GET['do']=="disable")
  {
	  
	  $id=$_GET['id'];
	  $sql="UPDATE slider SET status='0' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	  
	  
	  }
	   if($_GET['do']=="enable")
     {
	  $id=$_GET['id'];
	  $sql="UPDATE slider SET status='1' where id='".$id."'";
	  $exec=mysql_query($sql) or die(mysql_query());
	  
	  
	  }
$sql="SELECT * FROM slider ";
$exec=mysql_query($sql);
$num=mysql_num_rows($exec);






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/manage_category.css" rel="stylesheet" type="text/css" />
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
          <?php include 'ui.php'; ?> 
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="content1b1">
              <div class="content1ba" >
                <div style="border:0px solid #999; width:100px; height:40px; float:left; font-size:18px; padding-top:8px; ">Slider</div>
                <div class="content1ba1 " ><a href="addslider.php"><span class="add1"></span> <span class="head">Add</span></a> </div>
                <div class="search1">
                  <input type="text" name="search" value="Search" class="textbox" placeholder="Search" />
                  <input type="submit" name="submit" value="" class="submit" />
                </div>
                <div class="content1ba2"></div>
              </div>
              <div class="entry4">
                <div class="entry5"></div>
                <div class="entry6"><span class="text" >Image</span></div>
                <div class="entry7"><span class="text">Title</span></div>
                <div class="entry8"><span class="text">Descripition</span></div>
                <div class="position1"><span class="text1">Displayed</span></div>
                <div class="position1"><span class="text1">&nbsp;&nbsp;&nbsp;Action</span></div>
              </div>
              <?php $i=0;
      if($num==0){
     echo '<div style="width: 235px;font-weight: bold;padding-top: 9px;padding-left: 300px;float: left;font-size: 14px;color: #333;"> No request found </div>';
    }
    else{
		$i=0;
     while($fetch = mysql_fetch_assoc($exec)){
		 $val2=$fetch;?>
              <div class="entry4">
                <div class="entry5">
                  <input type="checkbox" name="delete[]" value="<?php echo $fetch['id']?>"/>
                </div>
                    <div class="entry6"><span class="text"><img src="<?php if($val2['image'] <> ""){echo '../uploadimage/'.$val2['image'];}?>"alt="" height="90px"; width="100px;"></span></div>
                <div class="entry7"><span class="text"><?php echo $val2["title"]; ?></span></div>
                 <div class="entry8"><span class="text"><?php echo strlen($val2['textarea']) >30 ? substr($val2['textarea'], 0,30)." ....." : $val2['textarea']; ?></span></div>
                <div class="position1"><span class="text">
                  <?php if($fetch['status']==1) {?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=disable&id=<?php echo $fetch['id'];?>"><img src="images/enabled.gif" title="disable"/></a>
                  <?php  } else{ ?>
                  <a href="<?php echo $_SERVER['PHP_SELF'];?>?do=enable&id=<?php echo $fetch['id'];?>"><img src="images/disabled.gif" title="enable"/></a>
                  <?php  }       ?>
                  </span></div>
                <div class="position1"><span class="text1a"> <a href="editslider.php?do=edit&id=<?php echo $val2["id"];?>" style="color:#6F6;"" title="edit" ><img src="images/edit.png" /></a> &nbsp;&nbsp;&nbsp;<a href="delete_slider.php?id=<?php echo $val2["id"];?>" style="color:#F00;;" title="delete" ><img src="images/delete.png" title="delete" /></a> </span></div>
              </div>
              <?php $i++;}}?>
            </div>
            <input type="submit" name="delete1" value="delete" class="delete"  />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>