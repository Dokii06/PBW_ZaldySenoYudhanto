<?php
include 'koneksi.php';


// Ini akan mengecek apakah ada data yang dikirimkan melalui metode POST itu ada
if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $id = $_POST['id'];
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
    $query = mysqli_query($koneksi, "UPDATE articles SET title='$title', content='$content', category='$category', thumbnail='$name' WHERE id='$id'");
    if ($query) {
        $message = urlencode("Data berhasil diubah");
        header("Location:index.php?message={$message}");
    } else {
        $message = urlencode("Data gagal diubah");
        header("Location:add.php?message={$message}");
    }
}  else {
    $message = urlencode("Ops! name of button form is not correctly");
    header("Location:index.php?message={$message}");
}
