<?php
if (isset($_POST['register'])) {
    include "../koneksi.php";
    session_start();

    // fill this
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Hashing pw
    $password = sha1($password);
    $confirm_password = sha1($confirm_password);
    $query = mysqli_query($koneksi, "SELECT email from user WHERE email='$email'");
    $data = mysqli_fetch_array($query);
    
    // Validasi 
    if ($email == $data['email']) {
        $_SESSION['danger'] = "E-mail already used";
        header("Location:register.php");
    } else {
        if ($password === $confirm_password) {
            $create = mysqli_query($koneksi, "INSERT INTO user VALUES(null,'$name','$email','$password')");

            // Add sessions [name] here;
            $_SESSION['name'] = $name;

            $_SESSION['success'] = "Congratulations " . $_SESSION['name'] . ", your registration was successful. Please login to enter";
            header("Location:login.php");
        } else {
            $_SESSION['danger'] = "Password doesn't match";
            header("Location:register.php");
        }
    }
}
?>