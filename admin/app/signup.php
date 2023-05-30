<?php 
    require '../../conn/conn.php';

    if(isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $photo = "../../assets/images/default.jpg";
        $query = $pdo->prepare('SELECT * FROM admin WHERE username = ?');
        $query->execute([$username]);
        if($query->rowCount() > 0){
            $error['username'] = 'Sorry username is already taken!';
        }
        if($password !== $confirm_password){
            $error['confirm_password'] = 'Password does not match!';
        }

        if(!isset($error)){
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            // create account
            $query = $pdo->prepare('INSERT INTO admin(firstname,lastname,username,password) VALUES(?,?,?,?)');
            $added = $query->execute([$firstname,$lastname,$username,$hashed_password]);
            
            if($added){
                $_SESSION['success'] = 'You successfully created an account!';
                header('location: dashboard.php');
                exit();
            }else{
                $error['signup'] = 'Something went wrong please try again later!';
            }
        }
    }
?>