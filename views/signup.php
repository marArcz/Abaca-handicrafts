<?php
require '../app/signup.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <?php include_once '../shared/head.php' ?>
</head>

<body class="bg-light">
    <?php $active_page = "signup" ?>
    <?php include '../shared/top_header.php' ?>
    <main class=" ">
        <section class="">
            <div class="container ">
                <br><br>
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-md-6">
                        <!-- signup form -->
                        <form action="" method="post">
                            <div class="text-center mb-4">
                                <p class="fs-4 fw-bold text-dark f-ralewa text-uppercase">Create Your Account</p>
                            </div>
                            <!-- showing signup error message -->
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger">
                                    <!-- print error -->
                                    <?= $error ?>
                                </div>
                            <?php endif ?>
                            <div class="form-groups">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="form-label text-secondary"><span>Firstname</span></label>
                                            <input value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" type="text" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Firstname" name="firstname">
                                        </div>
                                        <div class="col-md">
                                            <label for="" class="form-label text-secondary"><span>Lastname</span></label>
                                            <input value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" type="text" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Lastname" name="lastname">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label text-secondary"><span>Home Address</span></label>
                                    <input value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" type="text" name="address" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Home Address">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="form-label text-secondary"><span>Email</span></label>
                                            <input value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" type="email" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Email Address" name="email">
                                               <!-- email error message -->
                                               <p class="text-danger">
                                                <?= isset($email_error)? $email_error:'' ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="" class="form-label text-secondary"><span>Password</span></label>
                                            <input value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" type="password" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Password" name="password">
                                            <!-- password error message -->
                                            <p class="text-danger">
                                                <?= isset($password_error) ? $password_error : '' ?>
                                            </p>
                                        </div>
                                        <div class="col-md">
                                            <label for="" class="form-label text-secondary"><span>Confirm Password</span></label>
                                            <input value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>" type="password" class="form-control rounded-0 form-control-lg fs-6" required placeholder="Confirm Password" name="confirm_password">
                                            <!-- password error message -->
                                            <p class="text-danger">
                                                <?= isset($password_error) ? $password_error : '' ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <!-- <a href="#" class="link-dark fw-lighter mb-3">Forgot Password?</a> -->
                                <button class="btn btn-orange col-12 fs-6 shadow-sm mt-4 rounded-0  btn-lg" type="submit" name="signup">
                                    <small>Create Account</small>
                                </button>
                            </div>
                            <br>
                            <div class="text-center">
                                <p>Already have an account? <a href="login.php" class="link-orange fw-bold text-decoration-none">Log In</a></p>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br><br>
    <?php include '../shared/footer.php' ?>
    <?php include '../shared/scripts.php' ?>
</body>

</html>