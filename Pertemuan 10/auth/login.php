<html lang="en">

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <?php
                if (isset($_SESSION['success'])) {
                    ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                    <?php
                    unset($_SESSION['success']);
                } else if (isset($_SESSION['danger'])) {
                    ?>
                        <div class="alert alert-danger"><?= $_SESSION['danger'] ?></div>
                        <?php
                        unset($_SESSION['danger']);
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h2>Login Form</h2>
                        <p>Don't have an account yet? <a class="text-decoration-none" href="register.php">Register</a>
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="login-proccess.php" method="post">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>