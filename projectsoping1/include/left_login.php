<div id="column-left">
        <!--Account Links Start-->
        <div class="box">
          <div class="box-heading">Account</div>
          <div class="box-content">
            <ul class="list-item">
            <?php 
			if($user_status==1)
			{
			 ?>
              <li><a href="logout.php">Logout</a></li>
              <li><a href="my_account.php"><?php echo $fetch_u['first_name']; ?></a></li>
              <?php }
			  else
			  {
			   ?>
              <li><a href="login.php">Login</a></li>
              <li><a href="regi1.php">Register</a></li>
              <?php 
			  }
			  ?>
              <li><a href="forget_pass.php">Forgotten Password</a></li>
              <li><a href="my_account.php">My Account</a></li>
            <!--  <li><a href="#">Wish List</a></li>-->
              <li><a href="order_hist.php">Order History</a></li>
              <!--<li><a href="#">Downloads</a></li>-->
              <!--<li><a href="return.php">Returns</a></li>-->
              <li><a href="transcation.php">Transactions</a></li>
            <!--  <li><a href="#">Newsletter</a></li>-->
            </ul>
          </div>
        </div>
        <!--Account Links End-->
