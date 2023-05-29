<?php require '../shared/user_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php include '../shared/head.php' ?>
</head>

<body>
    <?php $active_page = "cart" ?>
    <?php include '../shared/top_header.php' ?>
    <main>
        <section class="pt-5">
            <div class="px-lg-5 px-md-3 px-2">
                <a href="shop.php" class=" d-flex align-items-center text-decoration-none link-brown">
                    <i class=" bx bx-chevron-left bx-md"></i>
                    Continue Shopping
                </a>
                <div class="row justify-content-center gy-2 mt-3">
                    <div class="col-md">
                        <div class="card border shadow h-100">
                            <div class="card-header bg-dark-brown">
                                <p class=" text-start fs-5 text-light my-2"><i class="bx bxs-cart"></i> My Cart</p>
                            </div>
                            <div class="card-body p-4">
                                <ul class=" list-group list-group-flush">
                                    <?php
                                    $total_price = 0;
                                    $item_count = 0;
                                    // get items from cart
                                    $query = $pdo->prepare('SELECT cart.*,products.*,cart.id AS cart_id,categories.category_name FROM cart INNER JOIN products ON cart.product_id = products.id INNER JOIN categories ON products.category_id = categories.id WHERE cart.user_id = ?');
                                    $query->execute([$user['id']]);
                                    $cart_items = $query->fetchAll();

                                    foreach ($cart_items as $key => $cart_item) {
                                    $item_count += $cart_item['quantity'];
                                    ?>
                                        <li class=" list-group-item mb-3" id="cart-row-item-<?= $cart_item['id'] ?>">
                                            <!-- cart item -->
                                            <div class="row align-items-center">

                                                <div class="col-3 col-lg-2 col-md-2">
                                                    <img src="<?= $cart_item['image'] ?>" class="img-fluid" alt="">
                                                </div>
                                                <div class="col-6">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-5">
                                                            <p class="mb-1 fs-6 fw-bold col-12 text-truncate"><?= $cart_item['product_name'] ?></p>
                                                            <div class=" text-bg-orange badge"><small><?= $cart_item['category_name'] ?></small></div>
                                                            <p class="mt-3 fw-bold fs-6 text-price">₱<?= $cart_item['price'] ?>.00</p>
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="input-group input-group-sm mb-3 col-lg-6 col-md-7">
                                                                <button class="btn btn-dark-brown text-light quantity-control-up" type="button">
                                                                    <i class="bx bx-plus"></i>
                                                                </button>
                                                                <input type="number" readonly min="1" value="<?= $cart_item['quantity'] ?>" data-row="#cart-row-item-<?= $cart_item['id'] ?>" class="form-control text-center quantity-input" data-id="<?= $cart_item['cart_id'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                                <button class="btn btn-light border quantity-control-down" type="button">
                                                                    <i class="bx bx-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row align-items-center">

                                                        <div class="col-md">
                                                            <p class="text-black-50 my-0">
                                                                <small>Subtotal</small>
                                                            </p>
                                                            <p class="my-1 text-subtotal">
                                                                <?php
                                                                // compute subtotal
                                                                $subtotal = $cart_item['quantity'] * $cart_item['price'];
                                                                $total_price += $subtotal;
                                                                echo '₱' . $subtotal . '.00';
                                                                ?>
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="../app/remove-cart-item.php?id=<?= $cart_item['cart_id'] ?>" class="remove-item shadow-sm fw-bold text-dark-brown btn btn-light border">
                                                        <i class="bx bx-x"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- end of cart item -->
                                        </li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                                <div class="text-center">
                                    <a href="shop.php" class=" link-orange text-decoration-none">Continue Shopping <i class="bx bx-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-0 shadow h-100 border-top border-dark-brown border-3">
                            <div class="card-body p-4">
                                <?php 
                                    $query = $pdo->prepare('SELECT SUM(quantity) FROM cart WHERE user_id = ?');
                                    $query->execute([$user['id']]);

                                ?>
                                <p class="fs-5">Order Summary</p>
                                <hr>
                                <div class="d-flex mb-3">
                                    <p class="my-1 fw-bold">ITEMS</p>
                                    <p class="my-1 ms-auto fw-bold"><span id="text-item-count"><?= $item_count ?></span></p>
                                </div>
                                <form action="checkout.php" method="post">
                                    <div class="mb-3">
                                        <label for="" class="form-label">SHIPPING</label>
                                        <select name="" class="form-select" id="">
                                            <option value="standard">Standard Delivery - 50</option>
                                            <option value="urgent">Urgent Delivery - 100</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="d-flex mb-3">
                                        <p class="my-1 fw-bold">Total Price</p>
                                        <p  class="my-1 ms-auto fw-bold">₱<span id="text-total-price"><?= $total_price ?></span>.00</p>
                                    </div>
                                    <button class=" btn btn-orange col-12" type="submit">Checkout</button>
                                </form>
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
                updateCartQuantity(cartId,quantity)
                let subtotal = $(input.data('row')).find(".text-subtotal").html();
                
            })
            
        })

        function updateCartQuantity(cart_id,quantity) { 
            Notiflix.Loading.pulse();
               $.ajax({
                    url:'../app/update-cart-quantity.php',
                    method:'post',
                    dataType:'json',
                    data:{cart_id,quantity},
                    success:function(res){
                        Notiflix.Loading.remove();
                        console.log(res)
                        $("#text-total-price").html(res.total)
                        $("#text-item-count").html(res.cart.item_count)
                        $(`#cart-row-item-${res.cart.id}`).find(".text-subtotal").html('₱'+Number(res.cart.quantity) * Number(res.cart.price) + '.00')
                    },
                    error:function(err){
                        Notiflix.Loading.remove();
                        console.log('err: ', err);
                    }
                })
         }
    </script>
</body>

</html>