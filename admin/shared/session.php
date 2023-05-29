<?php 
session_start();
require '../../conn/conn.php';
if(!isset($_SESSION['admin_id'])){
    header('location: index.php');
    exit();
}else{
    $query = $pdo->prepare('SELECT * FROM admin WHERE id = ?');
    $query->execute([$_SESSION['admin_id']]);
    $admin = $query->fetch();
}
?>