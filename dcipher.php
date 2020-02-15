<?php
$encrypted_text = 'S7QysqoutjI0tlJKzUsuqiwoyczPi88sU7IutjIysVLyNS8JLCnWdklJ8cjwSi7yLTMNTcwJtLUFyRsaIGsCiRibWSmFZgcZp1QZ5oWmehqGmXj7u3rnFFhk+4VF+ljoe3lmFDuF5IYqWdcCAA==';   // Enter encrypt text

$algo = "AES-128-CTR"; 

$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);  // 16 digit key values

$dcrypt_text = unserialize(gzinflate(base64_decode($encrypted_text)));

$decryption = openssl_decrypt ($dcrypt_text["encryption"], $algo, $decryption_key, 0, base64_decode($dcrypt_text["encryption_iv"]));

echo "dcrypted text : ".$decryption;
?>