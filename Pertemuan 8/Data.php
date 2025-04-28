<?php

// Array bandara asal dan pajaknya
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

// Array bandara tujuan dan pajaknya
$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

// Urutkan nama bandara
ksort($bandara_asal);
ksort($bandara_tujuan);

// Inisialisasi variabel output
$nomor = $tanggal = $nama_maskapai = $asal = $tujuan = $harga_tiket = $pajak = $total_harga = "";

date_default_timezone_set('Asia/Jakarta'); // atau timezone sesuai kebutuhan


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor = uniqid(); // generate nomor unik
    $tanggal = date("d-m-Y"); // tanggal input
    $nama_maskapai = $_POST['nama_maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga_tiket = $_POST['harga_tiket'];

    // Cek apakah asal dan tujuan valid
    if (!array_key_exists($asal, $bandara_asal) || !array_key_exists($tujuan, $bandara_tujuan)) {
        echo "Bandara asal atau tujuan tidak valid.";
        exit;
    }

    // Hitung pajak
    $pajak_asal = $bandara_asal[$asal];
    $pajak_tujuan = $bandara_tujuan[$tujuan];
    $pajak = $pajak_asal + $pajak_tujuan;

    // Hitung total harga tiket
    $total_harga = $harga_tiket + $pajak;
}

?>
