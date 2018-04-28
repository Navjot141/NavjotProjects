<?php 
error_reporting(0);
include 'config_dbase.php';
include 'config.php';
$main_id=$_REQUEST['main_id'];
$sub_id=$_REQUEST['sub_id'];
//include_once ('include/function.php');
$search=$_GET['search_txt'];
$id=$_GET['id'];
//echo $id;
$id1=$_GET['id1'];
echo $id1;
$search1=$_GET['search'];
$do=$_GET['do'];
 $sql_search="SELECT product.id as pdt_id,product.price as pdt_price,product.description as pdt_des,product.name as pdt_name from product where name='".$search."'";
 $exec_search=mysql_query($sql_search)or die(mysql_error());
 $num_search=mysql_num_rows($exec_search);
  $sql_sea="SELECT product.id as pdt_id,product.price as pdt_price,product.description as pdt_des,product.name as pdt_name,product.subcategory as subid from product where name='".$search."'";
 $exec_sea=mysql_query($sql_sea)or die(mysql_error());
 $num_sea=mysql_num_rows($exec_sea);
  $f=mysql_fetch_assoc($exec_sea);


?><!DOCTYPE html>
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
         <?php include('include/header_left.php');?>
       
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
        <!--Category End -->
        <!--Refine Search Start-->
        <div class="box">
          <!--<div class="box-heading">Refine Search</div>-->
          <div class="box-content">
            <ul class="box-filter">
       <!--  <li><span id="filter-group">Price</span>
              
              </li> -->
            </ul>
            <!--<a id="button-filter" class="button">Refine Search</a>--> </div>
        </div>
        <!--Refine Search End-->
        <!--Latest Product Start-->
        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                <?Php
				$countid="";
				 $sql_LATEST="select product.*,product_image.image from product inner join product_image on
				 product.id=product_image.product_id where product.status='1' order by time DESC LIMIT 0,10";
					$exec_LATEST=mysql_query($sql_LATEST);
					while($fetch_LATEST=mysql_fetch_assoc($exec_LATEST)) 
					{
					if($countid!=$fetch_LATEST['id'])	
					{
					?>
                  <li>
                    <div class="slide-inner">
                      <div class="image" style="width:45px; height:45px;"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>"><img src="uploadimage/<?php echo $fetch_LATEST['image'];?>" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory'];?>"><?php echo $fetch_LATEST['name'];?></a></div>
                      <div class="price"><?php echo $fetch_LATEST['price'];?></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                   <?php } 
				  $countid=$fetch_LATEST['id'];
					}
				  ?>
                 </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->
        <!--Banner Start-->
        <div class="banner">
          <div><a href="#"><img src="image/product/small-banner1-220x350.jpg" alt="banner" title="banner" /></a></div>
        </div>
        <!--Banner End-->
      </div>
      <!--Middle Part Start-->
      
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.php">Home</a> &raquo; <a href="#">Electronics</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Electronics</h1>
        <div class="product-filter">
       
          <div class="display"><b>Display:</b><a href="search.php?id=<?php echo $id1 ?>&search=<?php echo $search1?>" class="grid1-icon">Grid</span></a> 
          
          
          <a href="search_list.php?id=<?php echo $f['pdt_id']  ?>&search=<?php  echo $search   ?>" class="list-icon">List</a></div>
      <!--    <div class="limit"><b>Show:</b>
            <select >
              <option value="15" selected="selected">15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>-->
          <div class="sort"><b>Sort By:</b>
            <select>
              <option value="" selected="selected">Default</option>
              <option value="">Name (A - Z)</option>
              <option value="">Name (Z - A)</option>
              <option value="">Price (Low &gt; High)</option>
              <option value="">Price (High &gt; Low)</option>
              <option value="">Rating (Highest)</option>
              <option value="">Rating (Lowest)</option>
              <option value="">Model (A - Z)</option>
              <option value="">Model (Z - A)</option>
            </select>
          </div>
        </div>
        <div class="product-compare"><a href="#" id="compare-total">Total Products(<?php echo $num_search;?>)</a></div>
        <!--Product Grid Start-->
        <div class="product-grid">
          <?php $i=0;
		   if($num_search==0){
     echo '<div style="width: 410px;font-weight: bold;padding-top: 9px;padding-left: 121px;float: left;font-size: 14px;color:rgb(86, 179, 86);"> No product  found</div>';
    }
    else{ while($fetch_search = mysql_fetch_assoc($exec_search))
		  //print_r($fetch_n);
		  {
			   $sql_s= "SELECT image FROM product_image WHERE product_id='".$fetch_search["pdt_id"]."' limit 0,1" ;
			  $exec_s=mysql_query($sql_s);
			  ?>
          <div>
           <?php while($fetch_s = mysql_fetch_assoc($exec_s))
		   
		 
		   {
			?>
            <div class="image"><a href="product.php?prod_id=<?php echo $fetch_search['pdt_id']  ?>&sub_id=<?php echo $f['subid'];?>"><img src="<?php if($fetch_s['image'] <> ""){echo 'uploadimage/'.$fetch_s['image'];}else{echo 'uploadimage/1.jpg';}?>" title="Canon EOS 5D" alt="Canon EOS 5D" height="130" width="130"; /></a></div>
            <?php  } ?>
           
            <div class="name"><a href="product.php?id=<?php echo $fetch_search['pdt_id']  ?>"><?php echo $fetch_search["pdt_name"];?></a></div>
            <div class="name"><?php echo $fetch_search["pdt_des"];?></div>
            <div class="price"><!-- <span class="price-old">$119.50</span>--> <span class="price-new">Rs <?php echo $fetch_search['pdt_price']?></span> <br />
             <!-- <span class="price-tax">Ex Tax: $80.00</span>--> </div>
            <div class="cart"><a href="search.php?do=addtocart&pid=<?php echo $fetch_search['pdt_id'] ?>&search_txt=<?php echo $search ?>"> <span style="color:red ; border:3px solid #d45c93;; border-radius:4px solid #d45c93;; background-color:#d45c93;; color:#FFF; font-size:13px;"> Add to cart</span></a>
            </div>
           <!-- <div class="rating"><img src="image/stars-2.png" alt="Based on 1 reviews." /></div>-->
          </div>
          <?php $i++;}}  ?>
        </div>
        <!--Product Grid End-->
        <!--Pagination Part Start-->
       <!-- <div class="pagination">
          <div class="links">  pagination</div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div>-->
        <!--Pagination Part End-->
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
   <?php include"include/footer.php" ?>
  <!--Footer Part End-->
</div>
</body>
</html>