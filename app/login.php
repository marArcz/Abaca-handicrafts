<?php 
session_start();
require '../conn/conn.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // find an account that matches email
    $query = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute([$email]);

    // if an account is found
    if($query->rowCount() > 0){
        // get user account
        $user = $query->fetch();

        // check if password match
        if(password_verify($password,$user['password'])){
            // if matched 
            // save user session
            $_SESSION['user_id'] = $user['id'];
            // redirect to homepage
            header('location: index.php');
        }
        else{ // else if password does not match
            $error = 'You entered an incorrect password!';
        }
    }
    else{ // if not account is found
        $error = 'Your credentials does not match any of our records!';
    }
}
?>