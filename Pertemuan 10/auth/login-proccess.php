<?php
if (isset($_POST['login'])) {
    include "../koneksi.php";
    session_start();

    // fill this
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Hashing 
    $password = sha1($password);
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['name'] = $data['name'];
        $_SESSION['success'] = "Welcome " . $_SESSION['name'] . " to the Dashboard Page";
        header("Location:../index.php");
    } else {
        $_SESSION['danger'] = "Login failed, wrong password";
        header("Location:login.php");
    }
}
?>