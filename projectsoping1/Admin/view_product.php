<?php
error_reporting(0);
include 'config_dbase.php';
 $id=$_GET['id'];
 /*$sql="SELECT category.name as cat_name,subcategory.name as subcat_name, product.id as pdt_id,product.name as pdt_name,product.status as pdt_status,product_details.image as pro_image from category left outer join subcategory on (category.id=subcategory.category) left outer join product on(subcategory.id=product.subcategory)
  left outer join product_details on(product.id=product_details.product_id) where product.id='".$id."'";
*/
 $sql="SELECT category.name as cat_name,subcategory.name as subcat_name, product.id as pdt_id,product.name as pdt_name,product.status as pdt_status from category left outer join subcategory on (category.id=subcategory.category) left outer join product on(subcategory.id=product.subcategory)
  where product.id='".$id."'";

 $exec=mysql_query($sql);
 $num=mysql_num_rows($exec);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="CSS/addeditcategory.css" rel="stylesheet" type="text/css" />
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
if(isset($msg) && $msg <> "" && $response=="error"){
	echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
}
if(isset($msg) && $msg <> "" && $response=="success")
{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}

?>
<div align="center">
  <div class="outerdiv">
    <div class="innerdiv">
      <div class="header">
        <?php include 'header.php';; ?>
        <div class="content" >
          <div class="content1a">
            <?php include 'ui.php';; ?>
          </div>
          <div class="content1b">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>?do=<?php echo $do;?>&id=<?php echo $id;?>">
              <table border="0" style="margin-top:100px; align:left;">
                <tr>
                  <td colspan="2"><span style="font-size:20px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Product</u></span></td>
                </tr>
                <?php $i=0;
      if($num==0){
     echo '<div style="width: 235px;font-weight: bold;padding-top: 9px;padding-left: 300px;float: left;font-size: 14px;color: #333;"> No request found </div>';
    }
    else{
		$i=0;
     while($fetch = mysql_fetch_assoc($exec)){
		 $sql1 = "SELECT * FROM product_image WHERE product_id='".$fetch["pdt_id"]."' AND status='1'";
		 $exec1 = mysql_query($sql1);
		 		 $val2=$fetch;
     ?>
                <tr >
                  <td width="200px" ><span style="font-size:20px">Category :</span></td>
                  <td width="200px;"><span style="font-size:20px"> <?php echo $val2['cat_name']    ?> </span></td>
                </tr>
                <tr >
                  <td width="200px" ><span style="font-size:20px">Subcategory :</span></td>
                  <td width="200px;"><span style="font-size:20px"> <?php echo $val2['subcat_name']    ?> </span></td>
                </tr>
                <tr >
                  <td width="200px" ><span style="font-size:20px">Product :</span></td>
                  <td width="200px;"><span style="font-size:20px"> <?php echo $val2['pdt_name']?></span></td>
                </tr>
                <tr > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <td height="30px"><span style="font-size:20px">Status :</span></td>
                  <td><span style="font-size:20px; color:red;">
                    <?php if($val2["pdt_status"] ==1){ echo "<span style='color:green'>Active</span>";} else{ echo "<span style='color:red'>Inactive</span>";}   ?>
                    </span></td>
                </tr>
                <?php $j=1;while($fetch_q = mysql_fetch_assoc($exec1)){?>
                <tr >
                  <td width="200px" ><span style="font-size:20px">Product Image <?php echo $j;?>:</span></td>
                  <td width="200px;"><span style="font-size:20px"> <img src="<?php if($fetch_q['image'] <> ""){echo '../uploadimage/'.$fetch_q['image'];}else{echo '../uploadimage/1.png';}?>" alt="" height="100" width="100"> </span></td>
                </tr>
                <?php $j++;}?>
                <tr>
                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" name="Close" value="Close" class="cancel"  onclick="window.location='managecategory.php'" /></td>
                </tr>
                <?php $i++;}}?>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>