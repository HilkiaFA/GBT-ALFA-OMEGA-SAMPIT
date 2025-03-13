<?php 
define('ENCRYPTION_KEY', 'dsadbasud33478gdf48yhfej');
define('ENCRYPTION_METHOD', 'AES-256-CBC');

function encryptID($id) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPTION_METHOD));
    $encrypted = openssl_encrypt($id, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
    return urlencode(base64_encode($iv . $encrypted));
}

function decryptID($encrypted) {
    $data = base64_decode(urldecode($encrypted));
    $iv_length = openssl_cipher_iv_length(ENCRYPTION_METHOD);
    $iv = substr($data, 0, $iv_length);
    $encrypted_data = substr($data, $iv_length);
    return openssl_decrypt($encrypted_data, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gbtalfaomegasampit";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>