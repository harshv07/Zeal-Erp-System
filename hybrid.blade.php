<?php
echo 'PHP OpenSSL RSA & AES CBC 256 hybrid encryption' . PHP_EOL;

// get filenames
$plainfile = "./whateverittakes.mp3";
$cipherfile = "./whateverittakes.mp3.enc";
$decryptedfile = "./whateverittakesdec.mp3";

// attention: it is a RSA PRIVATE KEY !
// key generation:
// openssl genrsa -out private.key 2048
// openssl rsa -in private.key -out public.pem -outform PEM -pubout
// load private & public key
$public_key = openssl_pkey_get_public(file_get_contents('./public.pem'));
$private_key = openssl_pkey_get_private(file_get_contents('./private.key'));

// generate random aes encryption key
$key = openssl_random_pseudo_bytes(32); // 32 bytes = 256 bit aes key

// now encrypt the aes encryption key with the public key
openssl_public_encrypt($key, $encryptedKey, $public_key, OPENSSL_PKCS1_OAEP_PADDING);

// save 256 bytes long encrypted key
file_put_contents($cipherfile, $encryptedKey);
// aes cbc encryption
// generate random iv
$iv = openssl_random_pseudo_bytes(16);
// save 16 bytes long iv
file_put_contents($cipherfile, $iv, FILE_APPEND);
$data = file_get_contents($plainfile);
$cipher = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
// save cipher
file_put_contents($cipherfile, $cipher, FILE_APPEND);
echo 'encryption finished' . PHP_EOL;

// decryption
// read the data
$handle = fopen($cipherfile, "rb");
// read 256 bytes long encryptedKey
$decryptionkeyLoad = fread($handle, 256);
// decrypt the encrypted key with private key
openssl_private_decrypt($decryptionkeyLoad, $decryptionkey, $private_key, OPENSSL_PKCS1_OAEP_PADDING);
// read 16 bytes long iv
$ivLoad = fread($handle, 16);
// read ciphertext
$dataLoad = fread($handle, filesize($cipherfile));
fclose($handle);
$decrypt = openssl_decrypt($dataLoad, 'AES-256-CBC', $decryptionkey, OPENSSL_RAW_DATA, $ivLoad);
file_put_contents($decryptedfile, $decrypt);
echo 'decryption finished' . PHP_EOL;
