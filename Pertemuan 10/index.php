<!-- cek apakah sudah login -->
<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:auth/login.php");
    exit;
}
?>
// cek apakah session name ada

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">

            <!-- See the query params (messages) in the url? Can you get that and show it in page? -->
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
            }
            ?>
            <div class="col-md-12">
                <?php if (isset($message)) { ?>
                    <div class="alert alert-danger my-4"><?= $message ?></div>
                <?php } ?>
            </div>

            <!-- Tambahkan informasi message error/success disini -->

            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between">
                            <h2>List Articles</h2>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-between">
                                <a href="add.php" class="btn btn-primary">Add Article</a>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="auth/logout.php" class= "btn btn-danger">Log Out</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM articles");
                                foreach ($query as $data) {
                                ?>
                                    <tr>
                                        <t><?= $no++ ?></td>
                                            <td><?= $data['title'] ?></td>
                                            <td><?= $data['content'] ?></td>
                                            <td><?= $data['category'] ?></td>
                                            <td>
                                                <img src="images/<?= $data['thumbnail'] ?>" class="img-fluid img-thumbnail">
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning mx-2">Edit</a>
                                                    <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger mx-2">Delete</a>
                                                </div>
                                            </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>