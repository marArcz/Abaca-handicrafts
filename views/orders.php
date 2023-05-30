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
    <main>
        <section class="pt-0">
            <div class="px-lg-5 px-md-3 px-2">
                <div class="row justify-content-center gy-2 mt-3">
                    <div class="col-md">
                        <div class="card border-0 h-100">
                            <div class="card-body p-4">
                                <p class=" text-start fs-3 text-dark-brown my-2"><i class="bx bxs-time"></i> My Orders</p>
                                <hr>
                                <?php
                                $total_price = 0;
                                $item_count = 0;
                                // get items from cart
                                $query = $pdo->prepare('SELECT * FROM orders WHERE user_id = ?');
                                $query->execute([$user['id']]);
                                $orders = $query->fetchAll();
                                $shipping_fee = 100;
                                foreach ($orders as $key => $row) {
                                    // get items
                                    $query = $pdo->prepare('SELECT * FROM order_details WHERE order_id = ?');
                                    $query->execute([$row['id']]);
                                    $item_count = $query->rowCount();
                                ?>
                                    <!-- cart item -->
                                    <div class="card shadow border-0 mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="badge bg-light shadow-sm p-2 rounded-pill">
                                                        <span class="text-black-50 fw-bold">Order</span>
                                                        <span class="text-orange">#</span>
                                                        <span class="text-dark">
                                                            <?= $row['order_no']  ?>
                                                        </span>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-md-3">
                                                                <p class="mt-1 mb-2 text-secondary">
                                                                    <small>No. of Items</small>
                                                                </p>
                                                                <p class="my-1 text-dark-brown fw-bolder">
                                                                    <small><?= $item_count ?></small>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <p class="mt-1 mb-2 text-secondary">
                                                                    <small>Total Price</small>
                                                                </p>
                                                                <p class="my-1 text-orange fw-bolder">
                                                                    <small>₱<?= $row['total'] + $shipping_fee ?>.00</small>
                                                                </p>
                                                            </div>
                                                            <div class="col-md">
                                                                <p class="mt-1 mb-2 text-secondary">
                                                                    <small>Status</small>
                                                                </p>
                                                                <p class="my-1 text-dark-brown fw-bolder">
                                                                    <small><?= $row['status'] ?></small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="order-details.php?id=<?= $row['id'] ?>" class="btn btn-orange btn-sm">Order Details</a>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <p class="text-secondary">Order was placed on <span><?= date('M d, Y', strtotime($row['ordered_at'])) ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of cart item -->
                                <?php
                                }
                                ?>
                                <?php if (!$orders) : ?>
                                    <div class="text-center">
                                        <p class="text-center">You have not placed any orders yet.</p>
                                        <a href="shop.php" class="mt-3 text-orange nav-link text-uppercase">
                                            <small>Start shopping now</small>
                                        </a>
                                    </div>
                                <?php endif ?>
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