<?php 
// start session
session_start();
require '../conn/conn.php';

if(isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // check if passwords doesn't match
    if($password !== $confirm_password){
        $password_error = "Passwords does not match!";
    }

    // hash password
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

    //check if email is already used
    $query = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute([$email]);

    // if there are users found with this email
    if($query->rowCount() > 0){
        $email_error = "Sorry this email address is already taken!";
    }else{
        // if no user found with the same email
        // save user 
        $query = $pdo->prepare('INSERT INTO users(firstname,lastname,address,email,password) VALUES(?,?,?,?,?)');
        $added = $query->execute([$firstname,$lastname,$address,$email,$hashed_password]);

        // if successfully added
        if($added){ 
            // get user id
            $user_id = $pdo->lastInsertId();
            // save user session
            $_SESSION['user_id'] = $user_id;
            // redirect to homepage
            header('Location: index.php');
            exit();
        }else{
            // if account is not inserted into the database
            $error = "Something went wrong please try again later";
        }
    }
}

?>