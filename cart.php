<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php include './shared/head.php' ?>
</head>

<body>
    <?php include './shared/top_header.php' ?>
    <main>
        <section class="pt-5">
            <div class="px-lg-5 px-md-3 px-2">
                <div class="row justify-content-center gy-2">
                    <div class="col-md">
                        <div class="card border shadow-sm h-100">
                            <div class="card-body p-4">
                                <p class=" text-start fs-5 text-dark-brown"><i class="bx bxs-cart"></i> My Cart</p>
                                <hr>
                                <ul class=" list-group list-group-flush">
                                    <li class=" list-group-item mb-3">
                                        <!-- cart item -->

                                        <div class="row align-items-center">
                                            <div class="col-2">
                                                <img src="./assets/images/products/dress.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-6">
                                                <div class="row align-items-center">
                                                    <div class="col-md-5">
                                                        <p class="mb-1 fs-6 fw-bold col-12 text-truncate">Brown and Pink Kimono</p>
                                                        <div class=" text-bg-orange badge"><small>Dress</small></div>
                                                        <p class="mt-3 fw-bold fs-6">₱1,200</p>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="input-group input-group-sm mb-3 col-lg-6 col-md-7">
                                                            <button class="btn btn-dark-brown text-light quantity-control-up" type="button">
                                                                <i class="bx bx-plus"></i>
                                                            </button>
                                                            <input type="number" readonly min="1" value="1" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
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
                                                        <p class="my-1">₱1,200</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="remove-item shadow-sm fw-bold text-dark-brown btn btn-light border" type="button">
                                                    <i class="bx bx-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- end of cart item -->
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <a href="shop.php" class=" link-orange text-decoration-none">Continue Shopping <i class="bx bx-right-arrow-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border shadow-sm h-100">
                            <div class="card-body p-4">
                                <p class="fs-5">Order Summary</p>
                                <hr>
                                <div class="d-flex mb-3">
                                    <p class="my-1 fw-bold">ITEMS</p>
                                    <p class="my-1 ms-auto fw-bold">0</p>
                                </div>
                                <form action="#" method="post">
                                    <div class="mb-3">
                                        <label for="" class="form-label">SHIPPING</label>
                                        <select name="" class="form-control" id="">
                                            <option value="standard">Standard Delivery - 50</option>
                                            <option value="urgent">Urgent Delivery - 100</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="d-flex mb-3">
                                        <p class="my-1 fw-bold">Total Price</p>
                                        <p class="my-1 ms-auto fw-bold">₱0</p>
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
    <?php include './shared/footer.php' ?>
    <?php include './shared/scripts.php' ?>

    <script>
        $(".quantity-control-up").on('click',function (e) { 
            let btn = $(this);

            btn.siblings("input")[0].stepUp();
         })
        $(".quantity-control-down").on('click',function (e) { 
            let btn = $(this);

            btn.siblings("input")[0].stepDown();
         })
    </script>
</body>

</html>