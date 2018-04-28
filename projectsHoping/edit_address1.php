<?php
session_start();
include 'config_dbase.php';
include 'config.php';
//include 'config_db.php';
$id=$_GET['id'];
$sql_manage="SELECT * FROM users where id='".$id."'";
$exec_manage=mysql_query($sql_manage);


?>

<!DOCTYPE html>

<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Category(Grid) - Polishop eCommerce HTML Template</title>
<link href="image/favicon.png" rel="icon" />
<?php include('include/head.php');?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper"> 
    <!--Header Part Start-->
    <?php include('include/header.php');?>
    
    <!--Header Part End-->
    <div id="container">
      <div id="column-left"> 
        <!--Category Start -->
        
          <?php include('include/left_login.php');?>
        
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script> 
        </div>
        
        <!--Category End --> 
        <!--Refine Search Start--> 
        
      </div>
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="edit_address.php">Address</a>  </div>
        <!--Breadcrumb Part End-->
        <h1>Address</h1>
        
          <h2>Address book entries</h2><br>
          <div class="content">
          <table border="0" style="width:100%">
          <tbody>
                   <?php $i=0;while($fetch_manage=mysql_fetch_assoc($exec_manage))   {?>

          <tr>
          
          <td>
          <?php echo $fetch_manage['first_name']?>           
                      <?php echo $fetch_manage['last_name']?><br>
                      <?php echo $fetch_manage['address_1']?><br>
                      <?php echo $fetch_manage['address_2']?><br>
                      <?php echo $fetch_manage['city']?><br>
                      <?php echo $fetch_manage['postcode']?><br>
                      <?php echo $fetch_manage['country']?><br>
                      <?php echo $fetch_manage['region']?><br>
					 
          </td>
          <td>
          <input type="submit" class="button" value="DELETE" style="margin-left:8px; float:right; margin-right:30px; margin-top:-20px;">
       <a href="edit_add1.php?do=edit&id=<?php  echo $id?>"><input type="submit" class="button" value="EDIT" style="margin-left:100px; float:right; margin-top:-20px"></a>
          </td>
          </tr>
         <?php $i++;  }?>
          </tbody>
          </table>
          </div>
             <a href="my_account.php" ><input type="submit" name="submit" class="button" value="Back" style="width:80px; border-radius:2px;"></a>
            
         
     <a href="my_account.php" ><input type="submit" name="submit" class="button" value="Continue" onClick="my_account.php" style="width:80px; border-radius:2px; float:right; margin-top:2px;"></a>
            
      
      </div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include('include/footer.php');?>
<!--Footer Part End-->

</div>
</body>
</html>