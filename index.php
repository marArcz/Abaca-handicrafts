<?php
include_once './classes/CarouselItem.php';
include_once './classes/ProductItem.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaca Handicraft</title>
    <?php include './shared/head.php' ?>

</head>

<body class="">
    <?php $active_page = "home" ?>
    <?php include './shared/top_header.php' ?>

    <main>
        <section class="pt-4">
            <div class="container ">
                <div class="text-center ">
                    <p class="fs-3 mt-1 mb-2 fw-bold">Proudly Made Abaca Handicrafts</p>
                    <p class="fs-6 fw-light my-1 text-secondary">Made from natural resources</p>
                </div>
            </div>
        </section>
        <section class="hero-main">
            <div class="container-fluid">
                <div id="hero-carousel" data-bs-interval="3000" class="carousel slide " data-aos-anchor-placement="top-bottom" data-aos-delay="300" data-aos-duration="800" data-aos="fade-up" data-bs-ride="carousel">
                    <?php
                    $carouselItems = [
                        new CarouselItem(title: "Abaca Dress", image: "assets/images/front-slider/dress.png"),
                        new CarouselItem(title: "Abaca Bags", image: "assets/images/front-slider/bag.png"),
                        new CarouselItem(title: "Abaca Baskets", image: "assets/images/front-slider/basket.png"),
                        new CarouselItem(title: "Abaca Base", image: "assets/images/front-slider/flower.png"),
                        new CarouselItem(title: "Abaca Jars", image: "assets/images/front-slider/garapon.png"),
                        new CarouselItem(title: "Abaca Slippers", image: "assets/images/front-slider/slipers.png"),
                        new CarouselItem(title: "Abaca Souvenirs", image: "assets/images/front-slider/souviner.png"),
                        new CarouselItem(title: "Abaca Totbag", image: "assets/images/front-slider/totbag.png"),
                    ];
                    ?>
                    <div class="carousel-indicators">

                        <?php
                        foreach ($carouselItems as $key => $carouselItem) {
                        ?>
                            <button type="button" data-bs-target="#hero-carousel" class="<?php echo $key == 0 ? 'active' : '' ?>" data-bs-slide-to="<?php echo $key ?>" aria-label="Slide <?php echo $key + 1 ?>">
                                <span class="circle"></span>
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <!-- display carousel items -->
                        <?php
                        foreach ($carouselItems as $key => $carouselItem) {
                        ?>
                            <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
                                <div class="container-fluid px-lg-5 px-md-3 px-3 h-100">
                                    <div class="row h-100 gx-0 align-items-center">
                                        <div class="col-md-7">
                                            <div class="">
                                                <h1 class="text-white"><?php echo $carouselItem->title ?></h1>
                                                <div class="line mt-3 mb-4"></div>
                                                <p class="text-light fs-5"><?php echo $carouselItem->description ?></p>

                                                <a href="<?php echo $carouselItem->url ?>" class="btn btn-orange rounded-0 text-light mt-3 hover-btn-elegant btn-elegant">Browse</a>
                                            </div>
                                        </div>
                                        <div class="col-md text-end h-100">
                                            <img src="<?php echo $carouselItem->image ?>" class="img-fluid h-100" alt="<?php echo $carouselItem->title ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- end of carousel items -->
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container py-5">
                <div class="text-center" data-aos-duration="800" data-aos-once="true" data-aos="fade-up">
                    <p class=" text-uppercase fw-bold">Hey There</p>
                    <p class=" fs-4  text-orange">Thank you for supporting local products!</p>
                    <p class=" mb-5 col-md-4 mx-auto text-uppercase text-secondary">This Shop proudly features products from the island of catanduanes</p>

                    <a href="shop.php" class=" link-orange text-uppercase border-orange border-bottom pb-2 text-decoration-none"> Shop Now</a>
                </div>
            </div>
        </section>
        <section>
            <div class="container py-5">
                <div class="text-center mb-3" data-aos-duration="500" data-aos-once="true" data-aos="zoom-in">
                    <h5 class=" fw-bold">FEATURED PRODUCTS</h5>
                </div>
                <br>
                <div class="products-container">
                    <div class="row gy-3 gx-lg-5 gx-3 justify-content-center justify-content-lg-start">
                        <?php

                        $featured_products = [
                            new ProductItem("Abaca Bag", "₱120", "assets/images/products/bag3.png"),
                            new ProductItem("Abaca Dress", "₱120", "assets/images/products/dress.png"),
                            new ProductItem("Abaca Souvenir Rabbit", "₱120", "assets/images/products/rabbit.png"),
                            new ProductItem("Abaca Pen Holder", "₱120", "assets/images/products/garapon brown close.png"),
                            new ProductItem("Abaca Chandelier", "₱120", "assets/images/products/Chandelier1.png"),
                            new ProductItem("Abaca Chandelier", "₱120", "assets/images/products/Chandelier2.png"),
                            new ProductItem("Abaca Totbag", "₱120", "assets/images/products/totbag group.png"),
                            new ProductItem("Carabao Souvenir ", "₱120", "assets/images/products/carabao.png"),
                        ];

                        foreach ($featured_products as $key => $product) {
                        ?>
                            <div class="col-md-3 " data-aos-once="true" data-aos-duration="800" data-aos="<?php echo ($key + 1) % 4 == 0 ? 'flip-left' : 'flip-right' ?>">
                                <div class="product-card" id="featured-product-card-<?php echo $key ?>">
                                    <div class="inner">
                                        <div class="image-container">
                                            <img src="<?php echo $product->image ?>" alt="<?php echo $product->name ?>" class="product-image">
                                        </div>
                                        <div class="w-100 controls ">
                                            <!-- <div class="d-flex bg-dark px-3 py-1">
                                                <a href="#offcanvas-cart" data-target="#featured-product-card-<?php echo $key ?>" data-bs-toggle="offcanvas" class="my-1 link-light text-decoration-none d-flex align-items-center"><span class="material-symbols-outlined fs-6 me-1">shopping_cart</span> Add to cart</a>
                                                <a href="view-product.php" class="my-1 link-light text-decoration-none ms-auto"><span class="material-symbols-outlined fs-6 me-1">fullscreen</span></a>
                                            </div> -->
                                            <div class="text-center px-3 py-1 bg-light bg-opacity-75">
                                                <a href="#view-product-modal" data-bs-toggle="modal" class="link-dark">Quick View</a>
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
            </div>
        </section>
        <br><br><br>
        <section class="mt-3">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-md-3">
                        <ul class="nav flex-column " data-aos-once="true" data-aos-duration="300" data-aos="zoom-in">
                            <?php
                            $categories = [
                                "All Products",
                                "Baskets",
                                "Bases",
                                "Souvenirs",
                                "Chandeliers",
                                "Wallets",
                                "Footwear",
                                "Hats",
                                "Bags",
                            ];

                            foreach ($categories as $key => $category) {
                            ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link link-<?php echo $key == 0 ? 'orange' : 'dark' ?>"><?php echo $category ?></a>
                                </li>
                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                    <div class="col-md">
                        <div class="d-flex flex-wrap">
                            <p class="my-1">All Products</p>
                            <p class="ms-auto my-1">Newest</p>
                        </div>
                        <div class="products-container mt-3">
                            <div class="row gy-3 gx-lg-5 gx-3 justify-content-center justify-content-lg-start">
                                <?php

                                $products = [
                                    new ProductItem("Flower Base", "₱120", "assets/images/products/flower base.png"),
                                    new ProductItem("Abaca Souvenir Dog", "₱120", "assets/images/products/dog.png"),
                                    new ProductItem("Fruit Basket", "₱120", "assets/images/products/fruit basket.png"),
                                    new ProductItem("Fruit Bowl", "₱120", "assets/images/products/fruit bowl single.png"),
                                    new ProductItem("Abaca Souvenir pig", "₱120", "assets/images/products/pig.png"),
                                    new ProductItem("Elephant mini basket", "₱120", "assets/images/products/elepant lalagyan.png"),
                                    new ProductItem("Abaca Totbag", "₱120", "assets/images/products/totbag green.png"),
                                    new ProductItem("Abaca Souvenir Monkey", "₱120", "assets/images/products/monkey.png"),
                                ];

                                foreach ($products as $key => $product) {
                                ?>
                                    <div class="col-md-4 col-lg-3" data-aos-once="true" data-aos-duration="500" data-aos="zoom-in">
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
                            <div class="mt-3">
                                <a class="btn btn-light" href="shop.php">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>

    </main>

    <?php include './shared/footer.php' ?>
    <?php include './shared/offcanvas-cart.php' ?>
    <?php include './shared/modals/view-product-modal.php' ?>
    <?php include './shared/scripts.php' ?>
    <script>
        function initSlider() {
            const slider = $('#slider');
            let slides = slider.find('.slide');
            let firstSlide = $(slides[0]);
            firstSlide.css("left", "50px")
            firstSlide.css("background", "50px")
            let slideWidth = firstSlide.width();
            console.log('slidew: ', slideWidth)
        }
    </script>
</body>

</html>