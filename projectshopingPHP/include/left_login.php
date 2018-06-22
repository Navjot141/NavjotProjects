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
              <!--<li><a href="forget_pass.php">Forgotten Password</a></li>-->
              <li><a href="my_account.php">My Account</a></li>
              <li><a href="order_hist.php">Order History</a></li>
             <!-- <li><a href="transaction.php">Transactions</a></li>-->
           
 
              <?php }
			  else
			  {
			   ?>
              <li><a href="login.php">Login</a></li>
              <li><a href="regi1.php">Register</a></li>
              <li><a href="forget_pass.php">Forgotten Password</a></li>
              <li><a href="login.php">My Account</a></li>
              <li><a href="login.php">Order History</a></li>
             <!-- <li><a href="login.php">Transactions</a></li>-->
           
              <?php 
			  }
			  ?>
                         </ul>
          </div>
        </div>
        <!--Account Links End-->
