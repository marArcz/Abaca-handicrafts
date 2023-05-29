<?php 
require '../conn/conn.php';

function new_order_number(int $order_id){
    $order_no = '';
    $prefix = "ABACA" . date("M") . substr(date('Y'),2);
    $order_no .= strtoupper($prefix);

    $order_no .= sprintf('%05d',$order_id);

    return $order_no;
}


if(isset($_POST['checkout'])){
    $user_id = $_SESSION['user_id'];
    // get cart 
    $query = $pdo->prepare('SELECT cart.*,cart.id AS cart_id,products.* FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.user_id = ?');
    $query->execute([$user_id]);
    $cart = $query->fetchAll();
    $total = 0;
    $orderNo = explode(".", uniqid("", true))[1];
    foreach ($cart as $key => $item) {
        $total += $item['quantity'] * $item['price'];
    }

    $address = $_POST["address"];
    $payment_method = $_POST["payment_method"];
    $query = $pdo->prepare('INSERT INTO orders(user_id,total,shipping_address,payment_method) VALUES(?,?,?,?)');
    $added = $query->execute([$user_id,$total,$address,$payment_method]);

    if($added){
        $order_id = $pdo->lastInsertId();
        // set order_no
        $order_no = new_order_number($order_id);
        $query = $pdo->prepare('UPDATE orders SET order_no=? WHERE id = ?');
        $query->execute([$order_no,$order_id]);
        // insert order_details
        $query = $pdo->prepare('INSERT INTO order_details(order_id,product_id,product_name,product_price,product_image,quantity) VALUES(?,?,?,?,?,?)');
        foreach ($cart as $key => $item) {
            $query->execute([$order_id,$item['product_id'],$item['product_name'],$item['price'],$item['image'],$item['quantity']]);
        }
        // remove chccked out items from cart
        $query = $pdo->prepare('DELETE FROM cart WHERE user_id = ?');
        $query->execute([$user_id]);

        $_SESSION['success'] = 'Successfully checked out!';
        header('location: orders.php');
        exit();
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
        header('location: cart.php');
        exit();
    }
}


?>