<?php
include 'koneksi.php';
if (isset($_POST['add'])) {

    // Ambil data-data yang dikirimkan dari form di file 'add', lalu masukkan kedalam setiap variable
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $thumbnail = $_POST['thumbnail'];

    $extension_allowed = array('png', 'jpg', "jpeg");
    $name = $_FILES['thumbnail']['name'];
    $x = explode('.', $name);
    $extension = strtolower(end($x));
    $size = $_FILES['thumbnail']['size'];
    $file_tmp = $_FILES['thumbnail']['tmp_name'];

    // Cek ekstensi file
    if (!in_array($extension, $extension_allowed)) {
        $message = urlencode("Extension image tidak diperbolehkan");
        header("Location:index.php?message={$message}");
        return;
    }

    // 1MB
    if ($size > 1044070) {
        $message = urlencode("Ukuran File Terlalu Besar");
        header("Location:index.php?message={$message}");
        return;
    }

    // Memindahkan file sementara ke folder images
    move_uploaded_file($file_tmp, 'images/' . $name);

    // Menyimpan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO articles VALUES(NULL, '$title','$content','$category','$name')");

    // Kita Cek apakah berhasil di tambahkan/tidak
    if ($query) {
        $message = "Data berhasil ditambahkan";
        $message = urlencode($message);
        header("Location:index.php?message={$message}");
    } else {
        $message = "Data gagal ditambahkan";
        $message = urlencode($message);
        header("Location:index.php?message={$message}");
    }
} else {
    $message = urlencode("Ops! name of button form is not correctly");
    header("Location:index.php?message={$message}");
}
