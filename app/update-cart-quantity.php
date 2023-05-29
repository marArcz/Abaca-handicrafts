<?php
require '../conn/conn.php';
session_start();

$user_id = $_SESSION['user_id'];
$cart_id = $_POST['cart_id'];
$quantity = $_POST['quantity'];

// find cart item
$query = $pdo->prepare('UPDATE cart SET quantity = ? WHERE id = ?');
$success = $query->execute([$quantity, $cart_id]);

// get cart
$query = $pdo->prepare("SELECT *,cart.id AS cart_id, (SELECT SUM(quantity) FROM cart WHERE user_id = :user_id) AS item_count FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.id = :cart_id");
$query->execute([':user_id'=>$user_id,':cart_id'=>$cart_id]);

$cart = $query->fetch(PDO::FETCH_ASSOC);
$total = 0;

// get total
$query = $pdo->prepare('SELECT cart.*,products.price FROM cart INNER JOIN products ON products.id = cart.product_id WHERE user_id = ?');
$query->execute([$user_id]);

while($row = $query->fetch()){
    $total = $row['quantity'] * $row['price'];
}

echo json_encode(['success' => $success,'cart'=>$cart,'total'=>$total]);
