<?php

    session_start();
    require_once __DIR__ . "/classes/User.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Users();

    if($db->checkIfUserExists($email, $password) == true){
        $_SESSION['userid'] = 123456789;
        echo "sss";
    }

