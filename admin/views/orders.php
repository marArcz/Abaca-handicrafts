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
    <title>Orders </title>
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
        <?php $header_title = "Orders" ?>
        <?php include '../shared/header.php' ?>
        <!-- header -->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include '../shared/sidebar.php' ?>

        <!-- content -->
        <div class="content-body">
            <div class="container-fluid">
                <!-- <p class="fs-5 text-primary">Hi, these are the orders received</p> -->
                <p>List of orders received</p>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Ship to</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->prepare('SELECT orders.*,users.firstname,users.lastname FROM orders INNER JOIN users ON orders.user_id = users.id');
                                    $query->execute();
                                    while ($row = $query->fetch()) {
                                        $q = $pdo->prepare('SELECT COUNT(*) FROM order_details WHERE order_id = ?');
                                        $q->execute([$row['id']]);
                                        $items = $q->fetch()[0];
                                    ?>
                                        <tr>
                                            <td>
                                                <i class="bx bx-hash text-primary"></i>
                                                <?= $row['order_no'] ?>
                                            </td>
                                            <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                            <td><?= date("M d, Y", strtotime($row['ordered_at'])) ?></td>
                                            <td><?= $row['shipping_address'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 'Pending') {
                                                ?>
                                                    <span class="badge bg-orange"><?= $row['status'] ?></span>
                                                <?php
                                                } else if ($row['status'] == 'Processing') {
                                                ?>
                                                    <span class="badge bg-dark-brown"><?= $row['status'] ?></span>
                                                <?php
                                                } else if ($row['status'] == 'On Hold') {
                                                ?>
                                                    <span class="badge bg-danger"><?= $row['status'] ?></span>
                                                <?php
                                                } else if ($row['status'] == 'Completed') {
                                                ?>
                                                    <span class="badge bg-success"><?= $row['status'] ?> <i class=" bx bx-check"></i></span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class=" dropleft">
                                                    <a class="btn btn-light text-primary btn-sm justify-content-center d-flex align-items-center" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-dots-horizontal bx-sm '></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-righ">
                                                        <?php
                                                        $order_status = ['Completed', 'Processing', 'On Hold', 'Pending'];
                                                        foreach ($order_status as $key => $status) {
                                                        ?>
                                                            <a class="dropdown-item" href="../app/update-order-status.php?status=<?= $status ?>&order_id=<?= $row['id'] ?>"><?= $status ?></a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="../app/delete-order.php?id=<?= $row['id'] ?>">Delete</a>
                                                    </div>
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
    </div>

    <!-- scripts -->
    <?php include '../shared/scripts.php' ?>
    <script>

    </script>

</body>

</html>