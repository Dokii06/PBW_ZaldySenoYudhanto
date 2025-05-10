<?php

if (isset($_GET['id'])) {
    include "koneksi.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM articles WHERE id='$id'");

    if ($query) {
        $message = urlencode("Data berhasil dihapus");
        header("Location:index.php?message={$message}");

    } else {
        $message = urlencode("Data gagal dihapus");
        header("Location:add.php?message={$message}");
    }
}
?>