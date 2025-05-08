<?php
include '../koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['input-krs'])) {
    $id     = $_POST['id'];
    $mahasiswa_npm    = $_POST['mahasiswa_npm'];
    $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

    $query = mysqli_query($koneksi, "INSERT INTO krs (id, mahasiswa_npm, matakuliah_kodemk) VALUES ('$id', '$mahasiswa_npm', '$matakuliah_kodemk')");

    if ($query) {
        $message = urlencode("Data berhasil ditambahkan");
        header("Location: krs.php?message=$message&type=success");
    } else {
        $message = urlencode("Data gagal ditambahkan");
        header("Location: krs.php?message=$message&type=error");
    }
    exit;
} else {
    $message = urlencode("Form tidak dikirim dengan benar");
    header("Location: krs.php?message=$message&type=error");
    exit;
}
?>
