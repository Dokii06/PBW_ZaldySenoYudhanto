<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['input-matakuliah'])) {
    $kodemk     = $_POST['kodemk'];
    $nama    = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    $alamat  = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', '$jumlah_sks')");

    if ($query) {
        $message = urlencode("Data berhasil ditambahkan");
        header("Location: matakuliah.php?message=$message&type=success");
    } else {
        $message = urlencode("Data gagal ditambahkan");
        header("Location: matakuliah.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: matakuliah.php?message=$message&type=error");
    exit;
}
?>
