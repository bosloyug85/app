<?php

    session_start();

    require_once __DIR__ . "/classes/User.php";
    

    $email1 = $_POST['email'];
    $password1 = $_POST['password'];

    
    $db = new Users();

    if($db->checkIfUserExists($email1, $password1) == true){
        echo "true";
    }
    else {
        echo "false";
    }

 
    
