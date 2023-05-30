<?php
$redirect_to_login = false;
require '../shared/user_session.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <?php include '../shared/head.php' ?>
</head>

<body class="bg-light">
    <?php $active_page = 'shop' ?>
    <?php include '../shared/top_header.php' ?>

    <main>
        <?php
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
            $query = $pdo->prepare('SELECT products.*,categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE products.id = ?');
            $query->execute([$product_id]);
            $product = $query->fetch();
        } else {
            header('location: shop.php');
        }
        ?>
        <section class=" pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-decoration-none link-orange fw-bold" href="shop.php">Shop</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a class="text-decoration-none link-orange fw-bold" href="shop.php?category=<?= $product['category_name'] ?>"><?= $product['category_name'] ?></a>
                                </li>
                                <li class="breadcrumb-item active fw-bold" aria-current="page"><?= $product['product_name'] ?></li>
                            </ol>
                        </nav>
                        <div class="row  align-items-center justify-content-center" data-aos="fade-up" data-aos-once="true" data-aos-duration="1000">
                            <!-- product images -->
                            <div class="col-md-5">
                                <img src="<?= $product['image'] ?>" id="main-product-image" class="img-fluid img-thumbnail bg-light shadow-sm bg-light" alt="">
                                <div class="product-images mt-3">
                                    <div class="product-image-wrapper">
                                        <img src="<?= $product['image'] ?>" class="" alt="">
                                    </div>
                                    <?php
                                    // get product images
                                    $query = $pdo->prepare('SELECT * FROM product_images WHERE product_id = ?');
                                    $query->execute([$product_id]);

                                    while ($row = $query->fetch()) {
                                    ?>
                                        <div class="product-image-wrapper">
                                            <img src="<?= $row['src'] ?>" class="" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md">
                                <p class="my-1 fs-1"><?= $product['product_name'] ?></p>
                                <div>
                                    <span class="badge text-bg-orange"><?= $product['category_name'] ?></span>
                                </div>
                                <p class="mb-1 mt-3 fw-bold fs-5">₱<?= $product['price'] ?>.00</p>
                                <p class="mb-1 mt-3">
                                    <?= $product['description'] ?>
                                </p>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="../app/add-to-cart.php" method="post">
                                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                <div class="mb-3">
                                                    <div class="text-center">
                                                        <label for="" class="form-label"><small>Quantity</small></label>
                                                    </div>
                                                    <input type="number" name="quantity" class="form-control text-center rounded-pill bg-light" value="1" min="1">
                                                </div>

                                                <div class="d-grid">
                                                    <button class="btn btn-dark-brown rounded-pill" name="add" type="submit">Add to cart</button>
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
    
    </main>
    <br>
    <?php include '../shared/footer.php' ?>
    <?php include '../shared/offcanvas-cart.php' ?>
    <?php include '../shared/offcanvas-menu.php' ?>
    <?php include '../shared/scripts.php' ?>
    <script>
        $(".product-image-wrapper").on("click", function(e) {
            let image = $(this).find('img').attr('src');
            $("#main-product-image").animate({
                opacity: 0.7,
            }, 100, function() {

                $('#main-product-image').attr("src",image).animate({opacity:1})
            });

           
        })
    </script>
</body>

</html>