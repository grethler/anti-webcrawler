<?php
/* Copyright Florian Grethler; info [at] grethler [dot] ch*/
session_start();
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}
// Changable variables
$encrypteddomain = "YOUR ENCRPYTED DOMAIN";
$encryption_key = "KEY FROM 'encrypt.php'";
$encryption_iv = "INITALIZATION VECTOR FROM 'encrypt.php'";
// End of changable variables

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$domain=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);

if (!$captcha) {
    echo '<script>alert("Oops something went wrong. Please try again later."); window.location.href="'.$domain.'/verify/verify.html";</script>';
} else {
    $secret = 'YOUR SECRET RECAPTCHA KEY';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    $response = json_decode($response);

    if ($response->success === false) {
        echo '<script>alert("Failed to process reCAPTCHA. Please try again later."); window.location.href='.$domain.'/verify/verify.html";</script>';
    }
}

if ($response->success==true && $response->score >= 0.6) {
    echo '<script>localStorage.setItem("verified", "true");</script>';
    echo '<script>window.open(localStorage.getItem("url"), "_self");</script>';
    exit();
}
else{
    echo '<script>localStorage.setItem("verified", "false");</script>';
}
?>