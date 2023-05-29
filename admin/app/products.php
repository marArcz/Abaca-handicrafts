<?php 
require '../../conn/conn.php';
session_start();
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    // $image
}
if(isset($_GET['id'])){
    $query = $pdo->prepare('DELETE FROM products WHERE id = ?');
    $query->execute([$_GET['id']]);
    
    $_SESSION['success'] = 'Successfully deleted!';
    header('location: ../views/products.php');
}
?>