<?php /* Copyright Florian Grethler; info [at] grethler [dot] ch*/

// Changeable variables
$domain = "YOURDOMAIN";
$encryption_key = "SOME RANDOM KEY";
$encryption_iv = "SOME RANDOM INITALIZATION VECTOR";
// End of changable variables

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption = openssl_encrypt($domain, $ciphering,
            $encryption_key, $options, $encryption_iv);
  
// The following output is the encrypted domain one has to put into the verify.php file
echo $encryption;
?>