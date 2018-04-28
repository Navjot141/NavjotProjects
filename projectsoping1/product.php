<?php 
include 'config_dbase.php';
$main_id=$_REQUEST['main_id'];
$sub_id=$_REQUEST['sub_id'];
$prod_id=$_REQUEST['prod_id'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Product - Polishop eCommerce HTML Template</title>
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
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
         <?Php
			
		$sql="select  product.*,product_image.image from product inner join product_image on      product.id=product_image.product_id where product.id='$prod_id'";
                 $exec=mysql_query($sql);
		         $fetch=mysql_fetch_assoc($exec); 
				 //print_r($fetch);
			?>
        <div class="breadcrumb"> <a href="index.php">Home</a> &raquo; <a href="product.php?prod_id=<?php echo  $fetch['id'];?>&sub_id=<?php echo $fetch['subcategory']?>"><?php echo  $fetch['name'];?></a> </div>
        <h1><?php echo  $fetch['name'];?></h1>
        <div class="product-info">
          <div class="left">
            <div class="image">
          
            <a href="uploadimage/<?php echo $fetch['image'];?>" title="Canon EOS 5D" class="cloud-zoom colorbox" id='zoom1' rel="adjustX: 0, adjustY:0, tint:'#000000',tintOpacity:0.2, zoomWidth:360, position:'inside', showTitle:false"><img src="uploadimage/<?php echo $fetch['image'];?>" title="Canon EOS 5D" alt="Canon EOS 5D" id="image" height="150px" width="150px" /><span id="zoom-image"><i class="zoom_bttn"></i> Zoom</span></a>
             
            </div>
            <div class="image-additional">
            <?Php
			$sql1="select * from product_image where product_id='$prod_id'";
			$exec1=mysql_query($sql1);
			while($fetch1=mysql_fetch_assoc($exec1)) 
			{
			 ?>
            
             <a href="uploadimage/<?php echo $fetch1['image'];?>" title="Canon EOS 5D" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: 'uploadimage/<?php echo $fetch1['image'];?>' "><img src="uploadimage/<?php echo $fetch1['image'];?>" width="62"  height="62" title="Canon EOS 5D" alt="Canon EOS 5D" /></a> 
            
             <?Php
					
			}
		?>
              </div>
          </div>
          <div class="right">
            <div class="description"> <span>Name:</span> <a href="#"><?php echo  $fetch['name'];?></a><br />
            <span>Availability:</span><span style=" font-size:16px;"> <?php if($fetch['availability']==1)
			echo "<span style='color:green'>In Stock</span>";
			else
         	echo "<span style='color:red'> Out Of Stock</span>";?></span></div>
            <div class="price">Price: <span class="price-new"><?php echo  $fetch['price'];?>Rs</span> <br />
    
            </div>
            <div class="cart">
              <div>
                <div class="qty"> <!--<strong>Qty:</strong> <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                  <input id="qty" type="text" class="w30" name="quantity" size="2" value="1" />
                  <a class="qtyBtn plus" href="javascript:void(0);">+</a>
                  <input type="hidden" name="product_id" size="2" value="30" />-->
                  <div class="clear"></div>
                </div>
             <a href="product.php?do=addtocart&pid=<?php echo $fetch['id']?>&prod_id=<?php echo $fetch['id'];?>&sub_id=<?php echo $fetch['subcategory'];?>">   <input type="button" value="Add to Cart" id="button-cart" class="button" /></a>
              </div>
              <div>
              <br>
              <!--<a href="#" class="wishlist" >Add to Wish List</a> <a href="#" class="wishlist" >Add to Compare</a></div>-->
            </div>
            <div class="review">
              <div><img src="image/stars-3.png" alt="2 reviews" />&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">0 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a></div>
            </div>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style "> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-506f325f57fbfc95"></script>
            <!-- AddThis Button END -->
          </div>
        </div>
        <!-- Description and Reviews Tab Start -->
        <div id="tabs" class="htabs"> <a href="#tab-description">Description</a> <a href="#tab-review">Reviews (0)</a> </div>
        <div id="tab-description" class="tab-content">
        <?php echo  $fetch['description'];?>
        <!--  <p><strong>Revolutionary multi-touch interface.</strong><br>
            iPod touch features the same multi-touch screen technology as iPhone. Pinch to zoom in on a photo. Scroll through your songs and videos with a flick. Flip through your library by album artwork with Cover Flow.</p>
          <p><strong>Gorgeous 3.5-inch widescreen display.</strong><br>
            Watch your movies, TV shows, and photos come alive with bright, vivid color on the 320-by-480-pixel display.</p>
          <p><strong>Music downloads straight from iTunes.</strong><br>
            Shop the iTunes Wi-Fi Music Store from anywhere with Wi-Fi.1 Browse or search to find the music youre looking for, preview it, and buy it with just a tap.</p>
          <p><strong>Surf the web with Wi-Fi.</strong><br>
            Browse the web using Safari and watch YouTube videos on the first iPod with Wi-Fi built in<br>
            &nbsp;</p>-->
        </div>
        <div id="tab-review" class="tab-content">
          <div id="review"></div>
          <h2 id="review-title">Write a review</h2>
          <br />
          <b>Your Name:</b><br />
          <input type="text" name="name" value="" />
          <br />
          <br />
          <b>Your Review:</b>
          <textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
          <span style="font-size: 11px;"><span style="color: #FF0000;">Note:</span> HTML is not translated!</span><br />
          <br />
          <b>Rating:</b> <span>Bad</span>&nbsp;
          <input type="radio" name="rating" value="1" />
          &nbsp;
          <input type="radio" name="rating" value="2" />
          &nbsp;
          <input type="radio" name="rating" value="3" />
          &nbsp;
          <input type="radio" name="rating" value="4" />
          &nbsp;
          <input type="radio" name="rating" value="5" />
          &nbsp;<span>Good</span><br />
          <br />
          <b>Enter the code in the box below:</b><br />
          <input type="text" name="captcha" value="" />
          <br />
          <br />
          <img src="indexffc1.html?route=product/product/captcha" alt="" id="captcha" /><br />
          <br />
          <div class="buttons">
            <div class="right"><a id="button-review" class="button">Continue</a></div>
          </div>
        </div>
        <script>
  $(document).ready(function(){
  $('#tabs a').tabs();
  });
  </script>
        <!-- Description and Reviews Tab Start -->
        <!--Related Product Start-->
        <div class="box">
          <div class="box-heading">Related Products (11)</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider" id="related_pro">
                <ul class="slides">
                <?php
				 
			// $subid=$fetch2['subcategory'];
			$sql_related="select  product.*,product_image.image from  product inner join  product_image on product.id=product_image.product_id where product.status='1' and product.subcategory='$sub_id'";
			
			$data_related=mysql_query($sql_related);
			while($fetch_related=mysql_fetch_assoc($data_related))
			{
				if($counter!=$fetch_related['id'])	
				{
				?>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.php?prod_id=<?Php echo $fetch_related['id'];?>&sub_id=<?Php echo $fetch_related['subcategory']?>"><img src="uploadimage/<?php echo $fetch_related['image']?>" height="210" width="210" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="product.php?prod_id=<?Php echo $fetch_related['id'];?>&sub_id=<?Php echo $fetch_related['subcategory']?>"><?php echo $fetch_related['name'];?></a></div>
                      <div class="price"><?php echo $fetch_related['price'];?> </div>
                      <div class="cart">
                    <a href="product.php?do=addtocart&pid=<?php echo $fetch_related['id']?>&prod_id=<?php echo $fetch_related['id'];?>&sub_id=<?php echo $fetch_related['subcategory'];?>"><input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <?php  }
				 $counter=$fetch_related['id'];
			}
			
				   ?>
                 <!-- <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/iphone_1-210x210.jpg" alt="iPhone 4s" /></a></div>
                      <div class="name"><a href="product.html">iPhone 4s</a></div>
                      <div class="price"> $120.68 </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
                      <div class="clear"></div>
                    </div>
                  </li>
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
                      <div class="image"><a href="product.html"><img src="image/product/htc_touch_hd_1-210x210.jpg" alt="iPhone 5s" /></a></div>
                      <div class="name"><a href="product.html">iPhone 5s</a></div>
                      <div class="price"> $119.50 </div>
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
                      <div class="image"><a href="product.html"><img src="image/product/reebok-men-sports-shoes-210x210.jpg" alt="Reebok Men Sports Shoes" /></a></div>
                      <div class="name"><a href="product.html">Reebok Men Sports Shoes</a></div>
                      <div class="price"> $119.50 </div>
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
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-210x210.jpg" alt="Nikon D300" /></a></div>
                      <div class="name"><a href="product.html">Nikon D300</a></div>
                      <div class="price"> $942.00 </div>
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
                  </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
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
           (window.innerWidth < 900) ? 3 : 4;
  }
  $window.load(function() {
    $('#content #related_pro').flexslider({
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
        <!--Related Product End-->
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