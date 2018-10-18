<?php

    session_start();

    require_once __DIR__ . "/classes/User.php";
    

    $email1 = $_POST['email'];
    $password1 = "dar";
    
    $db = new Users();

    if($db->checkIfUserExistsWithGoogle($email1) == true){
        echo "exist";
    }
    else {
        echo "false";
    }

 
    
