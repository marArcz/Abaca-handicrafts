<?php 
session_start();
require '../../conn/conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $pdo->prepare('SELECT * FROM admin WHERE username = ?');
    $query->execute([$username]);
    $admin = $query->fetch();

    if($admin){
        //check if password match
        if(password_verify($password,$admin['password'])){
            // save admin session
            $_SESSION['admin_id']= $admin['id'];
            header('location: dashboard.php');
            exit();
        }else{
            $error = 'You entered an incorrect password!';
        }
    }else{
        $error = 'Sorry your credentials does not match any of our record!';
    }
}
?>