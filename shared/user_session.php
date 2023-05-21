<?php 
    require_once 'shared/Session.php';

    if(Session::getUser() == null){
        Session::redirectTo("login.php");
        exit();
    }
?>