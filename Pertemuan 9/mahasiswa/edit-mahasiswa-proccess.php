<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['edit-mahasiswa'])) {
    $npm_lama = $_POST['npm_lama'];
    $npm     = $_POST['npm'];
    $nama    = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm_lama'");

    if ($query) {
        $message = urlencode("Data berhasil diupdate");
        header("Location: mahasiswa.php?message=$message&type=info");
    } else {
        $message = urlencode("Data gagal diupdate");
        header("Location: mahasiswa.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: mahasiswa.php?message=$message&type=error");
    exit;
}
?>