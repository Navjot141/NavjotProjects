<?php 
include 'config_dbase.php';
include 'config.php';
$main_id=$_REQUEST['main_id'];
$sub_id=$_REQUEST['sub_id'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Sitemap - Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
     <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <div id="column-left">
        <!--Bestsellers Part Start-->
        <div class="box">
          <div class="box-heading">Bestsellers</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                      <div class="price">$1,177.00</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-45x45.jpg" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                      <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-45x45.jpg" alt="iPad Classic" /></a></div>
                      <div class="name"><a href="product.html">iPad Classic</a></div>
                      <div class="price">$119.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-45x45.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="product.html">Lotto Sports Shoes</a></div>
                      <div class="price">$589.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price">$131.25</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Bestsellers Part End-->
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
                      <div class="image" style="width:45px; height:45px;"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>"><img src="uploadimage/<?php echo $fetch_LATEST['image'];?>" alt="Friendly Jewelry" height="45px" width="45px"/></a></div>
                      <div class="name"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>">
                      <?Php echo $fetch_LATEST['name']?>
                      </a></div>
                      <div class="price"><?php echo $fetch_LATEST['price'];?></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <?Php
					}
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
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"><a href="index.php">Home</a> » <a href="sitemap.php">Site Map</a></div>
        <!--Breadcrumb Part End-->
        <h1>Site Map</h1>
        <div class="sitemap-info">
          <div class="left">
           <?php
			$sql="select * from category";
              $exec=mysql_query($sql);
			 $i=0; while($fetch=mysql_fetch_assoc($exec)){ 
		  $sql_subcat="select * from subcategory where category='".$fetch['id']."'";
		  $exec_subcat=mysql_query($sql_subcat);
		
		  ?>
            <ul class="sitemap">
              <li><a href="category.php?main_id=<?php echo $fetch['id'];?>"><?php echo $fetch['name'];?></a>
                <ul>
                 <?php while($fetch_subcat=mysql_fetch_assoc($exec_subcat)){ 
				      $sql_product="select * from product where subcategory='".$fetch_subcat['id']."' and status='1'";
				  $exec_product=mysql_query( $sql_product);
				  $num_product=mysql_num_rows($exec_product);
				  
				  ?>
                  <li><a href="category.php?main_id=<?php echo $fetch['id'];?>&sub_id=<?php echo $fetch_subcat['id']; ?>"><?php echo $fetch_subcat['name'];?>(<?php echo $num_product;?>)</a> </li>
                  <?php }?>
                  <!--<li><a href="category.html">Desktops</a> </li>
                  <li><a href="category.html">Components</a> </li>
                  <li><a href="category.html">Software</a> </li>
                  <li><a href="category.html">Phones &amp; PDAs</a> </li>
                  <li><a href="category.html">Cameras</a> </li>-->
                </ul>
              </li>
              <?php }?>
             <!-- <li><a href="category.html">Jewellery</a>
                <ul>
                  <li><a href="category.html">Children's Jewellery</a> </li>
                  <li><a href="category.html">Men's Jewellery</a> </li>
                  <li><a href="category.html">Women's Jewellery</a> </li>
                  <li><a href="category.html">Sample Test</a> </li>
                  <li><a href="category.html">Sample Test11</a> </li>
                  <li><a href="category.html">Sample Test12</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Shoes</a>
                <ul>
                  <li><a href="category.html">Children's Shoes</a> </li>
                  <li><a href="category.html">Men's Shoes</a> </li>
                  <li><a href="category.html">Women's Shoes</a> </li>
                  <li><a href="category.html">Test Sample</a> </li>
                  <li><a href="category.html">Test Sample1</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Clothing</a>
                <ul>
                  <li><a href="category.html">Men</a> </li>
                  <li><a href="category.html">Women</a>
                    <ul>
                      <li><a href="category.html">test 1</a></li>
                      <li><a href="category.html">test 2</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">Boys</a> </li>
                  <li><a href="category.html">Girls</a> </li>
                  <li><a href="category.html">Accessories</a> </li>
                  <li><a href="category.html">Sample Test21</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Kids</a>
                <ul>
                  <li><a href="category.html">Toys Kids</a> </li>
                  <li><a href="category.html">Games</a> </li>
                  <li><a href="category.html">Sample Test22</a> </li>
                  <li><a href="category.html">Sample Test15</a> </li>
                  <li><a href="category.html">Sample Kids</a> </li>
                  <li><a href="category.html">Sample Test6</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Watches</a>
                <ul>
                  <li><a href="category.html">Women's Watches</a> </li>
                  <li><a href="category.html">Men's Watches</a> </li>
                  <li><a href="category.html">Children's Watches</a> </li>
                  <li><a href="http://localhost/polishop/index.php?route=product/category&amp;path=33_48">Sample16</a> </li>
                  <li><a href="category.html">Sample17</a> </li>
                  <li><a href="category.html">test 18</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Sports</a>
                <ul>
                  <li><a href="category.html">Women's Sports</a> </li>
                  <li><a href="category.html">Children's Sports</a> </li>
                  <li><a href="category.html">Men's Sports</a> </li>
                  <li><a href="category.html">test 7</a> </li>
                  <li><a href="category.html">Sample 8</a> </li>
                  <li><a href="category.html">test 9</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Health</a>
                <ul>
                  <li><a href="category.html">Sample Test1</a> </li>
                  <li><a href="category.html">Sample Test2</a> </li>
                  <li><a href="category.html">test 20</a>
                    <ul>
                      <li><a href="category.html">test 25</a></li>
                    </ul>
                  </li>
                  <li><a href="category.html">test 21</a> </li>
                  <li><a href="category.html">test 22</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Furniture</a>
                <ul>
                  <li><a href="category.html">Bedrooms Furniture</a> </li>
                  <li><a href="category.html">Kidsrooms furniture</a> </li>
                  <li><a href="category.html">Kitchen Furniture</a> </li>
                  <li><a href="category.html">Showcase Furniture</a> </li>
                  <li><a href="category.html">Table Furniture</a> </li>
                  <li><a href="category.html">Wall Furniture</a> </li>
                </ul>
              </li>
              <li><a href="category.html">Books</a>
                <ul>
                  <li><a href="category.html">Audio Books</a> </li>
                  <li><a href="category.html">Comedy Book</a> </li>
                  <li><a href="category.html">Comics Books</a> </li>
                  <li><a href="category.html">Computer Book</a> </li>
                  <li><a href="category.html">Cookies Books</a> </li>
                  <li><a href="category.html">English Books</a> </li>
                </ul>
              </li>-->
              
            </ul>
          </div>
          <div class="right">
            <ul class="sitemap">
              <li><a href="#">Special Offers</a></li>
              <li><a href="#">My Account</a>
                <ul>
                 <?php 
			if($user_status==1)
			{
			 ?>
                  <li><a href="my_account.php">Account Information</a></li>
                  <li><a href="change_password.php">Password</a></li>
                  <!--<li><a href="#">Address Book</a></li>-->
                  <li><a href="order_history.php">Order History</a></li>
                 <!-- <li><a href="#">Downloads</a></li>-->
                  <?php }
			  else
			  {
			   ?>
               <li><a href="login.php">Account Information</a></li>
                  <li><a href="login.php">Password</a></li>
                  <!--<li><a href="#">Address Book</a></li>-->
                  <li><a href="login.php">Order History</a></li>
                 <!-- <li><a href="#">Downloads</a></li>-->
                   <?php 
			  }
			  ?>
                </ul>
              </li>
              <li><a href="#">Shopping Cart</a></li>
              <?php 
			if($user_status==1)
			{
			 ?>
              <li><a href="checkout.php">Checkout</a></li>
                <?php }
			  else
			  {
			   ?>
                <li><a href="login.php">Checkout</a></li>
                  <?php 
			  }
			  ?>
              <li><a href="#">Search</a></li>
              <li>Information
                <ul>
                  <li><a href="about-us.php">About Us</a></li>
                  <li><a href="delivery_info.php">Delivery Information</a></li>
                  <li><a href="privacy.php">Privacy Policy</a></li>
                  <!--<li><a href="about-us.html">Terms &amp; Conditions</a></li>-->
                  <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
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