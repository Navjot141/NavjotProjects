
 <?php
	if($_REQUEST['do']=='addtocart' && $_REQUEST['pid']>0){
	 $pid=$_REQUEST['pid'];
	 addtocart($pid,1);
	}
if(is_array($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k=>$v)
{
$pid1=$v['productid'];
$qty=$v['qty'];
$tprice=get_price($pid1,$qty);
$total_price=$total_price+$tprice;			
}	
$total=count($_SESSION['cart']);	
}		
?>
<?php 
if($_REQUEST['do']=='deletecart' and $_REQUEST['pid']>0)
{
$pid=$_REQUEST['pid'];	
remove_product($pid);		
}
?>
 <header id="header">
      <div class="htop">
        <div class="links">
        <?Php
		if($user_status==1)
		{ 
		?>
        <a href="logout.php">Logout</a> <a href="my_account.php"><?php echo $fetch_u['first_name']?> </a>
        <a href="my_account.php">My Account</a> <a href="checkout.php">Checkout</a>
       
      <?php  }
        else
        {?>
        <a href="login.php">Login</a> <a href="regi1.php">Register</a>
         <a href="login.php">My Account</a> <a href="login.php">Checkout</a>
        <?php 
		}
		?>  
        <!--<a href="#" id="wishlist-total">Wish List (0)</a>-->
        
        </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="index.php"><img src="image/product/design1.jpg" title="Polishop" alt="Polishop" /></a></div>
        <div id="search">
          <div class="button-search"></div>
          <form method="get" action="search.php">
          <input type="text" name="search_txt" placeholder="Search" value=""  id="demo-input-facebook-theme"/>
   </form>
        </div>
        <!--Mini Shopping Cart Start-->
        <section id="cart">
          <div class="heading">
            <h4><img width="32" height="32" alt="" src="image/cart-bg.png"></h4>
            <a><span id="cart-total"><?php echo $total;?>item(s)-<?php echo $total_price;?>Rs</span></a> </div>
          <div class="content">
            <div class="mini-cart-info">
              <table>
              
              <?Php	
			  $total_price="";		
foreach($_SESSION['cart'] as $k=>$v)
{
$pid1=$v['productid'];
$qty=$v['qty'];
$qr=mysql_query("select * from product where id='$pid1'");
;
$fetch=mysql_fetch_assoc($qr);
$qr=mysql_query("select image from product_image where product_id='$pid1'");
$fetchimage=mysql_fetch_assoc($qr);
$p_name=get_product_name($pid1);
//$uprice=get_price($pid1);
$tprice=get_price($pid1,$qty);
$tquantity=get_quantity($pid1);
$total_price=$total_price+$tprice;
//echo $total_price;						  
?>
     
                <tr>
                  <td class="image"><a href="product.php?prod_id=<?php echo $pid1;?>&sub_id=<?php echo $fetch['subcategory']?>"><img src="uploadimage/<?php echo $fetchimage['image']?>" alt="Lotto Sports Shoes" title="Lotto Sports Shoes"  height="45px" width="45px"/></a></td>
                  <td class="name"><a href="product.php?prod_id=<?php echo $pid1;?>&sub_id=<?php echo $fetch['subcategory']?>"><?php echo $p_name;?></a></td>
                  <td class="quantity">x&nbsp;<?php echo $qty;?></td>
                  <td class="total"><?php echo $tprice;?></td>
                  <td class="remove"><a href="cart.php?do=deletecart&pid=<?php echo $pid1;?>"><img src="image/remove-small.png" alt="Remove" title="Remove" /></a></td>
                </tr>
               <?php
			  }
			   ?>
              </table>
            </div>
            <div class="mini-cart-total">
              <table>
                <tr>
                  <td class="right"><b>Total:</b></td>
                  <td class="right"><?Php echo $total_price; ?></td>
                </tr>
              </table>
            </div>
            <div class="checkout"><a class="button" href="cart.php">View Cart</a> &nbsp; <?php 
			if($user_status==1)
			{
			 ?>
              <a class="button" href="checkout.php">Checkout</a></div>
            <?php }
			  else
			  {
			   ?>
              <a class="button" href="login.php">Checkout</a></div>
               <?php 
			  }
			  ?>
          </div>
         
        </section>
        <!--Mini Shopping Cart End-->
        <div class="clear"></div>
      </section>
      <!--Top Menu(Horizontal Categories) Start-->
      <nav id="menu">
        <ul>
          <li class="home"><a title="Home" href="index.php"><span>Home</span></a></li>
          <li class="categories_hor"><a>Categories</a>
          
            <div>
            <?php
			$sql="select * from category";
              $exec=mysql_query($sql);
			 $i=0; while($fetch=mysql_fetch_assoc($exec)){ 
		  $sql_subcat="select * from subcategory where category='".$fetch['id']."'";
		  $exec_subcat=mysql_query($sql_subcat);
		
		  ?>
              <div class="column"><a href="category.php?main_id=<?php echo $fetch['id'];?>"><?php echo $fetch['name'];?></a>
             
               <div>
                
                  <ul> 
				  <?php while($fetch_subcat=mysql_fetch_assoc($exec_subcat)){ 
				      $sql_product="select * from product where subcategory='".$fetch_subcat['id']."' and status='1'";
				  $exec_product=mysql_query( $sql_product);
				  $num_product=mysql_num_rows($exec_product);
				  
				  ?>
                  
                    <li><a href="category.php?main_id=<?php echo $fetch['id'];?>&sub_id=<?php echo $fetch_subcat['id']; ?>" ><?php echo $fetch_subcat['name'];?>(<?php echo $num_product;?>)</a></li>
                    <?php }?>
                  </ul>
                </div>
               
              </div>
               
                <?php $i++; } ?>
                 
              </div>
          </li>
         
           <li><a>My Account</a>
            <div>
              <ul> 
			  <?php 
			if($user_status==1)
			{
			 ?>
                <li><a href="my_account.php">My Account</a></li>
                <li><a href="order_hist.php">Order History</a></li>
                 <?php }
			  else
			  {
			   ?>
               <li><a href="login.php">My Account</a></li>
                <li><a href="login.php">Order History</a></li>
                <!--<li><a href="#" id="wishlist-total">Wish List (0)</a></li>-->
               <!-- <li><a href="#">Newsletter</a></li>-->
                <?php 
			  }
			  ?>
              </ul>
            </div>
          </li>
          <li><a>Information</a>
            <div>
              <ul>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="delivery_info.php">Delivery Information</a></li>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="elements.php">Elements</a></li>
              </ul>
            </div>
          </li>
          <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </nav>
      <!--Top Menu(Horizontal Categories) End-->
      <!-- Mobile Menu Start-->
      <nav id="menu" class="m-menu"> <span>Menu</span>
        <ul>
          <li class="categories"><a>Categories</a>
            <div>
              <div class="column"> <a href="category.php">Electronics</a>
                <div>
                  <ul>
                    <li><a href="category.html">Laptops (0)</a></li>
                    <li><a href="category.html">Desktops (0)</a></li>
                    <li><a href="category.html">Components (1)</a></li>
                    <li><a href="category.html">Software (1)</a></li>
                    <li><a href="category.html">Phones &amp; PDAs (4)</a></li>
                    <li><a href="category.html">Cameras (2)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.html">Jewellery</a>
                <div>
                  <ul>
                    <li><a href="category.html">Children's Jewellery (0)</a></li>
                    <li><a href="category.html">Men's Jewellery (1)</a></li>
                    <li><a href="category.html">Women's Jewellery (0)</a></li>
                    <li><a href="category.html">Sample Test (0)</a></li>
                    <li><a href="category.html">Sample Test11 (0)</a></li>
                    <li><a href="category.html">Sample Test12 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.html">Shoes</a>
                <div>
                  <ul>
                    <li><a href="category.html">Children's Shoes (1)</a></li>
                    <li><a href="category.html">Men's Shoes (2)</a></li>
                    <li><a href="category.html">Women's Shoes (1)</a></li>
                    <li><a href="category.html">Test Sample (0)</a></li>
                    <li><a href="category.html">Test Sample1 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.html">Clothing</a>
                <div>
                  <ul>
                    <li><a href="category.html">Men (1)</a></li>
                    <li><a href="category.html">Women (1)</a></li>
                    <li><a href="category.html">Boys (0)</a></li>
                    <li><a href="category.html">Girls (0)</a></li>
                    <li><a href="category.html">Accessories (0)</a></li>
                    <li><a href="category.html">Sample Test21 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.php">Kids</a>
                <div>
                  <ul>
                    <li><a href="category.php">Toys Kids (0)</a></li>
                    <li><a href="category.php">Games (1)</a></li>
                    <li><a href="category.php">Sample Test22 (0)</a></li>
                    <li><a href="category.php">Sample Test15 (1)</a></li>
                    <li><a href="category.php">Sample Kids (1)</a></li>
                    <li><a href="category.php">Sample Test6 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.php">Watches</a>
                <div>
                  <ul>
                    <li><a href="category.php">Women's Watches (1)</a></li>
                    <li><a href="category.php">Men's Watches (0)</a></li>
                    <li><a href="category.php">Children's Watches (1)</a></li>
                    <li><a href="category.php">Sample16 (0)</a></li>
                    <li><a href="category.php">Sample17 (0)</a></li>
                    <li><a href="category.php">test 18 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.php">Sports</a>
                <div>
                  <ul>
                    <li><a href="category.php">Women's Sports (1)</a></li>
                    <li><a href="category.php">Children's Sports (0)</a></li>
                    <li><a href="category.php">Men's Sports (1)</a></li>
                    <li><a href="category.php">test 7 (0)</a></li>
                    <li><a href="category.php">Sample 8 (0)</a></li>
                    <li><a href="category.php">test 9 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.php">Health</a>
                <div>
                  <ul>
                    <li><a href="category.php">Sample Test1 (1)</a></li>
                    <li><a href="category.php">Sample Test2 (0)</a></li>
                    <li><a href="category.php">test 20 (0)</a></li>
                    <li><a href="category.php">test 21 (0)</a></li>
                    <li><a href="category.php">test 22 (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"> <a href="category.php">Furniture</a>
                <div>
                  <ul>
                    <li><a href="category.php">Bedrooms Furniture (0)</a></li>
                    <li><a href="category.php">Kidsrooms furniture (0)</a></li>
                    <li><a href="category.php">Kitchen Furniture (1)</a></li>
                    <li><a href="category.php">Showcase Furniture (0)</a></li>
                    <li><a href="category.php">Table Furniture (1)</a></li>
                    <li><a href="category.php">Wall Furniture (0)</a></li>
                  </ul>
                </div>
              </div>
              <div class="column"><a href="category.php">Books</a>
                <div>
                  <ul>
                    <li><a href="category.php">Audio Books (1)</a></li>
                    <li><a href="category.php">Comedy Book (1)</a></li>
                    <li><a href="category.php">Comics Books (0)</a></li>
                    <li><a href="category.php">Computer Book (1)</a></li>
                    <li><a href="category.php">Cookies Books (0)</a></li>
                    <li><a href="category.php">English Books (1)</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <!-- Mobile Menu End-->
    </header>