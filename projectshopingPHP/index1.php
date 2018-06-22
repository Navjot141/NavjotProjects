<?php 
include 'config_dbase.php';
include 'config.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>

<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
    <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
    
      <div id="content">
        <!-- Nivo Slider Start -->
        <section class="slider-wrapper">
       
          <div id="slideshow" class="nivoSlider">
           <?Php $sql="select * from slider where status='1'";
		      $exec=mysql_query($sql);
			  while ($fetch=mysql_fetch_assoc($exec))
			  {
		?>
         <a class="nivo-imageLink" href="#">
          <img src="uploadimage/<?php echo $fetch['image'];?>" alt="slide-1" />
          </a>
          <?Php }?> 
          <!--<a class="nivo-imageLink" href="#"><img src="image/slider/slide-2.jpg" alt="slide-2" /></a> <a class="nivo-imageLink" href="#"><img src="image/slider/slide-3.jpg" alt="slide-3" /></a>--> 
          </div>
        </section>
        <script type="text/javascript"><!--
$(document).ready(function() {
	$('#slideshow').nivoSlider();
});
--></script>
        <!-- Nivo Slider End-->
        <!-- Welcom Text Start-->
        <div class="welcome">Welcome to Polishop</div>
        <p><strong>Polishop</strong> Premium Responsive HTML Template. Polishop is a clean and Fully Responsive to use the template for every kind of eCommerce online shop. Great Looks on Desktops, Tablets and Mobiles. Well Documented. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <a href="#">BUY THEME</a>.</p>
        <!-- Welcom Text End-->
        <!-- Featured Product Start-->
        <section class="box">
       
          <div class="box-heading">Featured</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider featured_carousel">
                <ul class="slides">
                 <?Php
				 $countid="";
				  $sql_feature="select product.*,product_image.image from product inner join product_image on
				 product.id=product_image.product_id where product.status='1' and product.featured='1';";
					$exec_feature=mysql_query($sql_feature);
					while($fetch_feature=mysql_fetch_assoc($exec_feature)) 
					{
						if($countid!=$fetch_feature['id'])	
					{
					?>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.php?prod_id=<?php echo $fetch_feature['id'];?>&sub_id=<?php echo $fetch_feature['subcategory']?>"><img src="uploadimage/<?php echo $fetch_feature['image'];?>" alt="Lotto Sports Shoes" height="170" width="170" /></a></div>
                      
                      <div class="name"><a href="product.php?prod_id=<?php echo $fetch_feature['id'];?>&sub_id=<?php echo $fetch_feature['subcategory']?>"><?php echo $fetch_feature['name'];?></a></div>
                      <div class="price">Rs <?php echo $fetch_feature['price'];?></div>
                      <div class="cart">
                     <a href="index.php?do=addtocart&pid=<?php echo $fetch_feature['id']?>"><input type="button" value="Add to Cart" class="button"/></a>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <?php
					}
					$countid=$fetch_feature['id'];
					}
				  ?>
                  </ul>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
(function() {
  // store the slider in a local variable
  var $window = $(window),
      flexslider;
 
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 320) ? 1 :
		   (window.innerWidth < 600) ? 2 :
		   (window.innerWidth < 800) ? 3 :
           (window.innerWidth < 900) ? 4 : 5;
  }
  $window.load(function() {
    $('#content .featured_carousel').flexslider({
      animation: "slide",
      animationLoop: false,
	  slideshow: false,
      itemWidth: 210,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize() // use function to pull in initial value
    });
  });
}());
</script>
        <!-- Featured Product End-->
        <!-- Product Tab Start-->
        <section id="product-tab" class="product-tab">
          <ul id="tabs" class="tabs">
            <li><a href="#tab-latest">Latest</a></li>
            <li><a href="#tab-bestseller">Bestseller</a></li>
            <li><a href="#tab-special">Special</a></li>
          </ul>
          <div id="tab-latest" class="tab_content">
            <div class="box-product">
              <div class="flexslider latest_carousel_tab">
                <ul class="slides">
                <?Php
				$countid="";
			 $sql_LATEST="select product.*,product_image.image from product inner join product_image on
				 product.id=product_image.product_id where product.status='1' order by time DESC LIMIT 0,11";
					$exec_LATEST=mysql_query($sql_LATEST);
					while($fetch_LATEST=mysql_fetch_assoc($exec_LATEST)) 
					{
					if($countid!=$fetch_LATEST['id'])	
					{
					?>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>"><img src="uploadimage/<?php echo $fetch_LATEST['image'];?>" alt="Samsung SyncMaster 941BW" height="200" width="180" /></a></div>
                      <div class="name"><a href="product.php?prod_id=<?php echo $fetch_LATEST['id'];?>&sub_id=<?Php echo $fetch_LATEST['subcategory']?>"><?php echo $fetch_LATEST['name'];?></a></div>
                      <div class="price"><?php echo $fetch_LATEST['price'];?></div>
                      <div class="cart">
                        <a href="index.php?do=addtocart&pid=<?php echo $fetch_LATEST['id'];?>"><input type="button" value="Add to Cart" class="button" /></a>
                      </div>
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
          <div id="tab-bestseller" class="tab_content">
            <div class="box-product">
              <div class="flexslider bestseller_carousel_tab">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-210x210.jpg" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                      <div class="price"> <span class="price-old">$119.50</span><span class="price-new">$107.75</span> </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-210x210.jpg" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-210x210.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price"> $131.25 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-210x210.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">Lotto Sports Shoes</a></div>
                      <div class="price"> $589.50 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-210x210.jpg" alt="Sunglass" /></a></div>
                      <div class="name"><a href="product.html">Sunglass</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="tab-special" class="tab_content">
            <div class="box-product">
              <div class="flexslider special_carousel_tab">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-210x210.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price"> $131.25 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-210x210.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">Lotto Sports Shoes</a></div>
                      <div class="price"> $589.50 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-210x210.jpg" alt="Sunglass" /></a></div>
                      <div class="name"><a href="product.html">Sunglass</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/samsung_syncmaster_941bw-210x210.jpg" alt="Samsung SyncMaster 941BW" /></a></div>
                      <div class="name"><a href="product.html">Samsung SyncMaster 941BW</a></div>
                      <div class="price"> $237.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_touch_1-210x210.jpg" alt="Sunglass" /></a></div>
                      <div class="name"><a href="product.html">Sunglass</a></div>
                      <div class="price"> $1,177.00 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-210x210.jpg" alt="Eagle Print Top" /></a></div>
                      <div class="name"><a href="product.html">Eagle Print Top</a></div>
                      <div class="price"> $236.99 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
(function() {
  // store the slider in a local variable
  var $window = $(window),
      flexslider;
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 320) ? 1 :
		   (window.innerWidth < 600) ? 2 :
		   (window.innerWidth < 800) ? 3 :
           (window.innerWidth < 900) ? 4 : 5;
  }
  $window.load(function() {
    $('#product-tab .featured_carousel_tab, #product-tab .latest_carousel_tab, #product-tab .bestseller_carousel_tab, #product-tab .special_carousel_tab').flexslider({
      animation: "slide",
      animationLoop: false,
	  slideshow: false,
      itemWidth: 210,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize(), // use function to pull in initial value
	  start: function(){
		  $("#product-tab .tab_content").addClass("deactive");
		  $("#product-tab .tab_content:first").removeClass("deactive"); //Show first tab content
		  } });
  });

$(document).ready(function() {
    //Default Action
    $("ul#tabs li:first").addClass("active").show(); //Activate first tab
    //On Click Event
    $("ul#tabs li").click(function() {
        $("ul#tabs li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
		$("#product-tab .tab_content").hide(); 
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });
});}());
</script>
        <!-- Product Tab End-->
        <!-- Carousel Start-->
        <section id="carousel">
          <ul class="jcarousel-skin-opencart">
            <li><a href="#"><img src="image/product/download (1).jpg" alt="brand_logo" title="brand_logo"  width="80px" height="80px"/></a></li>
            <li><a href="#"><img src="image/product/download (2).jpg" alt="brand_logo" title="brand_logo" width="80px" height="80px"/></a></li>
            <li><a href="#"><img src="image/product/download.jpg" alt="brand_logo" title="brand_logo"  width="80px" height="80px"/></a></li>
            <li><a href="#"><img src="image/product/download (3).jpg" alt="brand_logo" title="brand_logo" width="80px" height="80px"/></a></li>
            <li><a href="#"><img src="image/product/images (1).jpg" alt="brand_logo" title="brand_logo" width="80px" height="80px"/></a></li>
            <li><a href="#"><img src="image/product/images (2).jpg" alt="brand_logo" title="brand_logo"  width="80px" height="80px"/></a></li>
          </ul>
        </section>
        <!-- Carousel End-->
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
  <?php include"include/footer.php" ?>
  <!--Footer Part End-->
</div>
</body>
</html>