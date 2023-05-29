<?php
require '../../conn/conn.php';
require '../shared/session.php';
require '../app/upload_file.php';

if (isset($_POST['save'])) {
    $product_id = $_POST['id'];
    // get product
    $query = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $query->execute([$product_id]);
    $product = $query->fetch();
    $is_featured = isset($_POST['featured']) ? 1 : 0;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    $image = $product['image'];
    $imgPath = '../assets/images/products/';
    $uploadPath = '../../assets/images/products/';
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
   

        $image = $imgPath . UploadFile($_FILES['image'], $uploadPath, false);
    }

    // save product
    $query = $pdo->prepare('UPDATE products SET product_name=?,price=?,description=?,category_id=?,image=?,is_featured=? WHERE id=?');
    $success = $query->execute([$name, $price, $description, $category_id, $image,$is_featured, $product_id]);

    if ($success) {
        // add product images
        $product_images = $_FILES['images'];
        $query = $pdo->prepare('INSERT INTO product_images(product_id,src) VALUES(?,?)');

        if (isset($_FILES['images'])) {
            for ($x = 0; $x < count($product_images); $x++) {
                if (!empty($_FILES['images']['name'][$x])) {
                    move_uploaded_file($_FILES['images']['tmp_name'][$x], $uploadPath . $_FILES['images']['name'][$x]);
                    $image = $imgPath . $_FILES['images']['name'][$x];

                    $query->execute([$product_id, $image]);
                }
            }
        }

        $_SESSION['success'] = 'Successfully added products!';
        header('location:../views/manage-product.php?id=' . $product_id);
    }
}
