<?php 
session_start();
require '../../conn/conn.php';
require '../app/upload_file.php';

if(isset($_POST['add'])){
    $category_name = $_POST['category'];
    $image = '../assets/images/categories/' . UploadFile($_FILES['image'],'../../assets/images/categories/',false);
    $query = $pdo->prepare('INSERT INTO categories(category_name,image) VALUES(?,?)');
    $added = $query->execute([$category_name,$image]);
    
    if($added){
        $_SESSION['success'] = 'Successfully added new category!';
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
    }
}
else if(isset($_POST['edit'])){
    $id = $_POST['id'];
    
    $category_name = $_POST['category'];
    $query = $pdo->prepare('UPDATE categories SET category_name = ? WHERE id = ?');
    $success = $query->execute([$category_name,$id]);
    
    if($success){
        if(isset($_FILES['image']) && !empty($_FILES['image'])){
            $image = '../assets/images/categories/' . UploadFile($_FILES['image'],'../../assets/images/categories/',false);
            // change image
            $query = $pdo->prepare('UPDATE categories SET image = ? WHERE id = ?');
            $query->execute([$image,$id]);
        }
        $_SESSION['success'] = 'Successfully updated category!';
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
    }
}
else if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('DELETE FROM categories WHERE id = ?');
    $success = $query->execute([$id]);
        
    if($success){
        $_SESSION['success'] = 'Successfully deleted category!';
    }else{
        $_SESSION['error'] = 'Something went wrong please try again later!';
    }
}
else if(isset($_POST['get'])){
    $id = $_POST['id'];
    $query = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
    $query->execute([$id]);
    $category = $query->fetch();

    echo json_encode($category);
    exit();
}
header('location: ../views/categories.php');
