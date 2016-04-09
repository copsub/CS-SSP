<?php


function dgx_donate_bank_transfer(){
  $amount = $_POST['amount'];
  $currency_code = $_POST['currency'];
  $repeating = ($_POST['monthly'] == 'true') ? '1' : '0';
  $email = $_POST['email'];


  $url = "http://localhost:3000/api/new_bank_donor";

  $args = array(
    'method' => 'POST',
    'timeout' => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking' => true,
    'headers' => array(),
    'body' => array( 'amount' => $amount, 'currency_code' => $currency_code, 'repeating' => $repeating, 'email' => $email ),
    'cookies' => array()
   );

  $response = wp_remote_post( $url, $args );

  if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    wp_die("Something went wrong with the API call to Copsub Donations: $error_message");
  } else {
    wp_die( $response['body'] );
  }
}


add_action('wp_ajax_dgx_donate_bank_transfer', 'dgx_donate_bank_transfer');
add_action('wp_ajax_nopriv_dgx_donate_bank_transfer', 'dgx_donate_bank_transfer');






# private key file to use
$MY_KEY_FILE = "/home/web/paypal_certificates/cs-prvkey.pem";

# public certificate file to use
$MY_CERT_FILE = "/home/web/paypal_certificates/cs-pubcert-2016.pem";
$MY_CERT_ID = '9GSX68YKWRUQW';
$MY_BUSINESS_ID = 'donate@copsub.com';

# Paypal's public certificate (Paypal has a different one for the sandbox)
$PAYPAL_CERT_FILE = "/home/web/paypal_certificates/paypal_cert.pem";

# path to the openssl binary
$OPENSSL = "/usr/bin/openssl";

# Sandbox Certificate for testing
// $MY_BUSINESS_ID = 'ignaci_1333211594_biz@ihuerta.net';
// $MY_CERT_ID = 'NNKRJEJDVPRQC';
// $PAYPAL_CERT_FILE = "/home/web/paypal_certificates/paypal_sandbox_cert.pem";




function dgx_donate_paypal(){
  if ($_POST['monthly'] == 'true'){
    $cmd = '_xclick-subscriptions';
    $item_name = 'Copenhagen Suborbitals Monthly Donation';
  }else{
    $cmd = '_donations';
    $item_name = 'Copenhagen Suborbitals Single Donation';
  }
  $paypal_options = array(
    'cmd' => $cmd,
    'business' => $MY_BUSINESS_ID,
    'cert_id' => $MY_CERT_ID,
    'lc' => 'US',
    'invoice' => '',
    'currency_code' => $_POST['currency'],
    'no_shipping' => '1',
    'item_name' => $item_name,
    'item_number' => '1',
    'amount' => $_POST['amount'],
    'a3' => $_POST['amount'],
    'p3' => '1',
    't3' => 'M',
    'src' => '1',
    'return' => 'http://copenhagensuborbitals.com/',
    'cancel_return' => 'http://copenhagensuborbitals.com/support-us/'
  );

  wp_die(paypal_encrypt($paypal_options));
}





function paypal_encrypt($hash)
{
  //Sample PayPal Button Encryption: Copyright 2006-2010 StellarWebSolutions.com
  //Not for resale - license agreement at
  //http://www.stellarwebsolutions.com/en/eula.php
  global $MY_KEY_FILE;
  global $MY_CERT_FILE;
  global $PAYPAL_CERT_FILE;
  global $OPENSSL;


  if (!file_exists($MY_KEY_FILE)) {
    echo "ERROR: MY_KEY_FILE $MY_KEY_FILE not found\n";
  }
  if (!file_exists($MY_CERT_FILE)) {
    echo "ERROR: MY_CERT_FILE $MY_CERT_FILE not found\n";
  }
  if (!file_exists($PAYPAL_CERT_FILE)) {
    echo "ERROR: PAYPAL_CERT_FILE $PAYPAL_CERT_FILE not found\n";
  }


  //Assign Build Notation for PayPal Support
  $hash['bn']= 'StellarWebSolutions.PHP_EWP2';

  $data = "";
  foreach ($hash as $key => $value) {
    if ($value != "") {
      //echo "Adding to blob: $key=$value\n";
      $data .= "$key=$value\n";
    }
  }

  $openssl_cmd = "($OPENSSL smime -sign -signer $MY_CERT_FILE -inkey $MY_KEY_FILE " .
            "-outform der -nodetach -binary <<_EOF_\n$data\n_EOF_\n) | " .
            "$OPENSSL smime -encrypt -des3 -binary -outform pem $PAYPAL_CERT_FILE";

  exec($openssl_cmd, $output, $error);

  if (!$error) {
    return implode("\n",$output);
  } else {
    return "ERROR: encryption failed";
  }
};


add_action('wp_ajax_dgx_donate_paypal', 'dgx_donate_paypal');
add_action('wp_ajax_nopriv_dgx_donate_paypal', 'dgx_donate_paypal');

