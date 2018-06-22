<?php
require_once "config_dbase.php";
require_once "config.php";
require_once('paypal-1.3.0/paypal.class.php');
       $s_id=$_REQUEST['shipping_id'];
	   if($_REQUEST['do']=="payment" and  $s_id!="")
	   {
	  $sql_cart = "SELECT count(*) from place_order where shipping_id='$s_id'";
	  $exec_cart=mysql_query($sql_cart) or die(mysql_error());
	  $numofitems= mysql_num_rows($exec_cart);
	   if( $numofitems<> 1)
	   {
		header("Location: checkout.php");
	   }
	   $sql_cart = "SELECT * from place_order where shipping_id='$s_id'";
	  $exec_cart=mysql_query($sql_cart) or die(mysql_error());
	  while($fetch=mysql_fetch_assoc( $exec_cart))
	  {
	   $total_price= $total_price+$fetch['total'];	  
	   $total_qty= $total_qty+$fetch['quantity'];  
	  } 
	  }
	  /*if($_REQUEST['do']=="payment" and  $s_id!="")
	  {*/	              // include the class file
	  $p=new paypal_class;             // initiate an instance of the class
	  if($sandbox_env=='1')
	  {
	   $p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
	   }
	  else
	  {
	 $p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
	  }
	$this_script='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$p->add_field('business', $email_merchant);
	$p->add_field('return', "http://localhost/projectsoping/thanks.php?cart=$cart_sess");
	$p->add_field('cancel_return', $this_script.'?action=cancel');
	//$p->add_field('notify_url', ROOT_URL."/ipn.php?cart=$cart_sess");
	//$p->add_field('item_name', $site_name.' Ecommerce');
	$p->add_field('amount', $total_price);
	$p->add_field('Quantity', $total_qty);
	$p->add_field('Item total',$numofitems);
	$p->submit_paypal_post();
	//}
	
	/*$p->add_field('username', $fetch[username]);
					  // $p->add_field('last_name', $fetch[last_name]);
						 //$p->add_field('state', $fetch[state]);
						// $p->add_field('zip', $fetch[zip]);
						 $p->add_field('address', $fetch[address]);
						 $p->add_field('phone', $fetch[phone]);
						 $p->add_field('email', $fetch[email]);
						// $p->add_field('address2', $fetch[address_two]);
					   // $p->add_field('address2', '');
						//$p->add_field('city', $fetch[city]);
						//$p->add_field('state', $fetch[state]);
						//$p->add_field('country', $fetch[country]);
						// $p->add_field('company name', $fetch[cname]);
						 // submit the fields to paypal
						//$p->dump_fields();      // for debugging, output a table of all the fields
						
						$flag = 'g';
				  }
				  else if($payment == 'credit_card'){}
			  }
		  }
		  }*/
		  ?>