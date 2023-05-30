<?php 
require '../../conn/conn.php';
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = $pdo->prepare('DELETE FROM orders WHERE id = ?');
    $success = $query->execute([$id]);

    if($success){
        $_SESSION['success'] = 'Successfully deleted!';
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
    }
}

header('location: ../views/orders.php');
?>