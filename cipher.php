<?php 
$string = "Welcome to parth encryption"; 

$algo = "AES-128-CTR"; 
  
$ivlength = openssl_cipher_iv_length($algo); 

$iv = random_bytes($ivlength);   // 16 digit Iv values 

$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);  // 16 digit key values

$encryption = openssl_encrypt($string, $algo, $encryption_key, 0, $iv); // Encryption of string 
  
$token = ["encryption_iv" => base64_encode($iv) , "encryption" => $encryption];  // Encrypt array with IV
  
$send_token = base64_encode(gzdeflate(serialize($token)));

echo "Send Token :".$send_token;
?> 