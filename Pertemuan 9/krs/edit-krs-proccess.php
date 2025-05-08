<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['edit-krs'])) {
    $id_lama           = $_POST['id_lama'];
    $id                = $_POST['id'];
    $mahasiswa_npm     = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $query = mysqli_query($koneksi, "UPDATE krs SET id='$id', mahasiswa_npm='$mahasiswa_npm', matakuliah_kodemk='$matakuliah_kodemk' WHERE id='$id_lama'");

    if ($query) {
        $message = urlencode("Data berhasil diupdate");
        header("Location: krs.php?message=$message&type=info");
    } else {
        $message = urlencode("Data gagal diupdate");
        header("Location: krs.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: krs.php?message=$message&type=error");
    exit;
}
?>