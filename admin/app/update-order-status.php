<?php 
require '../../conn/conn.php';
session_start();

$status = $_GET['status'];
$order_id = $_GET['order_id'];

$query = $pdo->prepare('UPDATE orders SET status=? WHERE id = ?');
$success = $query->execute([$status,$order_id]);

// if($success){
//     $_SESSION['success'] = 'Successfully updated status!';
// }else{
//     $_SESSION['error'] = 'Something went wrong please try again later!';
// }

header('location: ../views/orders.php');

?>