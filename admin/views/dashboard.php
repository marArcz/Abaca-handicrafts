<?php require '../shared/session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Dashboard </title>
    <?php include '../shared/head.php' ?>

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!-- header -->
        <?php $header_title = "Dashboard" ?>
        <?php include '../shared/header.php' ?>
        <!-- header -->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include '../shared/sidebar.php' ?>

        <!-- content -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-4">
                        <div class="widget-stat card ">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3 bgl-primary text-primary">
                                        <i class=" flaticon-381-hourglass-1"></i>
                                        <!-- <i class="bx bx-user"></i> -->
                                    </span>
                                    <div class="media-body text-dark text-end">
                                        <?php
                                        $query = $pdo->prepare('SELECT COUNT(*) FROM orders WHERE status = ?');
                                        $query->execute(['Pending']);
                                        $order_count = $query->fetch()[0];
                                        ?>
                                        <p class="mb-1">Pending Orders</p>
                                        <h3 class="text-primary">
                                            <?= $order_count ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-4">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3 text-success bgl-success">
                                        <i class=" flaticon-381-success"></i>
                                        <!-- <i class="bx bx-user"></i> -->
                                    </span>
                                    <div class="media-body text-dark text-end">
                                        <?php
                                        $query = $pdo->prepare('SELECT COUNT(*) FROM orders WHERE status = ?');
                                        $query->execute(['Completed']);
                                        $order_count = $query->fetch()[0];
                                        ?>
                                        <p class="mb-1">Successful Orders</p>
                                        <h3 class="text-success"><?= $order_count ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-4">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3 text-danger bgl-danger">
                                        <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </span>
                                    <div class="media-body text-dark text-end">
                                        <?php
                                        $query = $pdo->prepare('SELECT SUM(total) FROM orders WHERE status = ?');
                                        $query->execute(['Completed']);
                                        $revenue = $query->fetch()[0];
                                        ?>
                                        <p class="mb-1">Revenue</p>
                                        <h3 class="text-danger">
                                            <?= $revenue?$revenue : 0 ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-4">
                        <div class="widget-stat card bg-primary">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3 text-white bgl-white">
                                        <i class=" flaticon-381-box-2"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                        <?php
                                        $query = $pdo->prepare('SELECT COUNT(*) FROM products');
                                        $query->execute();
                                        $count = $query->fetch()[0];
                                        ?>
                                        <p class="mb-1">Total Products</p>
                                        <h3 class="text-white"><?= $count ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-sm-4">
                        <div class="widget-stat card bg-info">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3 text-white bgl-white">
                                        <i class=" flaticon-381-user-7"></i>
                                    </span>
                                    <div class="media-body text-white text-end">
                                    <?php
                                            $query = $pdo->prepare('SELECT COUNT(*) FROM users');
                                            $query->execute();
                                            $count = $query->fetch()[0];
                                        ?>
                                        <p class="mb-1">Customers</p>
                                        <h3 class="text-white"><?= $count ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <?php include '../shared/scripts.php' ?>
    <script>

    </script>

</body>

</html>