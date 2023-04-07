<?php
require_once '../models/database.php';
require_once '../models/userModel.php';
require_once '../config.php';

if (count($_POST) > 0) {
    try {
        $user = new users;

        //registration of the firstname from the user
        if (!empty($_POST['firstName'])) {
            if (preg_match($regex['firstName'], $_POST['firstName'])) {
                $user->firstName = strip_tags($_POST['firstName']);
            } else {
                $formErrors['firstName'] = FIRSTNAME_ERROR_INVALID;
            }
        } else {
            $formErrors['firstName'] = FIRSTNAME_ERROR_EMPTY;
        }
        //for the last name
        if (!empty($_POST['lastName'])) {
            if (preg_match($regex['firstName'], $_POST['firstName'])) {
                $user->lastName = strip_tags($_POST['lastName']);
            }
        } else {
            $formErrors['lastName'] = LASTNAME_ERROR_EMPTY;
        }

        //for the city
        if (!empty($_POST['city'])) {
            if (preg_match($regex['city'], $_POST['city'])) {
                $user->city = strip_tags($_POST['city']);
            } else {
                $formErrors['city'] = CITY_ERROR_INVALID;
            }
        } else {
            $formErrors['city'] = CITY_ERROR_EMPTY;
        }

        //for the email
        if (!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){          
                if($user->checkIfUserExists('email') > 0){
                    $formErrors['email'] = EMAIL_ERROR_ALREADY_EXISTS;
                }else{
                    $user->email = $_POST['email'];
                }
            }else{
                $formErrors['email'] = EMAIL_ERROR_INVALID;
            }     
        }else{
            $formErrors['email'] = EMAIL_ERROR_EMPTY;
        }

        //for the age
        if(!empty($_POST['age'])){
            if($_POST['age'] >= 18){
                $user->major = $_POST['age'];
            }else{
                $formErrors['age'] = AGE_ERROR_INVALID;
            }
        }else{
            $formErrors['age'] = AGE_ERROR_EMPTY;
        }

        //for the phone number
        if(!empty($_POST['phoneNumber'])){
            if(preg_match($regex['phone'], $_POST['phoneNumber'])){
                $user->phoneNumber = strip_tags($_POST['phoneNumber']);
            }else{
                $formErrors['phoneNumber'] = PHONE_ERROR_INVALID;
            }
        }else{
            $formErrors['phoneNumber'] = PHONE_ERROR_EMPTY;
        }

        //for the password

        if(!empty($_POST['password'])){
            if(!preg_match($regex['password'], $_POST['password'])){
                $formErrors['password'] = PASS_ERROR_INVALID;
            }
        }else{
            $formErrors['password'] = PASS_ERROR_EMPTY;
        }

        if(!empty($_POST['confirmPass'])){
            if(!isset($formErrors['password'])){
                if($_POST['password'] == $_POST['confirmPass']){
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                }else{
                    $formErrors['password'] = $formErrors['confirmPass'] = PASS_ERROR_DIFFERENT_PASS;
                }
            }
        }else{
                $formErrors['confirmPass'] = PASS_COMFIRM_ERROR_EMPTY;
            }

        //for the succes inscription
        if(count($formErrors) == 0){
            $user->addUser();
            $form = [
                'status' => 'success',
                'message' => USER_REGISTER_SUCCES
            ];
        }


    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}


require_once '../views/parts/header.php';
require_once '../views/inscription.php';
require_once '../views/parts/footer.php';
