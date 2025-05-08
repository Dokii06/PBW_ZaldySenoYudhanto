<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['edit-matakuliah'])) {
    $kodemk_lama = $_POST['kodemk_lama'];
    $kodemk  = $_POST['kodemk'];
    $nama    = $_POST['nama'];
    $jumlah_sks    = $_POST['jumlah_sks'];

    $query = mysqli_query($koneksi, "UPDATE matakuliah SET kodemk='$kodemk', nama='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk_lama'");

    if ($query) {
        $message = urlencode("Data berhasil diupdate");
        header("Location: matakuliah.php?message=$message&type=info");
    } else {
        $message = urlencode("Data gagal diupdate");
        header("Location: matakuliah.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: matakuliah.php?message=$message&type=error");
    exit;
}
?>