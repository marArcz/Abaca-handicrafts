<?php 
require '../conn/conn.php';
session_start();


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('DELETE FROM cart WHERE id = ?');
    $success = $query->execute([$id]);

    if($success){
        $_SESSION['success'] = 'Successfully removed from cart!';
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
    }

}
header('location: ../views/cart.php');

?>