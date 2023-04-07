<?php
require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../config.php';

session_start();
if(isset($_SESSION['user'])){
    header('Location: /accueil');
    exit();
}

if(count($_POST) > 0){
    $user = new users;

    //verify the email
    if(!empty($_POST['email'])){
        $user->email = strip_tags($_POST['email']);
        if($user->checkIfUserExists('email') > 0){
            $password = $user->getPass();
        }else{
            $formErrors['email'] = USER_LOGIN_ERROR;
        }
    }else{
        $formErrors['email'] = USER_EMAIL_EMPTY;
    }

    //verify password
    if(!empty($_POST['password'])){
        if(isset($password)){
            if(password_verify($_POST['password'], $password)){
                $_SESSION['user'] = $user->getId();
                header('Location: /accueil');
                exit();
            }else{
                $formErrors['password'] = $formErrors['email'] = USER_LOGIN_ERROR;
            }
        }
    }else{
        $formErrors['password'] = USER_PASSWORD_ERROR_EMPTY;
    }
}

require_once '../views/parts/header.php';
require_once '../views/connexion.php';
require_once '../views/parts/footer.php';