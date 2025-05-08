<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['input-mahasiswa'])) {
    $npm     = $_POST['npm'];
    $nama    = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')");

    if ($query) {
        $message = urlencode("Data berhasil ditambahkan");
        header("Location: mahasiswa.php?message=$message&type=success");
    } else {
        $message = urlencode("Data gagal ditambahkan");
        header("Location: mahasiswa.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: mahasiswa.php?message=$message&type=error");
    exit;
}
?>
