<?php
require '../../conn/conn.php';
require '../shared/session.php';
require '../app/upload_file.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $is_featured = isset($_POST['featured']) ? 1 : 0;
    $imgPath = '../assets/images/products/';
    $uploadPath = '../../assets/images/products/';

    $image = $imgPath . UploadFile($_FILES['image'], $uploadPath, false);

    // save product
    $query = $pdo->prepare('INSERT INTO products(product_name,price,description,category_id,image,is_featured) VALUES(?,?,?,?,?,?)');
    $added = $query->execute([$name, $price, $description, $category_id, $image,$is_featured]);

    if ($added) {
        $product_id = $pdo->lastInsertId();
        // add product images
        $product_images = $_FILES['images'];
        $query = $pdo->prepare('INSERT INTO product_images(product_id,src) VALUES(?,?)');

        for ($x = 0; $x < count($product_images); $x++) {
            if (!empty($_FILES['images']['name'][$x])) {
                move_uploaded_file($_FILES['images']['tmp_name'][$x], $uploadPath . $_FILES['images']['name'][$x]);
                $image = $imgPath . $_FILES['images']['name'][$x];

                $query->execute([$product_id, $image]);
            }
        }

        $_SESSION['success'] = 'Successfully added products!';
        header('location:../views/add-product.php');
    }
}
