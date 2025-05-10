<?php
// Koneksi ke database MySQL
// Pastikan Anda sudah membuat database dan tabel yang sesuai
// Ganti dengan informasi database yang telah Anda buat
$db_host = "localhost"; 
$db_user = "root"; 
$db_pass = ""; 
$db_name = "my_blog"; 

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Buat pengecekan ketika error koneksi ke MYSQL.
    if(mysqli_connect_error()) {
        die('Error: ' . mysqli_connect_error());
    }
?>