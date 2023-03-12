<?php include './classes/ProductItem.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <?php include './shared/head.php' ?>
</head>

<body class="bg-light">
    <?php $active_page = 'shop' ?>
    <?php include './shared/top_header.php' ?>

    <main>
        <section class=" pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-decoration-none link-orange fw-bold" href="#">Shop</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a class="text-decoration-none link-orange fw-bold" href="#">Dress</a>
                                </li>
                                <li class="breadcrumb-item active fw-bold" aria-current="page">Abaca Dress</li>
                            </ol>
                        </nav>
                        <div class="row align-items-center justify-content-center" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                            <div class="col-md">
                                <!-- <img src="./assets/images/products/dress.png" class="img-fluid img-thumbnail bg-light shadow-sm bg-light" alt=""> -->
                                <div id="view-product-carousel" class="carousel slide " data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <div class="circle"></div>
                                        </button>
                                        <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                                            <div class="circle"></div>

                                        </button>
                                        <button type="button" data-bs-target="#view-product-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                                            <div class="circle"></div>

                                        </button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./assets/images/products/Chandelier1.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./assets/images/products/Chandelier2.png" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./assets/images/products/Chandelier3.png" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-1 mt-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </p>
                            </div>
                            <div class="col-md-7">
                                <p class="my-1 fs-1">Abaca Dress</p>
                                <div>
                                    <span class="badge text-bg-orange">Dress</span>
                                </div>
                                <p class="mb-1 mt-3">
                                    Color: Pink, Brown
                                </p>
                                <p class="mb-1 mt-3 fw-bold fs-5">₱ 2,000</p>

                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="">
                                                <div class="mb-3">
                                                    <div class="text-center">
                                                        <label for="" class="form-label"><small>Quantity</small></label>
                                                    </div>
                                                    <input type="number" class="form-control text-center rounded-pill bg-light" value="1" min="1">
                                                </div>

                                                <div class="d-grid">
                                                    <button class="btn btn-dark-brown rounded-pill" type="button">Add to cart</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="">
            <div class="container py-3">
                <p class="fs-5 text-center mb-3">Related Products</p>
                <div class="row gy-3 gx-lg-5 gx-3 justify-content-center justify-content-lg-start">
                    <?php

                    $products = [
                        new ProductItem("Flower Base", "₱120", "assets/images/products/flower base.png"),
                        new ProductItem("Abaca Souvenir Dog", "₱120", "assets/images/products/dog.png"),
                        new ProductItem("Fruit Basket", "₱120", "assets/images/products/fruit basket.png"),
                        new ProductItem("Fruit Bowl", "₱120", "assets/images/products/fruit bowl single.png"),

                    ];

                    foreach ($products as $key => $product) {
                    ?>
                        <div class="col-md-3 " data-aos-once="true" data-aos-duration="500" data-aos="zoom-in">
                            <div class="product-card" id="product-card-<?php echo $key ?>">
                                <div class="inner">
                                    <div class="image-container">
                                        <img src="<?php echo $product->image ?>" alt="<?php echo $product->name ?>" class="product-image">
                                    </div>
                                    <div class="w-100 controls ">
                                        <div class="d-flex bg-dark px-3 py-1">
                                            <a href="#offcanvas-cart" data-target="#product-card-<?php echo $key ?>" data-bs-toggle="offcanvas" class="my-1 link-light text-decoration-none d-flex align-items-center"><span class="material-symbols-outlined fs-6 me-1">shopping_cart</span> Add to cart</a>
                                            <a href="#view-product-modal" data-bs-toggle="modal" class="my-1 link-light text-decoration-none ms-auto"><span class="material-symbols-outlined fs-6 me-1">fullscreen</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text mt-3">
                                    <p class="my-1 product-name"><?php echo $product->name ?></p>
                                    <p class="my-1 text-secondary product-price"><?php echo $product->price ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <br>
    <?php include './shared/footer.php' ?>
    <?php include './shared/offcanvas-cart.php' ?>
    <?php include './shared/offcanvas-menu.php' ?>
    <?php include './shared/scripts.php' ?>
</body>

</html>