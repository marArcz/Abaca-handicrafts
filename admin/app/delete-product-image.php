<?php 
require '../../conn/conn.php';

$id = $_POST['id'];
$query = $pdo->prepare('DELETE FROM product_images WHERE id= ?');
$success = $query->execute([$id]);

echo json_encode($success);
?>