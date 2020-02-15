(Run cipher.php)
A. Encryption: 

	1. Use "AES-128-CTR" algo for encryption.
	2. Get `IVlength` using `openssl_cipher_iv_length(`) method with defined algo.
	3. Generate Buffered `IV` using `random_bytes()` method of `IVlength` length.
	4. Generate encryption key using `openssl_digest(php_uname(), 'MD5', TRUE)` method.
	5. Then generate Encrypted string using the `openssl_encrypt()` method.
	6. Make a `$token` array with base64_encode of buffered `$iv` and Encrypted string.
	7. Convert the `$token` array into `$send_token` string using `base64_encode(gzdeflate(serialize($token)))` method.
	8. At last echo `$send_token`.


(Run dcipher.php)
B. Decryption (Copy the echo string from cipher.php in $`encrypted_text` variable):

	1. Use "AES-128-CTR" algo for decryption.
	2. Generate decryption key using `openssl_digest(php_uname(), 'MD5', TRUE)` method.
	3. Then convert the Encrypted text to array using `unserialize(gzinflate(base64_decode($encrypted_text)))` (reverse of which we have done during the Encryption).
	4. Decrypt the text using `openssl_decrypt()`.
	

