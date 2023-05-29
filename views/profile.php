<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php include '../shared/head.php' ?>
</head>

<body>
    <?php $active_page = "profile" ?>
    <?php include '../shared/top_header.php' ?>
    <main>
        <section class="pt-3">
            <div class="container">
                <a href="shop.php" class=" d-flex align-items-center text-decoration-none link-brown">
                    <i class=" bx bx-chevron-left bx-md"></i>
                    Continue Shopping
                </a>
                <div class="row gx-2 mt-3">
                    <div class="col-md">
                        <div class="card rounded-1 profile-card shadow border-0">
                            <div class="card-header bg-dark-brown py-3">
                                <div class="container">
                                    <div class="profile-header d-flex align-items-center">
                                        <div class="profile-pic">
                                            <div class="lg photo-div rounded-circle border border-3 border-white shadow" data-image="../assets/images/profile_sample.jpg">
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fs-3 text-light">John Doe</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body py-5">
                                <div class="container">
                                    <div class="row mt-3">
                                        <div class="col-md">
                                            <h5 class="">Personal Information</h5>
                                            <div>
                                                <?php
                                                $personal_info = [
                                                    "Gender" => "Male",
                                                    "Email Address" => "johndoe@gmail.com",
                                                    "Address" => "Gogon Centro Virac, Catanduanes",
                                                ];

                                                foreach ($personal_info as $key => $value) {
                                                ?>
                                                    <p class="fs-6 text-secondary my-1">
                                                        <small><?php echo $key ?>: <span><?php echo $value ?></span></small>
                                                    </p>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <h5>Purchases</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 rounded-1 shadow border-top border-dark-brown border-4 h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="fs-5 ">Your Cart</p>
                                    <!-- <p><i class="bx bx-cart-alt bx-sm"></i></p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <br>
    <?php include '../shared/footer.php' ?>
    <?php include '../shared/scripts.php' ?>
</body>

</html>