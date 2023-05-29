<?php require '../app/signup.php' ?>
<?php
//check if has admin account
$query = $pdo->query('SELECT COUNT(*) FROM admin');
if ($query->fetch()[0] > 0) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <?php include_once '../shared/head.php' ?>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/styles/css/custom.css">
    <link rel="stylesheet" href="../../assets/styles/css/admin.css">
</head>

<body class=" bg-dark-brown">
    <div class="auth-box">
        <div class="inner">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-4">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="text-center">
                                    <img src="../../assets/images/abaca-logo.png" class="mb-3" width="170" alt="">
                                    <p class=" fs-4 text-uppercase text-dark-brown">Create Admin Account</p>
                                </div>
                                <hr>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger">
                                        <?= $error ?>
                                    </div>
                                <?php endif ?>
                                <div class="row mb-3 gx-3 gy-3 px-0 mx-0">
                                    <div class="col-md">
                                        <label for="" class="form-label">Firstname:</label>
                                        <input value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" type="text" required name="firstname" class="form-control">
                                    </div>
                                    <div class="col-md">
                                        <label for="" class="form-label">Lastname:</label>
                                        <input value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" type="text" required name="lastname" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label for="" class="form-label">Username:</label>
                                        <input type="text" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" name="username" required class="form-control ">
                                        <p class="text-danger ms-1">
                                            <small><?= isset($error['username'])? $error['username']:'' ?></small>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Password:</label>
                                        <input type="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" id="password" name="password" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Confirm Password:</label>
                                        <input type="password" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>" id="confirm-password" name="confirm_password" required class="form-control">
                                        <p class="text-danger ms-1">
                                            <small><?= isset($error['confirm_password'])? $error['confirm_password']:'' ?></small>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="show-password">
                                            <label class="form-check-label" for="show-password">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-orange" type="submit" name="signup">CREATE ACCOUNT</button>
                                </div>
                            </form>
                            <br>
                            <div class="text-center mt-3 text-black-50">
                                <p class=" text-uppercase">
                                    <small>Abaca Handicraft &copy; <?= date('Y') ?> | Admin Panel</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../shared/scripts.php' ?>
    <script>
        $(function(e) {
            $("#show-password").on('change', function(e) {
                let password = $("#password");
                let confirmPassword = $("#confirm-password");
                if (password.attr('type') == 'password') {
                    password.attr('type', 'text')
                    confirmPassword.attr('type', 'text')
                } else {
                    password.attr('type', 'password')
                    confirmPassword.attr('type', 'password')
                }
            })
        })
    </script>
</body>

</html>