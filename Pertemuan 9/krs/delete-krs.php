<?php

if (isset($_GET['id'])) {
    include "../koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM krs WHERE id='$id'");

    if ($query) {
        $message = urlencode("Data berhasil dihapus");
        header("Location:krs.php?message={$message}&type=warning");

    } else {
        $message = urlencode("Data gagal dihapus");
        header("Location:krs.php?message={$message}&type=error");
    }
}
?>