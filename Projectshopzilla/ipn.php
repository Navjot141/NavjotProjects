<?php
require_once("init.php");
require_once("config_db.php");
require_once("config.php");
require_once('paypal-1.3.0/paypal.class.php');  // include the class file

$p = new paypal_class;             // initiate an instance of the class
//$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
//$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
if($sandbox_env == '1'){
	$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
}
else{
	$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
}



 
 $cart_sess = $_GET['cart'];
 $tabl = 'place_order';

 $sql = "SELECT * from $tabl where session='$cart_sess'";
 $exec = mysql_query($sql);
 if(mysql_num_rows($exec) == 1){
	 
	 $fetch_u = mysql_fetch_assoc($exec);
	/* $to = $fetch_u[email];    //  your email
	
	 $subject = 'Instant Payment Notification - Recieved Payment';
	 $body =  "Hello,\n\nWe have Recieved your Payment and now we are processing your order.\n\nThank You,\n$site_name";
	 $header = "From: $site_name <$email_def>";
	 
	 mail($to, $subject, $body, $header);*/
	 
	 $sql = "UPDATE $tabl SET status='1' where session='$cart_sess'";
	 mysql_query($sql);
	 
 }
//mail('sharma255319@yahoo.com', 'Working?-', $amt.'-'.$cart_sess.'-'.$sql);
?>