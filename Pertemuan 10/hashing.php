<?php
$password = "admin12345";

$sh1 = sha1($password);
echo "SHA1: $sh1\n";

$md5 = md5($password);
echo "MD5: $md5\n";
?>
