<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <?php include_once './shared/head.php' ?>
</head>

<body class="bg-light">
    <?php $active_page="login" ?>
    <?php include './shared/top_header.php' ?>
    <main class=" ">
        <section class="">
            <div class="container ">
                <br><br>
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="text-center mb-4">
                                <p class="fs-4 fw-bold text-dark f-ralewa text-uppercase">Log In</p>
                                <p class="my-1 fw-lighter fs-6">Please enter your username and password</p>
                            </div>
                            <div class="mb-3">
                                <!-- <label for="" class="form-label text-secondary"><span>Username</span></label> -->
                                <input type="email" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Email" name="username">
                            </div>
                            <div class="mb-3">
                                <!-- <label for="" class="form-label text-secondary"><span>Password</span></label> -->
                                <input type="password" name="password" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <a href="#" class="link-dark fw-lighter mb-3">Forgot Password?</a>
                                <button class="btn btn-orange col-12 fs-6 shadow-sm mt-4 rounded-0  btn-lg" type="submit">
                                    <small>LOG IN</small>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                                <p>New to this site? <a href="signup.php" class="link-orange fw-bold text-decoration-none">Sign Up</a></p>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br><br>
    <?php include './shared/footer.php' ?>
    <?php include './shared/scripts.php' ?>
</body>

</html>