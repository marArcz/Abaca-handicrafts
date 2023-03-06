<?php
include './classes/ProductItem.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaca Handicraft | Shop</title>
    <?php include './shared/head.php' ?>
</head>

<body>
    <?php $active_page = "shop" ?>
    <?php include './shared/top_header.php' ?>

    <?php
    // get active category
    $category = isset($_GET['category']) ? $_GET['category'] : "All Products";

    ?>
    <main>
        <section class="py-5">
            <div class="container">
                <div class="text-center">
                    <p class="fs-4 mb-4">Our Products</p>
                </div>
                <div class="row gy-5">
                    <div class="col-md-3">
                        <ul class="nav flex-column ">
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

                            foreach ($categories as $key => $c) {
                            ?>
                                <li class="nav-item ">
                                    <a href="shop.php?category=<?php echo $c ?>" class="nav-link <?php echo $category == $c ? 'link-orange' : 'link-dark' ?>"><?php echo $c ?></a>
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
                        <div class="mt-3 row gy-4">
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
                                new ProductItem("Abaca Bag", "₱120", "assets/images/products/bag3.png"),
                                new ProductItem("Abaca Dress", "₱120", "assets/images/products/dress.png"),
                                new ProductItem("Abaca Souvenir Rabbit", "₱120", "assets/images/products/rabbits.png"),
                                new ProductItem("Abaca Pen Holder", "₱120", "assets/images/products/garapon brown close.png"),
                                new ProductItem("Abaca Chandelier", "₱120", "assets/images/products/Chandelier1.png"),
                                new ProductItem("Abaca Chandelier", "₱120", "assets/images/products/Chandelier2.png"),
                                new ProductItem("Abaca Totbag", "₱120", "assets/images/products/totbag group.png"),
                                new ProductItem("Abaca Souvenir Carabao", "₱120", "assets/images/products/carabao.png"),
                            ];
                            ?>
                            <?php
                            foreach ($products as $key => $product) {
                            ?>
                                <div class="col-md-3 ">
                                    <div class="product-card" id="featured-product-card-<?php echo $key ?>">
                                        <div class="inner">
                                            <div class="image-container">
                                                <img src="<?php echo $product->image ?>" alt="<?php echo $product->name ?>" class="product-image">
                                            </div>
                                            <div class="w-100 controls ">
                                                <div class="d-flex bg-dark px-3 py-1">
                                                    <a href="#offcanvas-cart" data-target="#featured-product-card-<?php echo $key ?>" data-bs-toggle="offcanvas" class="my-1 link-light text-decoration-none d-flex align-items-center"><span class="material-symbols-outlined fs-6 me-1">shopping_cart</span> Add to cart</a>
                                                    <a href="view-product.php" class="my-1 link-light text-decoration-none ms-auto"><span class="material-symbols-outlined fs-6 me-1">fullscreen</span></a>
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
            </div>
        </section>
    </main>

    <?php include './shared/offcanvas-cart.php' ?>
    <?php include './shared/scripts.php' ?>
</body>

</html>