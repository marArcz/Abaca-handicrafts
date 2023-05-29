<?php require '../shared/user_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <?php include '../shared/head.php' ?>
</head>

<body>
    <?php $active_page = "orders" ?>
    <?php include '../shared/top_header.php' ?>
    <?php
    // get order details
    $order_id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM orders WHERE id = ?');
    $query->execute([$order_id]);
    $order = $query->fetch();

    $query = $pdo->prepare('SELECT * FROM order_details WHERE order_id = ?');
    $query->execute([$order_id]);
    $orders = $query->fetchAll();
    ?>
    <main>
        <section class="pt-0">
            <div class="px-lg-5 px-md-3 px-2">
                <div class="row justify-content-center gy-2 mt-3">
                    <div class="col-md">
                        <div class="card border-0 h-100">
                            <div class="card-body p-4">
                                <a href="orders.php" class=" nav-link link-orange fw-bold">
                                    <i class=" bx bx-left-arrow-alt"></i>
                                    Orders
                                </a>
                                <hr>
                                <div class="card shadow border-0 mb-3">
                                    <div class="card-body p-xl-5 p-lg-4 p-md-3">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex flex-wrap">
                                                    <div class="badge bg-light shadow-sm p-3 rounded-pill me-auto">
                                                        <p class="my-0">
                                                            <span class="text-black-50 fw-bold">Order</span>
                                                            <span class="text-orange">#</span>
                                                            <span class="text-dark">
                                                                <?= $order['order_no']  ?>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="">
                                                        <?php
                                                        if ($order['status'] == 'Pending') {
                                                        ?>
                                                            <span class="py-2 px-3 badge bg-orange"><?= $order['status'] ?></span>
                                                        <?php
                                                        } else if ($order['status'] == 'Processing') {
                                                        ?>
                                                            <span class="py-2 px-3 badge bg-dark-brown"><?= $order['status'] ?></span>
                                                        <?php
                                                        } else if ($order['status'] == 'On Hold') {
                                                        ?>
                                                            <span class="py-2 px-3 badge bg-danger"><?= $order['status'] ?></span>
                                                        <?php
                                                        } else if ($order['status'] == 'Completed') {
                                                        ?>
                                                            <span class="py-2 px-3 badge bg-success"><?= $order['status'] ?> <i class=" bx bx-check"></i></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <ul class=" list-group-flush list-group">
                                                        <?php
                                                        foreach ($orders as $key => $row) {
                                                        ?>
                                                            <li class=" list-group-item">
                                                                <div class="row align-items-center">
                                                                    <div class="col-xl-2 col-lg-2 col-md-3">
                                                                        <img class=" img-thumbnail img-fluid" src="<?= $row['product_image'] ?>" alt="">
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <?php if ($row['product_id'] == NULL) : ?>
                                                                            <p class="mb-1 text-dark fw-bold"><?= $row['product_name'] ?></p>
                                                                        <?php else : ?>
                                                                            <a href="view-product.php?id=<?= $row['product_id'] ?>" class="mb-1 text-dark fw-bold"><?= $row['product_name'] ?></a>
                                                                        <?php endif ?>
                                                                        <p class="mb-1 text-secondary">Qty: <span class=" text-dark-brown fw-bold"><?= $row['quantity'] ?></span></p>

                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="my-1">₱<?= $row['product_price'] ?>.00</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <p class=" mb-1 text-black-50">Payment method</p>
                                                            <p class=" mb-1 fw-bold"><?= $order['payment_method'] ?></p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="d-flex">
                                                                <p class=" my-1 me-auto text-secondary">Subtotal</p>
                                                                <p class=" my-1">₱<?= $order['total'] ?>.00</p>
                                                            </div>
                                                            <div class="d-flex">
                                                                <p class=" my-1 me-auto text-secondary">Shipping fee</p>
                                                                <p class=" my-1">₱100.00</p>
                                                            </div>
                                                            <div class="d-flex mt-3">
                                                                <p class=" my-1 me-auto fw-bold">Total</p>
                                                                <p class=" my-1 fw-bold text-orange">₱<?= $order['total'] + 100 ?>.00</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <p class="text-secondary">
                                                <small>Order was placed on <span class=" text-dark-brown fw-bold"><?= date('M d, Y', strtotime($order['ordered_at'])) ?></span></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of cart item -->
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

    <script>
        $(".quantity-control-up").on('click', function(e) {
            let btn = $(this);

            btn.siblings("input")[0].stepUp();
        })
        $(".quantity-control-down").on('click', function(e) {
            let btn = $(this);

            btn.siblings("input")[0].stepDown();
        })

        $(function(e) {
            $(".quantity-control-up, .quantity-control-down").on('click', function(e) {
                let input = $(this).siblings("input");
                let cartId = input.data('id');
                let quantity = input.val();
                updateCartQuantity(cartId, quantity)
                let subtotal = $(input.data('row')).find(".text-subtotal").html();

            })

        })

        function updateCartQuantity(cart_id, quantity) {
            Notiflix.Loading.pulse();
            $.ajax({
                url: '../app/update-cart-quantity.php',
                method: 'post',
                dataType: 'json',
                data: {
                    cart_id,
                    quantity
                },
                success: function(res) {
                    Notiflix.Loading.remove();
                    console.log(res)
                    $("#text-total-price").html(res.total)
                    $("#text-item-count").html(res.cart.item_count)
                    $(`#cart-row-item-${res.cart.id}`).find(".text-subtotal").html('₱' + Number(res.cart.quantity) * Number(res.cart.price) + '.00')
                },
                error: function(err) {
                    Notiflix.Loading.remove();
                    console.log('err: ', err);
                }
            })
        }
    </script>
</body>

</html>