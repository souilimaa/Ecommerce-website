  <?php
// Database Configuration 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'commerce'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 

// PayPal Configuration
define('PAYPAL_EMAIL', 'Your PayPal Business Email'); 
define('RETURN_URL', 'return.php'); 
define('CANCEL_URL', 'cancel.php'); 
define('NOTIFY_URL', 'ipn.php'); 
define('CURRENCY', 'MAD'); 
define('SANDBOX', TRUE); // TRUE or FALSE 
define('LOCAL_CERTIFICATE', FALSE); // TRUE or FALSE

if (SANDBOX === TRUE){
	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}else{
	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}
// PayPal IPN Data Validate URL
define('PAYPAL_URL', $paypal_url);