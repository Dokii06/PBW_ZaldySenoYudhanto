<?php

if (isset($_GET['kodemk'])) {
    include "../koneksi.php";
    $kodemk = $_GET['kodemk'];
    $query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kodemk='$kodemk'");

    if ($query) {
        $message = urlencode("Data berhasil dihapus");
        header("Location:matakuliah.php?message={$message}&type=warning");

    } else {
        $message = urlencode("Data gagal dihapus");
        header("Location:matakuliah.php?message={$message}&type=error");
    }
}
?>