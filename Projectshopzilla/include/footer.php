<?php
$sql_contact="SELECT * FROM contact Where id='1'";
$exec_contact=mysql_query($sql_contact);
?>
 <footer id="footer" >
    <div class="fpart-inner">
      
      <div class="column">
        <h3>Information</h3>
        <ul>
          <li><a href="about-us.html">About Us</a></li>
          <li><a href="about-us.html">Delivery Information</a></li>
          <li><a href="about-us.html">Privacy Policy</a></li>
          <li><a href="elements.html">Elements</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Customer Service</h3>
        <ul>
          <li><a href="contact-us.html">Contact Us</a></li>
          <li><a href="#">Returns</a></li>
          <li><a href="sitemap.html">Site Map</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>Extras</h3>
        <ul>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Gift Vouchers</a></li>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Specials</a></li>
        </ul>
      </div>
      <div class="column">
        <h3>My Account</h3>
        <ul>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Order History</a></li>
          <li><a href="#">Wish List</a></li>
          <li><a href="#">Newsletter</a></li>
        </ul>
      </div>
      <!-- Contact Details Start-->
      <div class="contact contact_icon">
        <h3>Contact Us</h3>
        <?php $i=0;while($fetch_contact=mysql_fetch_assoc($exec_contact))   {?>
        <ul>
          <li class="address"><?php  echo $fetch_contact['address'] ?></li>
          <li class="mobile"><?php  echo $fetch_contact['phoneno'] ?></li>
          <li class="fax"><?php  echo $fetch_contact['fax'] ?></li>
          <li class="email"><a href="mailto:info@contact.com"><?php echo $fetch_contact['email']?></a></li>
        </ul>
        <?php } ?>
      </div>
      <!-- Contact Details End-->
      <div class="clear"></div>
      <div id="powered">
        <!-- Payment Images Icon Start-->
        <div class="payments_types part3"> <img src="image/payment_paypal.png" alt="paypal" title="PayPal"> <img src="image/payment_american.png" alt="american-express" title="American Express"> <img src="image/payment_2checkout.png" alt="2checkout" title="2checkout"> <img src="image/payment_maestro.png" alt="maestro" title="Maestro"> <img src="image/payment_discover.png" alt="discover" title="Discover"> </div>
        <!-- Payment Images Icon End-->
        <!-- Powered by Text Start-->
        <div class="powered_text part3">
          <p>Polishop Html Template © 2013<br />
            Template By <a target="_blank" href="http://harnishdesign.net/">Harnish Design</a></p>
        </div>
        <!-- Powered by Text End-->
        <!-- Follow Social Icons Start-->
        <div class="social part3"> <a href="http://facebook.com/harnishdesign" target="_blank"><img src="image/facebook.png" alt="Facebook" title="Facebook"></a> <a href="https://twitter.com/#!/harnishdesign" target="_blank"><img src="image/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img src="image/googleplus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img src="image/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img src="image/rss.png" alt="RSS" title="RSS"> </a> <a href="http://www.vimeo.com/#" target="_blank"> <img src="image/vimeo.png" alt="Vimeo" title="Vimeo"> </a> </div>
        <!-- Follow Social Icons End-->
        <div class="clear"></div>
      </div>
      <!-- Back to Top Button Start-->
      <div class="back-to-top" id="back-top"><a title="Back to Top" href="javascript:void(0)" class="backtotop">Top</a></div>
      <!-- Back to Top Button End-->
    </div>
  </footer>