<?php

if (isset($_GET['npm'])) {
    include "../koneksi.php";
    $npm = $_GET['npm'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm='$npm'");

    if ($query) {
        $message = urlencode("Data berhasil dihapus");
        header("Location:mahasiswa.php?message={$message}&type=warning");

    } else {
        $message = urlencode("Data gagal dihapus");
        header("Location:mahasiswa.php?message={$message}&type=error");
    }
}
?>