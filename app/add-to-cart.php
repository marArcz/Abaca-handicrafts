<?php
session_start();
require '../conn/conn.php';

if (isset($_SESSION['user_id'])) {

    if (isset($_POST['add'])) {
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // check if product is already in cart
        $query = $pdo->prepare('SELECT * FROM cart WHERE product_id = ? AND user_id = ?');
        $query->execute([$product_id, $user_id]);
        if ($query->rowCount() > 0) {
            $cart_item = $query->fetch();
            $query = $pdo->prepare('UPDATE cart SET quantity = ? WHERE product_id = ? AND user_id = ?');
            $new_quantity = $cart_item['quantity'] + $quantity;
            $success = $query->execute([$new_quantity, $product_id, $user_id]);
        } else {
            $query = $pdo->prepare('INSERT INTO cart(user_id,product_id,quantity) VALUES(?,?,?)');
            $success = $query->execute([$user_id, $product_id, $quantity]);
        }

        if ($success) {
            $_SESSION['success'] = "Successfully added to cart";
        } else {
            $_SESSION['error'] = 'Something went wrong please try again later!';
        }
        header('location: ../views/cart.php');
    }
}else{
    $_SESSION['error'] = 'You need to login first!';
    header('location: ../views/login.php');
}
