<?php require '../app/login.php' ?>
<?php 
//check if has admin account
$query = $pdo->query('SELECT COUNT(*) FROM admin');
if($query->fetch()[0] == 0){
    header('location: signup.php');
}else{
    if(isset($_SESSION['admin'])){
        header('location: dashboard.php');
        exit();
    }
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
                                    <p class=" fs-4 text-uppercase text-dark-brown">Admin Login</p>
                                </div>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger">
                                         <?= $error ?>
                                    </div>
                                <?php endif ?>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username:</label>
                                    <input type="text" value="<?= isset($_POST['username'])?$_POST['username']:''?>" name="username" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password:</label>
                                    <input type="password" value="<?= isset($_POST['password'])?$_POST['password']:''?>" id="password" name="password" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="show-password">
                                        <label class="form-check-label" for="show-password">
                                            Show Password
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-orange" type="submit" name="login">LOG IN</button>
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
                if (password.attr('type') == 'password') {
                    password.attr('type', 'text')
                } else {
                    password.attr('type', 'password')
                }
            })
        })
    </script>
</body>

</html>