<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './shared/head.php' ?>
</head>

<body>
    <?php include './shared/top_header.php' ?>
    <main>
        <section class="pt-4">
            <div class="container">
                <p class=" text-center fs-5 text-dark-brown"><i class="bx bxs-cart"></i> My Cart</p>
                <div class="row justify-content-center ">
                    <div class="col-md">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <table class="table align-middle">
                                    <thead>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Remove</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="row align-items-center">
                                                    <div class="col-2">
                                                        <img src="./assets/images/products/dress.png" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <p class="mb-1 fs-6 fw-bold">Brown and Pink Kimono</p>
                                                                <div class=" text-bg-orange badge"><small>Dress</small></div>
                                                                <p class="mt-3 fw-bold fs-6">₱ 1200</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control col-5" min="1" value="1">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <p>Order Summary</p>
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
</body>

</html>