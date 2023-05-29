<?php
$redirect_to_login = false;
require_once '../shared/user_session.php';
include_once '../classes/CarouselItem.php';
include_once '../classes/ProductItem.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaca Handicraft</title>
    <?php include '../shared/head.php' ?>

</head>

<body class="">
    <?php $active_page = "home" ?>
    <?php include '../shared/top_header.php' ?>

    <main>
        <section class="pt-xl-4 pt-5">
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

                                                <!-- <a href="<?php echo $carouselItem->url ?>" class="btn btn-orange rounded-0 text-light mt-3 hover-btn-elegant btn-elegant">Browse</a> -->
                                            </div>
                                        </div>
                                        <div class="col-md text-end h-100">
                                            <img src="../<?php echo $carouselItem->image ?>" class="img-fluid h-100" alt="<?php echo $carouselItem->title ?>">
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
                        $query = $pdo->prepare('SELECT * FROM products WHERE is_featured = 1');
                        $query->execute();

                        while ($row = $query->fetch()) {
                        ?>
                            <div class="col-md-3 " data-aos-once="true" data-aos-duration="800" data-aos="<?php echo ($key + 1) % 4 == 0 ? 'flip-left' : 'flip-right' ?>">
                                <div class="product-card" id="featured-product-card-<?= $row['id'] ?>">
                                    <div class="inner">
                                        <div class="image-container">
                                            <img src="<?= $row['image'] ?>" alt="<?= $row['product_name'] ?>" class="product-image">
                                        </div>
                                        <div class="w-100 controls ">
                                            <div class="text-center px-3 py-3 bg-light bg-opacity-75">
                                                <a href="view-product.php?id=<?= $row['id'] ?>" class="link-dark">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text mt-3">
                                        <p class="my-1 product-name"><?php echo $row['product_name'] ?></p>
                                        <p class="my-1 text-secondary product-price">₱<?= $row['price'] ?>.00</p>
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
                <div class="row">
                    <div class="col-md-5">

                    </div>
                </div>
            </div>
        </section>
        <br>

    </main>

    <?php require '../shared/footer.php' ?>
    <?php require '../shared/offcanvas-cart.php' ?>
    <?php require '../shared/modals/view-product-modal.php' ?>
    <?php require '../shared/scripts.php' ?>

</body>

</html>