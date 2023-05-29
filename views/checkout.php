<?php require '../shared/user_session.php' ?>
<?php require '../app/checkout.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php include '../shared/head.php' ?>
</head>

<body class=" bg-light">
    <?php $active_page = "checkout" ?>
    <?php include '../shared/top_header.php' ?>
    <main>
        <section class="pt-5">
            <div class="px-lg-5 px-md-3 px-2">
                <h3 class=" text-dark-brown"><i class=" bx bxs-receipt"></i> Checkout</h3>
                <div class="row justify-content-center gx-5 gy-2 mt-3">
                    <div class="col-md">
                        <p>
                            <span class=" text-orange fw-bold">SHIPPING DETAILS</span>
                        </p>
                        <hr>
                        <form action="" id="form" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label"><i class=" text-dark-brown bx bxs-user"></i> Name:</label>
                                <input type="text" class="form-control" name="name" value="<?= $user['firstname'] . ' ' . $user['lastname'] ?>" placeholder="Enter name...">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">
                                    <i class=" text-dark-brown bx bxs-map"></i>
                                    Shipping Address:
                                </label>
                                <input type="text" class="form-control" name="address" value="<?= $user['address'] ?>" placeholder="Enter address...">
                            </div>
                            <br>
                            <p class=" text-orange fw-bold">PAYMENT DETAILS</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input payment-radio" type="radio" checked value="Cash" name="payment_method" id="cash-payment-option">
                                                <label class="form-check-label" for="cash-payment-option">
                                                    <span class="fw-bold text-dark-brown">
                                                        Pay with Cash
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="mt-2">
                                                <p>Pay delivery personnel cash money for the order.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input payment-radio" type="radio" value="Card" name="payment_method" id="card-payment-option">
                                                <label class="form-check-label" for="card-payment-option">
                                                    <span class="fw-bold">
                                                        Pay with Card
                                                    </span>
                                                </label>
                                            </div>
                                            <div id="card-details">
                                                <div class="mb-3">
                                                    <label for="" class="form-label "><small>NAME OF CARD</small></label>
                                                    <input type="text" class="form-control" name="card_name" disabled required placeholder="Enter name of card...">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label "><small>CARD NUMBER</small></label>
                                                    <input type="number" class="form-control" name="card_name" disabled required placeholder="Enter card number...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" name="checkout" class=" btn btn-dark-brown btn-lg rounded-1">
                                    Checkout
                                    <i class=" bx bx-right-arrow-alt"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 h-100 overflow-auto">
                        <p>
                            <span class=" text-orange">YOUR ORDER</span>
                        </p>
                        <hr>
                        <ul class="list-group list-group-flush" style="max-height:400px;overflow-y:auto;">
                            <?php
                            // get items from cart
                            $total = 0;
                            $item_count = 0;
                            $query = $pdo->prepare('SELECT cart.*,products.*,cart.id AS cart_id,categories.category_name FROM cart INNER JOIN products ON cart.product_id = products.id INNER JOIN categories ON products.category_id = categories.id WHERE cart.user_id = ?');
                            $query->execute([$user['id']]);
                            while ($row = $query->fetch()) {
                                $item_count += $row['quantity'];
                                $total += $row['price'] * $row['quantity'];
                            ?>
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <img src="<?= $row['image'] ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center gx-4 justify-content-center">
                                                <div class="col-md">
                                                    <p class="my-1"><?= $row['product_name'] ?></p>
                                                    <p class="my-1 text-secondary"><small><?= $row['category_name'] ?></small></p>
                                                </div>
                                                <div class="col-md">
                                                    <div class="badge text-bg-dark-brown text-light">
                                                        <?= $row['quantity'] ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <p class="text-orange fw-bold my-1">
                                                <small>₱<?= $row['price'] * $row['quantity'] ?>.00</small>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <hr>
                        <div class="d-flex">
                            <p class="my-1">Subtotal</p>
                            <p class="my-1 ms-auto">₱<?= $total ?>.00</p>
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
        $(function(e) {

            $(".payment-radio").on('change', function(e) {
                console.log('vaL: ', $(this).val())
                if ($(this).val() == "Card") {
                    $('#card-details').find('.form-control').removeAttr('disabled');
                } else {
                    $('#card-details').find('.form-control').attr('disabled', true);

                }
            })
        })
    </script>
</body>

</html>