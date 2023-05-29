<?php
session_start();
require_once '../conn/conn.php';

// flag for redirecting to login or not
$should_redirect_to_login = isset($redirect_to_login) ? $redirect_to_login : true;

// check if user is logged in
// if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    if($should_redirect_to_login){
        $_SESSION['error'] = 'You need to login first!';
        header('location: login.php');
        exit();
    }
} else {
    // get user account
    $query = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute([$_SESSION['user_id']]);
    $user = $query->fetch();

    // if no account found
    if (!$user) {
        // remove user session
        unset($_SESSION['user_id']);
       if($should_redirect_to_login){
        $_SESSION['error'] = 'You need to login first!';
         // redirect to login
         header('location: login.php');
         exit();
       }
    }
}

?>
