<?php
$redirect_to_login=false;
require '../shared/user_session.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaca Handicraft | Shop</title>
    <?php include '../shared/head.php' ?>
</head>

<body class="">
    <?php $active_page = "shop" ?>
    <?php include '../shared/top_header.php' ?>

    <?php
    // get active category from url
    $category = isset($_GET['category']) ? $_GET['category'] : "All Products";

    if (strtolower($category) !== 'all products') {
        // get category info
        $query = $pdo->prepare('SELECT * FROM categories WHERE category_name = ?');
        $query->execute([$category]);
        $selected_category = $query->fetch();
    }
    ?>
    <main>
        <section>
            <div class="container-fluid">
                <div class="bg-dark-brown category-header" data-aos-once="true" data-aos="fade-up" data-aos-duration="800">
                    <div class="px-lg-5 px-md-3 py-3 px-2 h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md text-center">
                                <h1 class="text-light mb-3"><?php echo $category == "All Products" ? "" : "Abaca" ?> <?php echo $category ?></h1>
                                <div class="line col-6 mx-auto mb-3"></div>
                                <p class="text-white-50">Browse through our masterpiece</p>
                            </div>
                            <div class="col-md-6 h-100">
                                <?php if (isset($selected_category) && $selected_category) : ?>
                                    <img src="<?= $selected_category['image'] ?>" class=" img-fluid h-100" alt="">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="container">
                <div class="text-center">
                    <p class="fs-4 fw-bold text-dark-brown mb-4" data-aos-once="true" data-aos="fade-up" data-aos-duration="800">Our Products</p>
                </div>
                <div class="row gy-5">
                    <div class="col-md-2">
                        <ul class="nav flex-column ">
                            <li class="nav-item">
                                <a href="shop.php?category=All Products<?= isset($_GET['search'])? '&search='.$_GET['search']:'' ?>" class="nav-link <?php echo $category == 'All Products' ? 'link-orange' : 'link-dark' ?>"><?php echo 'All Products'  ?></a>
                            </li>
                            <?php
                            $query = $pdo->query('SELECT * FROM categories');
                            $categories = $query->fetchAll();

                            foreach ($categories as $key => $c) {
                            ?>
                                <li class="nav-item">
                                    <a href="shop.php?category=<?php echo $c['category_name'] ?><?= isset($_GET['search'])? '&search='.$_GET['search']:'' ?>" class="nav-link <?php echo $category == $c['category_name'] ? 'link-orange' : 'link-dark' ?>"><?php echo $c['category_name']  ?></a>
                                </li>
                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                    <div class="col-md">
                        <div class="d-flex flex-wrap" data-aos-once="true" data-aos="fade-up" data-aos-duration="800">
                            <p class="my-1 text-uppercase"><?php echo $category ?></p>
                            <p class="ms-auto my-1">Newest</p>
                        </div>
                        <div class="mt-3 row gy-4">
                            <?php
                            // fetching products based on selected category
                            if (strtolower($category) == 'all products') {
                                if (isset($_GET['search'])) { //if searching
                                    $search = $_GET['search'];
                                    $query = $pdo->prepare('SELECT * FROM products WHERE product_name LIKE :search OR description LIKE :search');
                                    $query->execute([':search' => '%' . $search . '%']);
                                    $products = $query->fetchAll();
                                } else { //if not searching
                                    $query = $pdo->query('SELECT * FROM products');
                                    $products = $query->fetchAll();
                                }
                            } else {
                                if (isset($_GET['search'])) { //if searching
                                    $search = $_GET['search'];
                                    $query = $pdo->prepare  ('SELECT * FROM products WHERE (product_name LIKE :search OR description LIKE :search) AND category_id IN (SELECT id FROM categories WHERE category_name = :category)');
                                    $query->execute([':search' => '%' . $search . '%', ':category' => $category]);
                                    $products = $query->fetchAll();
                                } else { //if not searching
                                    $query = $pdo->prepare('SELECT * FROM products WHERE category_id IN (SELECT id FROM categories WHERE category_name = ?)');
                                    $query->execute([$category]);
                                    $products = $query->fetchAll();
                                }
                            }
                            foreach ($products as $key => $product) {
                            ?>
                                <div class="col-md-4 col-lg-3 " data-aos-once="true" data-aos="fade-up" data-aos-duration="800">
                                    <div class="product-card" id="featured-product-card-<?php echo $key ?>">
                                        <div class="inner">
                                            <div class="image-container">
                                                <img src="<?php echo $product['image'] ?>" alt="<?php echo $product['product_name'] ?>" class="product-image">
                                            </div>
                                            <div class="w-100 controls ">
                                                <div class="text-center px-3 py-3 bg-light bg-opacity-75">
                                                    <a href="view-product.php?id=<?= $product['id'] ?>"  class="link-dark">View Product</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center text mt-3">
                                            <p class="my-1 product-name"><?php echo $product['product_name'] ?></p>
                                            <p class="my-1 text-secondary product-price">₱<?php echo $product['price'] ?>.00</p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php if (count($products) == 0) : ?>
                            <!-- <img src="../assets/images/empty-set.png" width="20" alt=""> -->
                            <p class="text-start mt-4 text-black-50 fs-5" data-aos-once="true" data-aos="fade-up" data-aos-duration="800">Sorry there are no products to display.</p>
                        <?php endif ?>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <br><br>
    <?php include '../shared/footer.php' ?>
    <?php include '../shared/offcanvas-cart.php' ?>
    <?php include '../shared/modals/view-product-modal.php' ?>
    <?php include '../shared/scripts.php' ?>
</body>

</html>